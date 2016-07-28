<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inbox_sms".
 *
 * @property integer $id
 * @property string $pengirim
 * @property string $tanggal
 * @property string $pesan
 */
class InboxSms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inbox_sms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pengirim', 'tanggal', 'pesan'], 'required'],
            [['tanggal'], 'safe'],
            [['pengirim'], 'string', 'max' => 45],
            [['pesan'], 'string', 'max' => 250],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pengirim' => 'Pengirim',
            'tanggal' => 'Tanggal',
            'pesan' => 'Pesan',
        ];
    }
}
