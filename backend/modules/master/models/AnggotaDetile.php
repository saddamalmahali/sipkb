<?php

namespace backend\modules\master\models;

use Yii;

/**
 * This is the model class for table "anggota_detile".
 *
 * @property integer $id
 * @property integer $id_anggota
 * @property string $email
 * @property string $no_hp
 * @property string $foto
 *
 * @property Anggota $idAnggota
 * @property RiwayatOrganisasi[] $riwayatOrganisasis
 */
class AnggotaDetile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anggota_detile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_anggota'], 'required'],
            [['id_anggota'], 'integer'],
            [['email', 'no_hp'], 'string', 'max' => 45],
            [['foto'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_anggota' => 'Id Anggota',
            'email' => 'Email',
            'no_hp' => 'No Hp',
            'foto' => 'Foto',
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
    public function getRiwayatOrganisasis()
    {
        return $this->hasMany(RiwayatOrganisasi::className(), ['id_detile' => 'id']);
    }
}
