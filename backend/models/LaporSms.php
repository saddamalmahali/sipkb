<?php

namespace app\models;

use Yii;
use app\modules\master\models\Anggota;
use app\modules\master\models\DetileKontak;
use yii\helpers\Json;
use yii\helpers\ArrayHelper;
use app\modules\master\models\KelompokWilayah;

/**
 * This is the model class for table "lapor_sms".
 *
 * @property integer $id
 * @property string $pengirim
 * @property string $pesan
 * @property string $tanggal
 */
class LaporSms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lapor_sms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pengirim', 'pesan'], 'required'],
            [['tanggal'], 'safe'],
            [['pengirim'], 'string', 'max' => 45],
            [['pesan'], 'string', 'max' => 512],
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
            'pesan' => 'Pesan',
            'tanggal' => 'Tanggal',
        ];
    }
    
    public function getNamaAnggota($no_hp)
    {
        $detile = DetileKontak::find()->where(['no_hp'=>$no_hp])->one();
        
        $anggota = $detile->getIdAnggota()->one();
        
        return $anggota->nama_anggota;
    }
    
    public function getAnggota($no_hp){
        $detile = DetileKontak::find()->where(['no_hp'=>$no_hp])->one();
        
        $anggota = $detile->getIdAnggota()->one();
        
        return $anggota;
    }
    
    public function getDetile(){
        
    }
    
    public function getAnggotaDetile()
    {
		
        return $this->hasOne(DetileKontak::className(), ['no_hp' => 'pengirim']);
    }
    
    public function getCharting(){
        
        $coutn = $this->find()->count();
        
		$sql = "					
				select kw.kode_kelompok, kw.nama_kelompok,
				@jumlah_laki := (
									select count(ls.id) from lapor_sms ls 
									join detile_kontak dkt on dkt.no_hp = ls.pengirim
									join anggota a on a.id_anggota = dkt.id_anggota
									join detile_kepengurusan dk on dk.id_anggota = a.id_anggota
									join kepengurusan_anak_cabang kac on kac.id = dk.id_kepengurusan
									join anak_cabang ac on ac.id = kac.id_anak_cabang    
									where ac.id_kelompok = kw.id_kelompok 
										and ls.pengirim = dkt.no_hp 
										and kac.berlaku_sk >= now()
										and a.jenis_kelamin = 'laki-laki'
								)
				as jml_cowo,
				@jumlah_perempuan := (
									select count(ls.id) from lapor_sms ls 
									join detile_kontak dkt on dkt.no_hp = ls.pengirim
									join anggota a on a.id_anggota = dkt.id_anggota
									join detile_kepengurusan dk on dk.id_anggota = a.id_anggota
									join kepengurusan_anak_cabang kac on kac.id = dk.id_kepengurusan
									join anak_cabang ac on ac.id = kac.id_anak_cabang    
									where ac.id_kelompok = kw.id_kelompok 
										and ls.pengirim = dkt.no_hp 
										and kac.berlaku_sk >= now()
										and a.jenis_kelamin = 'perempuan'
								)
				as jml_prp,

				@jumlah_lapor := (
									select count(ls.id) from lapor_sms ls 
									join detile_kontak dkt on dkt.no_hp = ls.pengirim
									join anggota a on a.id_anggota = dkt.id_anggota
									join detile_kepengurusan dk on dk.id_anggota = a.id_anggota
									join kepengurusan_anak_cabang kac on kac.id = dk.id_kepengurusan
									join anak_cabang ac on ac.id = kac.id_anak_cabang    
									where ac.id_kelompok = kw.id_kelompok and ls.pengirim = dkt.no_hp and kac.berlaku_sk >= now()
								)
				as jumlah_lpr

				from kelompok_wilayah  kw  
				join (select @jumlah_laki :=0) jlk
				join (select @jumlah_perempuan :=0) jp
				join (select @jumlah_lapor :=0) jl
		";
		
		
        
        $list_chat = Yii::$app->db->createCommand($sql)->queryAll();
        
        
        
        return Json::encode($list_chat);
        
        
    }
    
    public function getLastLapor(){
        $lapor = $this->find()->asArray()->orderBy(['tanggal'=>SORT_DESC])->limit(3)->all();
        
        $items = [];
        foreach($lapor as $item =>$i){
            $items[$item]= [
                'data'=>$i,
                'nama'=>$this->getAnggota($i['pengirim'])
            ];
        }
        
        return Json::encode($items);
    }

    public function getWilayah(){
        $model = KelompokWilayah::find()->orderBy(['nama_kelompok'=>'SORT_ASC'])->all();

        return ArrayHelper::map($model, 'id_kelompok', 'nama_kelompok');
    }
}
