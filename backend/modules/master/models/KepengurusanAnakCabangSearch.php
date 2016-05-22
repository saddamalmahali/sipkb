<?php

namespace app\modules\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\master\models\KepengurusanAnakCabang;

/**
 * KepengurusanAnakCabangSearch represents the model behind the search form about `app\modules\master\models\KepengurusanAnakCabang`.
 */
class KepengurusanAnakCabangSearch extends KepengurusanAnakCabang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_anak_cabang'], 'integer'],
            [['periode', 'no_sk', 'tanggal_sk', 'berlaku_sk', 'file_sk'], 'safe'],
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
        $query = KepengurusanAnakCabang::find();

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
            'id_anak_cabang' => $this->id_anak_cabang,
        ]);

        $query->andFilterWhere(['like', 'periode', $this->periode])
            ->andFilterWhere(['like', 'no_sk', $this->no_sk])
            ->andFilterWhere(['like', 'tanggal_sk', $this->tanggal_sk])
            ->andFilterWhere(['like', 'berlaku_sk', $this->berlaku_sk])
            ->andFilterWhere(['like', 'file_sk', $this->file_sk]);

        return $dataProvider;
    }
}
