<?php

namespace app\modules\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\master\models\AnakCabang;

/**
 * AnakCabangSearch represents the model behind the search form about `app\modules\master\models\AnakCabang`.
 */
class AnakCabangSearch extends AnakCabang
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_kelompok', 'id_kecamatan'], 'integer'],
            [['kode_anak_cabang', 'nama', 'keterangan'], 'safe'],
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
        $query = AnakCabang::find();

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
            'id_kelompok' => $this->id_kelompok,
            'id_kecamatan' => $this->id_kecamatan,
            'nama' => $this->nama,
            'keterangan' => $this->keterangan,

        ]);

        $query->andFilterWhere(['like', 'kode_anak_cabang', $this->kode_anak_cabang])
            ->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'keterangan', $this->keterangan]);

        return $dataProvider;
    }
}
