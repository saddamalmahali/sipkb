<?php

namespace app\modules\master\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "anggota".
 *
 * @property integer $id_anggota
 * @property integer $id_kelompok
 * @property string $nama_anggota
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat_anggota
 * @property string $kecamatan
 * @property string $kabupaten
 * @property string $no_ktp
 *
 * @property AnggotaDetile[] $anggotaDetiles
 */
class Anggota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'nama_anggota', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat_anggota', 'kecamatan',  'no_ktp'], 'required'],
            [['id_kelompok'], 'integer'],
            [['jenis_kelamin'], 'string'],
            [['tanggal_lahir'], 'safe'],
            [['nama_anggota'], 'string', 'max' => 255],
            [['tempat_lahir', 'kecamatan', 'kabupaten'], 'string', 'max' => 100],
            [['alamat_anggota'], 'string', 'max' => 1024],
            [['no_ktp'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_anggota' => 'Id Anggota',
            'id_kelompok' => 'Id Kelompok',
            'nama_anggota' => 'Nama Anggota',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat_anggota' => 'Alamat Anggota',
            'kecamatan' => 'Kecamatan',
            'kabupaten' => 'Kabupaten',
            'no_ktp' => 'No Ktp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    

    public function getListKecamatan(){
        $datakecamatan = Kecamatan::find()->asArray()->where(['IDKabupaten'=>27714])->orderBy(['Nama'=>'SORT_ASC'])->all();

        return ArrayHelper::map($datakecamatan, 'IDKecamatan', 'Nama');
    }

    public function getAnggotaDetile()
    {
        return $this->hasOne(DetileKontak::className(), ['id_anggota' => 'id_anggota']);
    }

    public function getDetileKepengurusan($id){
        $model = DetileKepengurusan::find()->where(['id_kepengurusan'=>$id])->one();

        return $model;
    }

    public function getListKepengurusan($id){
        $time = new \DateTime('now');
        $today = $time->format('Y-m-d'); 
        $kep = KepengurusanAnakCabang::find()->where(['id_anak_cabang'=>$id])
        ->andWhere(['>=', 'berlaku_sk', $today])->all();

        return ArrayHelper::map($kep, 'id', 'periode');
    }
}
