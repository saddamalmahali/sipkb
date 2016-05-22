<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Inbox;

/**
 * InboxSearch represents the model behind the search form about `common\models\Inbox`.
 */
class InboxSearch extends Inbox
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['UpdatedInDB', 'ReceivingDateTime', 'Text', 'SenderNumber', 'Coding', 'UDH', 'SMSCNumber', 'TextDecoded', 'RecipientID', 'Processed'], 'safe'],
            [['Class', 'ID'], 'integer'],
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
        $query = Inbox::find();

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
            'UpdatedInDB' => $this->UpdatedInDB,
            'ReceivingDateTime' => $this->ReceivingDateTime,
            'Class' => $this->Class,
            'ID' => $this->ID,
        ]);

        $query->andFilterWhere(['like', 'Text', $this->Text])
            ->andFilterWhere(['like', 'SenderNumber', $this->SenderNumber])
            ->andFilterWhere(['like', 'Coding', $this->Coding])
            ->andFilterWhere(['like', 'UDH', $this->UDH])
            ->andFilterWhere(['like', 'SMSCNumber', $this->SMSCNumber])
            ->andFilterWhere(['like', 'TextDecoded', $this->TextDecoded])
            ->andFilterWhere(['like', 'RecipientID', $this->RecipientID])
            ->andFilterWhere(['like', 'Processed', $this->Processed]);

        return $dataProvider;
    }
}
