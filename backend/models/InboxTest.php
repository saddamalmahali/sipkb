<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inbox_test".
 *
 * @property integer $id
 * @property string $tanggal
 * @property string $pengirim
 * @property string $pesan
 */
class InboxTest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inbox_test';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tanggal', 'pengirim', 'pesan'], 'required'],
            [['tanggal'], 'safe'],
            [['pengirim'], 'string', 'max' => 45],
            [['pesan'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tanggal' => 'Tanggal',
            'pengirim' => 'Pengirim',
            'pesan' => 'Pesan',
        ];
    }
}
