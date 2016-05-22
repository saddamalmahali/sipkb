<?php

namespace app\modules\master\models;

use Yii;

/**
 * This is the model class for table "detile_kontak".
 *
 * @property integer $id_detile_kontak
 * @property string $no_hp
 * @property string $email
 * @property string $no_rumah
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
            [['no_hp', 'email', 'no_rumah'], 'required'],
            [['no_hp', 'no_rumah'], 'string', 'max' => 15],
            [['email'], 'string', 'max' => 100],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_detile_kontak' => 'Id Detile Kontak',
            'no_hp' => 'No Hp',
            'email' => 'Email',
            'no_rumah' => 'No Rumah',
        ];
    }
}
