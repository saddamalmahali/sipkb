<?php

namespace app\modules\master\models;

use Yii;

/**
 * This is the model class for table "detile_kepengurusan_dpc".
 *
 * @property integer $id
 * @property integer $id_kepengurusan
 * @property integer $id_anggota
 * @property string $jabatan
 */
class DetileKepengurusanDpc extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'detile_kepengurusan_dpc';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kepengurusan'], 'required'],
            [['id_kepengurusan', 'id_anggota'], 'integer'],
            [['jabatan'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_kepengurusan' => 'Id Kepengurusan',
            'id_anggota' => 'Id Anggota',
            'jabatan' => 'Jabatan',
        ];
    }
}
