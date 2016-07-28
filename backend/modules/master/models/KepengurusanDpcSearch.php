<?php

namespace app\modules\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\master\models\KepengurusanDpc;

/**
 * KepengurusanDpcSearch represents the model behind the search form about `app\modules\master\models\KepengurusanDpc`.
 */
class KepengurusanDpcSearch extends KepengurusanDpc
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['id_kepengurusan', 'periode', 'tanggal_sk', 'berlaku_sk', 'keterangan'], 'safe'],
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
        $query = KepengurusanDpc::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tanggal_sk' => $this->tanggal_sk,
            'berlaku_sk' => $this->berlaku_sk,
        ]);

        $query->andFilterWhere(['like', 'id_kepengurusan', $this->id_kepengurusan])
            ->andFilterWhere(['like', 'periode', $this->periode])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
