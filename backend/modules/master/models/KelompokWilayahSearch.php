<?php

namespace app\modules\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\master\models\KelompokWilayah;

/**
 * KelompokWilayahSearch represents the model behind the search form about `app\modules\master\models\KelompokWilayah`.
 */
class KelompokWilayahSearch extends KelompokWilayah
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_kelompok'], 'integer'],
            [['kode_kelompok', 'nama_kelompok'], 'safe'],
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
        $query = KelompokWilayah::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_kelompok' => $this->id_kelompok,
        ]);

        $query->andFilterWhere(['like', 'kode_kelompok', $this->kode_kelompok])
            ->andFilterWhere(['like', 'nama_kelompok', $this->nama_kelompok]);

        return $dataProvider;
    }
}
