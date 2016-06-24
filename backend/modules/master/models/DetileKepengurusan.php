<?php

namespace app\modules\master\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\db\Query;

/**
 * This is the model class for table "detile_kepengurusan".
 *
 * @property integer $id
 * @property integer $id_kepengurusan
 * @property integer $id_anggota
 * @property string $jabatan
 *
 * @property Anggota $idAnggota
 * @property KepengurusanAnakCabang $idKepengurusan
 */
class DetileKepengurusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $pac;

    public static function tableName()
    {
        return 'detile_kepengurusan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kepengurusan',  'jabatan'], 'required'],
            [['id_kepengurusan', 'id_anggota'], 'integer'],
            [['pac'], 'safe'],
            [['jabatan'], 'string', 'max' => 100],
            [['id_anggota'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['id_anggota' => 'id_anggota']],
            [['id_kepengurusan'], 'exist', 'skipOnError' => true, 'targetClass' => KepengurusanAnakCabang::className(), 'targetAttribute' => ['id_kepengurusan' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kepengurusan' => 'Masa Kepengurusan',
            'pac'=>'PAC',
            'id_anggota' => 'Nama Anggota',
            'jabatan' => 'Jabatan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAnggota()
    {
        return $this->hasOne(Anggota::className(), ['id_anggota' => 'id_anggota']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKepengurusan()
    {
        return $this->hasOne(KepengurusanAnakCabang::className(), ['id' => 'id_kepengurusan']);
    }

    public function getListPac(){
        
        $model = AnakCabang::find()->orderBy(['nama'=>'ASC'])->all();

        return ArrayHelper::map($model, 'id', 'nama');
    }

    public function getPac($id){
        $kep = KepengurusanAnakCabang::find()->where(['id'=>$id])->one();
        $pac = AnakCabang::find()->where(['id'=>$kep->id_anak_cabang])->one();

        return $pac;
    }

    public function getListAnggota(){
        $query = new Query();
        $query->select('id_anggota')->from('detile_kepengurusan');

        $model = Anggota::find()->where(['not in', 'id_anggota', $query])->orderBy(['nama_anggota'=>'ASC'])->all();

        return ArrayHelper::map($model, 'id_anggota', 'nama_anggota');
    }
}
