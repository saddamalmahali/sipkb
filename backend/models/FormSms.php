<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use yii\db\Expression;
use common\models\Outbox;


class FormSms extends Model
{
	const SEND_OPT_SINGLE = 1;
	const SEND_OPT_MULTI = 2;
	const SEND_OPT_GROUP = 3;

	const TIME_OPT_NOW = 0;
	const TIME_OPT_DATETIME = 10;
	const TIME_OPT_DELAY = 20;

	public $sendingOptions;
	public $timeOptions;
	public $sendingDateTime;
	public $sendingTime;
	public $number;
	public $group;
	public $text;

	public function attributeLabels(){
		return [
			'number'=> 'Kontak',
			'text' => 'Isi Pesan',
			'sendingOptions' => 'Pilihan Pengiriman',
			'timeOptions'=>'Waktu Pengiriman',
			'sendingDateTime' => 'Tanggal dan Jam',
			'sendingTime' => 'Jam dan Menit',
		];
	}

	public function rules(){
		return [
			[['number', 'text'], 'required'],
			['sendingOptions','in', 'range'=> array_keys($this->getSendingOptions())],
			['timeOptions', 'in', 'range'=> array_keys($this->getTimeOptions())],
			['sendingDateTime', 'date', 'format'=> 'yyyy-MM-dd HH:mm:ss'],
			['sendingTime', 'date', 'format'=>'HH:mm']
		];
	}

	public function getSendingOptions(){
		return[
			self::SEND_OPT_SINGLE => 'Masukan Secara Manual',
			self::SEND_OPT_MULTI=> 'Daftar Kontak',
			self::SEND_OPT_GROUP => 'Group',
		];
	}

	public function getTimeOptions()
    {
        return [
            self::TIME_OPT_NOW => 'Sekarang Juga',
            self::TIME_OPT_DATETIME => 'Pada Tanggal/Waktu',
            self::TIME_OPT_DELAY => 'Setelah Penundaan',
        ];
    }

	public function getGroupOptions()
    {
        $groups = PbkGroups::find()->all();
        
        return ArrayHelper::map($groups, 'ID', 'Name');
    }

    public function send(){
    	$now = new \DateTime();
    	$time = $now->format('Y-m-d H:i:s');
    	$this->insertIntoOutbox($this->number, $this->text, $time );
    }

    private function insertIntoOutbox($number, $text, $time){
    	$outbox = new Outbox();
    	$outbox->DestinationNumber = $number;
        $outbox->TextDecoded = $text;
        $outbox->SendingDateTime = $time;
        $outbox->save(false);
    }


}