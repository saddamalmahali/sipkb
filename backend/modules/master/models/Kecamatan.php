<?php

namespace app\modules\master\models;

use Yii;

/**
 * This is the model class for table "kecamatan".
 *
 * @property integer $IDKecamatan
 * @property string $Nama
 * @property integer $IDKabupaten
 * @property integer $StatusSearch
 * @property integer $Prabowo
 * @property integer $Jokowi
 * @property integer $Jumlah
 * @property integer $StatusJumlah
 */
class Kecamatan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $jumlahanggota;

    public static function tableName()
    {
        return 'kecamatan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IDKecamatan', 'IDKabupaten', 'StatusSearch', 'Prabowo', 'Jokowi', 'Jumlah', 'StatusJumlah'], 'required'],
            [['IDKecamatan', 'IDKabupaten', 'StatusSearch', 'Prabowo', 'Jokowi', 'Jumlah', 'StatusJumlah'], 'integer'],
            [['Nama'], 'string', 'max' => 45],
            [['jumlahanggota'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IDKecamatan' => 'Idkecamatan',
            'Nama' => 'Nama',
            'IDKabupaten' => 'Idkabupaten',
            'StatusSearch' => 'Status Search',
            'Prabowo' => 'Prabowo',
            'Jokowi' => 'Jokowi',
            'Jumlah' => 'Jumlah',
            'StatusJumlah' => 'Status Jumlah',
        ];
    }
}
