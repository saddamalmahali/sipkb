<?php

namespace app\modules\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\master\models\DetileKepengurusan;

/**
 * DetileKepengurusanSearch represents the model behind the search form about `app\modules\master\models\DetileKepengurusan`.
 */
class DetileKepengurusanSearch extends DetileKepengurusan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_kepengurusan', 'id_anggota'], 'integer'],
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
        $query = DetileKepengurusan::find();

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
            'id' => $this->id,
            'id_kepengurusan' => $this->id_kepengurusan,
            'id_anggota' => $this->id_anggota,
        ]);

        return $dataProvider;
    }
}
