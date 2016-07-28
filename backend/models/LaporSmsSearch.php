<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LaporSms;
use app\modules\master\models\KelompokWilayah;
use yii\helpers\ArrayHelper;

/**
 * AnakCabangSearch represents the model behind the search form about `app\modules\master\models\AnakCabang`.
 */
class LaporSmsSearch extends LaporSms
{
    /**
     * @inheritdoc
     */
    public $wilayah;
    public function rules()
    {
        return [
            [['id', 'tanggal', 'pengirim', 'pesan', 'wilayah'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = LaporSms::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>false,
            'pagination'=>[
                'pageSize'=>5,
            ]
        ]);

        $this->load($params);

        $query->joinWith('anggotaDetile')
        ->joinWith('anggotaDetile.idAnggota')
        ->joinWith('anggotaDetile.idAnggota.idDetileKepengurusan')
        ->joinWith('anggotaDetile.idAnggota.idDetileKepengurusan.idKepengurusan')
        ->joinWith('anggotaDetile.idAnggota.idDetileKepengurusan.idKepengurusan.idAnakCabang')
        ->joinWith('anggotaDetile.idAnggota.idDetileKepengurusan.idKepengurusan.idAnakCabang.idKelompok')

        ;

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'tanggal' => $this->tanggal,
            'pengirim' => $this->pengirim,
            'pesan' => $this->pesan,

        ]);

        $query->andFilterWhere(['like', 'tanggal', $this->tanggal])
            ->andFilterWhere(['like', 'pengirim', $this->pengirim])
            ->andFilterWhere(['like', 'pesan', $this->pesan])
            ->andFilterWhere(['like', 'kelompok_wilayah.id_kelompok', $this->wilayah]);

        return $dataProvider;
    }

    public function getWilayah(){
        $model = KelompokWilayah::find()->orderBy(['nama_kelompok'=>'SORT_ASC'])->all();

        return ArrayHelper::map($model, 'id_kelompok', 'nama_kelompok');
    }
}
