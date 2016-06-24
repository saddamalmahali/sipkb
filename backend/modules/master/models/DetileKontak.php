<?php

namespace app\modules\master\models;

use Yii;

/**
 * This is the model class for table "detile_kontak".
 *
 * @property integer $id
 * @property integer $id_anggota
 * @property string $no_hp
 * @property string $email
 * @property string $no_rumah
 *
 * @property Anggota $idAnggota
 */
class DetileKontak extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detile_kontak';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_hp'], 'required'],
            [['id_anggota'], 'integer'],
            [['no_hp'], 'string', 'max' => 20],
            [['email'], 'string', 'max' => 100],
            [['no_rumah'], 'string', 'max' => 10],
            [['id_anggota'], 'exist', 'skipOnError' => true, 'targetClass' => Anggota::className(), 'targetAttribute' => ['id_anggota' => 'id_anggota']],
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
            'no_hp' => 'No Hp',
            'email' => 'Email',
            'no_rumah' => 'No Rumah',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAnggota()
    {
        return $this->hasOne(Anggota::className(), ['id_anggota' => 'id_anggota']);
    }
}
