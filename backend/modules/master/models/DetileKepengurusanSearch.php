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

    public $alamat;
    public $anak_cabang;
    public $periode;

    public function rules()
    {
        return [
            [['id', 'id_kepengurusan',], 'integer'],
            [['jabatan',  'periode','alamat', 'id_anggota', 'anak_cabang'], 'safe'],
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

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>false, 
			'pagination'=>[
				'pageSize'=>5,
			]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('idAnggota');
        $query->joinWith('idKepengurusan');

        // grid filtering conditions
        

        $query->andFilterWhere(['like', 'jabatan', $this->jabatan])
                ->andFilterWhere(['like', 'anggota.nama_anggota', $this->id_anggota])
                ->andFilterWhere(['like', 'anggota.alamat_anggota', $this->alamat])
                ->andFilterWhere(['like', 'kepengurusan_anak_cabang.periode', $this->periode])
                ->andFilterWhere(['like', 'id_kepengurusan', $this->id_kepengurusan]);

        return $dataProvider;
    }
}
