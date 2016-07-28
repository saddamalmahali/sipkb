<?php

namespace app\modules\master\models;

use Yii;

/**
 * This is the model class for table "kepengurusan_dpc".
 *
 * @property integer $id
 * @property string $id_kepengurusan
 * @property string $periode
 * @property string $tanggal_sk
 * @property string $berlaku_sk
 * @property string $keterangan
 */
class KepengurusanDpc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'kepengurusan_dpc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kepengurusan', 'periode', 'tanggal_sk', 'berlaku_sk'], 'required'],
            [['tanggal_sk', 'berlaku_sk'], 'safe'],
            [['id_kepengurusan', 'periode'], 'string', 'max' => 45],
            [['keterangan'], 'string', 'max' => 1024],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kepengurusan' => 'ID Kepengurusan',
            'periode' => 'Periode',
            'tanggal_sk' => 'Tanggal Sk',
            'berlaku_sk' => 'Berlaku Sk',
            'keterangan' => 'Keterangan',
        ];
    }
}
