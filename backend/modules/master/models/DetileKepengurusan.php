<?php

namespace app\modules\master\models;

use Yii;

/**
 * This is the model class for table "detile_kepengurusan".
 *
 * @property integer $id
 * @property integer $id_kepengurusan
 * @property integer $id_anggota
 *
 * @property KepengurusanAnakCabang $idKepengurusan
 * @property Anggota $idAnggota
 */
class DetileKepengurusan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
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
            [['id', 'jabatan'], 'required'],
            [['id', 'id_kepengurusan', 'id_anggota'], 'integer'],
            [['jabatan'], 'string', 'max'=>100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kepengurusan' => 'Id Kepengurusan',
            'id_anggota' => 'Id Anggota',
            'jabatan'=> 'Jabatan'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdKepengurusan()
    {
        return $this->hasOne(KepengurusanAnakCabang::className(), ['id' => 'id_kepengurusan']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAnggota()
    {
        return $this->hasOne(Anggota::className(), ['id_anggota' => 'id_anggota']);
    }
}
