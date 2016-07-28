<?php

namespace app\modules\master\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\master\models\Anggota;

/**
 * AnggotaSearch represents the model behind the search form about `app\modules\master\models\Anggota`.
 */
class AnggotaSearch extends Anggota
{
    /**
     * @inheritdoc
     */

    public $kontak;
    public function rules()
    {
        return [
            [['id_anggota', 'id_kelompok'], 'integer'],
            [['nama_anggota', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'alamat_anggota', 'kecamatan', 'kabupaten', 'no_ktp', 'status', 'kontak'], 'safe'],
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
        $query = Anggota::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=>false,
			'pagination'=>[
				'pageSize'=>6,
			]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith('anggotaDetile');

        $query->andFilterWhere([
            'id_anggota' => $this->id_anggota,
            'id_kelompok' => $this->id_kelompok,
            'tanggal_lahir' => $this->tanggal_lahir,
        ]);


        $query->orderBy(['id_anggota'=>'SORT_DESC']);
        
        $query->andFilterWhere(['like', 'nama_anggota', $this->nama_anggota])
            ->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin])
            ->andFilterWhere(['like', 'tempat_lahir', $this->tempat_lahir])
            ->andFilterWhere(['like', 'alamat_anggota', $this->alamat_anggota])
            ->andFilterWhere(['like', 'kecamatan', $this->kecamatan])
            ->andFilterWhere(['like', 'kabupaten', $this->kabupaten])
            ->andFilterWhere(['like', 'no_ktp', $this->no_ktp])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'detile_kontak.no_hp', $this->kontak]);



        return $dataProvider;
    }
}
