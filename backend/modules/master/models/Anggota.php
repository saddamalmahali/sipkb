<?php

namespace app\modules\master\models;

use Yii;

/**
 * This is the model class for table "anggota".
 *
 * @property integer $id_anggota
 * @property string $nama_anggota
 * @property string $jenis_kelamin
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $alamat_anggota
 * @property string $kecamatan
 * @property string $kabupaten
 * @property string $no_ktp
 */
class Anggota extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'anggota';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_anggota', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat_anggota', 'kecamatan', 'kabupaten', 'no_ktp'], 'required'],
            [['jenis_kelamin'], 'string'],
            [['tanggal_lahir'], 'safe'],
            [['nama_anggota'], 'string', 'max' => 255],
            [['tempat_lahir', 'kecamatan', 'kabupaten'], 'string', 'max' => 100],
            [['alamat_anggota'], 'string', 'max' => 1024],
            [['no_ktp'], 'string', 'max' => 30]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_anggota' => 'Id Anggota',
            'nama_anggota' => 'Nama Anggota',
            'jenis_kelamin' => 'Jenis Kelamin',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'alamat_anggota' => 'Alamat Anggota',
            'kecamatan' => 'Kecamatan',
            'kabupaten' => 'Kabupaten',
            'no_ktp' => 'No Ktp',
        ];
    }
}
