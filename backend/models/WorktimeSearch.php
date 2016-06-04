<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Worktime;

/**
 * WorktimeSearch represents the model behind the search form about `backend\models\Worktime`.
 */
class WorktimeSearch extends Worktime
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid'], 'integer'],
            [['worktimename', 'detial', 'createdate'], 'safe'],
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
        $query = Worktime::find();

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
            'createdate' => $this->createdate,
        ]);

        $query->andFilterWhere(['like', 'worktimename', $this->worktimename])
            ->andFilterWhere(['like', 'detial', $this->detial]);

        return $dataProvider;
    }
}
