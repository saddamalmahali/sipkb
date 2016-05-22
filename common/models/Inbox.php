<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "inbox".
 *
 * @property string $UpdatedInDB
 * @property string $ReceivingDateTime
 * @property string $Text
 * @property string $SenderNumber
 * @property string $Coding
 * @property string $UDH
 * @property string $SMSCNumber
 * @property integer $Class
 * @property string $TextDecoded
 * @property integer $ID
 * @property string $RecipientID
 * @property string $Processed
 */
class Inbox extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'inbox';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UpdatedInDB', 'ReceivingDateTime'], 'safe'],
            [['Text', 'UDH', 'TextDecoded', 'RecipientID'], 'required'],
            [['Text', 'Coding', 'UDH', 'TextDecoded', 'RecipientID', 'Processed'], 'string'],
            [['Class'], 'integer'],
            [['SenderNumber', 'SMSCNumber'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'UpdatedInDB' => 'Updated In Db',
            'ReceivingDateTime' => 'Receiving Date Time',
            'Text' => 'Text',
            'SenderNumber' => 'Sender Number',
            'Coding' => 'Coding',
            'UDH' => 'Udh',
            'SMSCNumber' => 'Smscnumber',
            'Class' => 'Class',
            'TextDecoded' => 'Text Decoded',
            'ID' => 'ID',
            'RecipientID' => 'Recipient ID',
            'Processed' => 'Processed',
        ];
    }
}
