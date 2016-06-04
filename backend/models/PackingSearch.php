<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Packing;

/**
 * PackingSearch represents the model behind the search form about `backend\models\Packing`.
 */
class PackingSearch extends Packing
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid'], 'integer'],
            [['packcode', 'detail', 'createdate'], 'safe'],
            [['factor'], 'number'],
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
        $query = Packing::find();

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
            'factor' => $this->factor,
            'createdate' => $this->createdate,
        ]);

        $query->andFilterWhere(['like', 'packcode', $this->packcode])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
