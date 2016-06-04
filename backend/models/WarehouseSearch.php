<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Warehouse;

/**
 * WarehouseSearch represents the model behind the search form about `backend\models\Warehouse`.
 */
class WarehouseSearch extends Warehouse
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'type', 'calculation'], 'integer'],
            [['warehousename', 'detail', 'createdate', 'updatedate'], 'safe'],
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
        $query = Warehouse::find();

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
            'type' => $this->type,
            'calculation' => $this->calculation,
            'createdate' => $this->createdate,
            'updatedate' => $this->updatedate,
        ]);

        $query->andFilterWhere(['like', 'warehousename', $this->warehousename])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
