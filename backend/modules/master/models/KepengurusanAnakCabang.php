<?php

namespace app\modules\master\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "kepengurusan_anak_cabang".
 *
 * @property integer $id
 * @property integer $id_anak_cabang
 * @property string $periode
 * @property string $no_sk
 * @property string $tanggal_sk
 * @property string $berlaku_sk
 * @property string $file_sk
 *
 * @property AnakCabang $idAnakCabang
 */
class KepengurusanAnakCabang extends \yii\db\ActiveRecord
{

    public $foto;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kepengurusan_anak_cabang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_anak_cabang', 'no_sk', 'tanggal_sk'], 'required'],
            [['id_anak_cabang'], 'integer'],
            [['periode'], 'string', 'max' => 50],
            [['foto'], 'file', 'extensions'=>'jpg, jpeg, png'],
            [['no_sk', 'tanggal_sk', 'berlaku_sk', 'file_sk'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_anak_cabang' => 'Anak Cabang',
            'periode' => 'Periode',
            'no_sk' => 'No Sk',
            'tanggal_sk' => 'Tanggal Sk',
            'berlaku_sk' => 'Berlaku Sk',
            'file_sk' => 'File Sk',
            'foto'=>'File SK',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAnakCabang()
    {
        return $this->hasOne(AnakCabang::className(), ['id' => 'id_anak_cabang']);
    }

    public function getListAnakCabang(){
        $dataAnakCabang = AnakCabang::find()->orderBy(['nama'=>'ASC'])->all();

        return ArrayHelper::map($dataAnakCabang, 'id', 'nama');
    }
    public function getListAnggota(){
        $dataAnggota = Anggota::find()->orderBy(['nama_anggota'=>'ASC'])->all();

        return ArrayHelper::map($dataAnggota, 'id_anggota', 'nama_anggota');
    }
}
