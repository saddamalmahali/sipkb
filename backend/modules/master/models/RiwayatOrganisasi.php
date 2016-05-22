<?php

namespace backend\modules\master\models;

use Yii;

/**
 * This is the model class for table "riwayat_organisasi".
 *
 * @property integer $id
 * @property string $deskripsi
 * @property string $periode
 * @property string $jabatan
 * @property integer $id_detile
 *
 * @property AnggotaDetile $idDetile
 */
class RiwayatOrganisasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'riwayat_organisasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deskripsi', 'periode'], 'required'],
            [['id_detile'], 'integer'],
            [['deskripsi'], 'string', 'max' => 1024],
            [['periode'], 'string', 'max' => 100],
            [['jabatan'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'deskripsi' => 'Deskripsi',
            'periode' => 'Periode',
            'jabatan' => 'Jabatan',
            'id_detile' => 'Id Detile',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDetile()
    {
        return $this->hasOne(AnggotaDetile::className(), ['id' => 'id_detile']);
    }
}
