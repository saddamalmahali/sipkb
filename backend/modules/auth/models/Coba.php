<?php

namespace app\modules\auth\models;

use Yii;

/**
 * This is the model class for table "coba".
 *
 * @property integer $id
 * @property string $judul
 * @property string $isi
 * @property string $keterangan
 */
class Coba extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'coba';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'judul', 'isi', 'keterangan'], 'required'],
            [['id'], 'integer'],
            [['judul'], 'string', 'max' => 100],
            [['isi'], 'string', 'max' => 1024],
            [['keterangan'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'judul' => 'Judul',
            'isi' => 'Isi',
            'keterangan' => 'Keterangan',
        ];
    }
}
