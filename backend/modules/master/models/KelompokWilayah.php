<?php

namespace app\modules\master\models;

use Yii;

/**
 * This is the model class for table "kelompok_wilayah".
 *
 * @property integer $id_kelompok
 * @property string $kode_kelompok
 * @property string $nama_kelompok
 */
class KelompokWilayah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kelompok_wilayah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode_kelompok', 'nama_kelompok'], 'required'],
            [['kode_kelompok'], 'string', 'max' => 40],
            ['kode_kelompok', 'unique', 'message'=>'Kode Kelompok Sudah ada didalam database'],
            [['nama_kelompok'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_kelompok' => 'Id Kelompok',
            'kode_kelompok' => 'Kode Kelompok',
            'nama_kelompok' => 'Nama Kelompok',
        ];
    }
}
