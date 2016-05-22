<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "outbox_multipart".
 *
 * @property string $Text
 * @property string $Coding
 * @property string $UDH
 * @property integer $Class
 * @property string $TextDecoded
 * @property integer $ID
 * @property integer $SequencePosition
 */
class OutboxMultipart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'outbox_multipart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Text', 'Coding', 'UDH', 'TextDecoded'], 'string'],
            [['Class', 'ID', 'SequencePosition'], 'integer'],
            [['ID', 'SequencePosition'], 'required']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Text' => 'Text',
            'Coding' => 'Coding',
            'UDH' => 'Udh',
            'Class' => 'Class',
            'TextDecoded' => 'Text Decoded',
            'ID' => 'ID',
            'SequencePosition' => 'Sequence Position',
        ];
    }
}
