<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Transissue;

/**
 * TransissueSearch represents the model behind the search form about `backend\models\Transissue`.
 */
class TransissueSearch extends Transissue
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'transtype', 'status'], 'integer'],
            [['transno', 'deatail', 'docref', 'transdate', 'createdate'], 'safe'],
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
        $query = Transissue::find();

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
            'recid' => $this->recid,
            'transtype' => 4,
            'transdate' => $this->transdate,
            'status' => $this->status,
            'createdate' => $this->createdate,
        ]);

        $query->andFilterWhere(['like', 'transno', $this->transno])
            ->andFilterWhere(['like', 'deatail', $this->deatail])
            ->andFilterWhere(['like', 'docref', $this->docref]);

        return $dataProvider;
    }
}
