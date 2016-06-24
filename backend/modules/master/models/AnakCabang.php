<?php

namespace app\modules\master\models;

use Yii;
use yii\helpers\ArrayHelper;
use app\modules\master\models\KepengurusanAnakCabang;
use yii\db\Expression;
/**
 * This is the model class for table "anak_cabang".
 *
 * @property integer $id
 * @property string $kode_anak_cabang
 * @property integer $id_kelompok
 * @property integer $id_kecamatan
 * @property string $no_sk
 * @property string $tanggal_sk
 * @property string $masa_berlaku
 * @property string $file_sk
 * @property string $foto_tempat
 *
 * @property Kecamatan $idKecamatan
 * @property KelompokWilayah $idKelompok
 */
class AnakCabang extends \yii\db\ActiveRecord
{
    
    public $filesk;        
    public $filefoto;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anak_cabang';
    }

    /**
     * @inheritdoc
     */

    public function rules()
    {
        return [
            [['id_kelompok', 'kode_anak_cabang', 'id_kecamatan', 'nama'], 'required'],
            [['id_kelompok', 'id_kecamatan'], 'integer'],            
            [['kode_anak_cabang'], 'string', 'max' => 45],
            [['foto_tempat', 'nama'], 'string', 'max' => 100],
            [['keterangan'], 'string', 'max' => 1024],
            [['id_kecamatan'], 'unique'],            
            [['filefoto'], 'file', 'extensions'=>'jpg, jpeg, png'],
            [['aktif'], 'boolean']

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode_anak_cabang' => 'Kode Anak Cabang',
            'nama'=>'Nama',
            'id_kelompok' => 'Kelompok',
            'id_kecamatan' => 'Kecamatan',            
            'foto_tempat' => 'Foto Tempat',
            'filefoto'=>'Foto Tempat',
            'keterangan'=>'Keterangan',
            'aktif'=>'Aktif'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKecamatan()
    {
        return $this->hasOne(Kecamatan::className(), ['IDKecamatan' => 'id_kecamatan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKelompok()
    {
        return $this->hasOne(KelompokWilayah::className(), ['id_kelompok' => 'id_kelompok']);
    }

    public function getListKelompokWilayah(){
        $dataKelompok = KelompokWilayah::find()->asArray()->orderBy(['nama_kelompok'=>'asc'])->all();

        return ArrayHelper::map($dataKelompok, 'id_kelompok', 'nama_kelompok');
    }

    public function getListKecamatan(){
        $dataKecamatan = Kecamatan::find()->where(['IDKabupaten'=>27714])->orderBy(['Nama'=>'ASC'])->all();

        return ArrayHelper::map($dataKecamatan, 'IDKecamatan', 'Nama');
    }

    public function getKepengurusan($id){

        $tanggal = date('Y-m-d');

        $model = KepengurusanAnakCabang::find()->where(['id_anak_cabang'=> $id])->andWhere(['>=','berlaku_sk', new Expression('NOW()')])->all();

        return ArrayHelper::toArray($model, [
                    'app\modules\master\models\KepengurusanAnakCabang'=>[
                        'id'=>'id', 

                        'name'=>'periode'
                    ]
                ]);
    }
}
