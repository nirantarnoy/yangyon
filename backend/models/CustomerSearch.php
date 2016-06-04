<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Customer;

/**
 * CustomerSearch represents the model behind the search form about `backend\models\Customer`.
 */
class CustomerSearch extends Customer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid'], 'integer'],
            [['customername', 'detail', 'taxid', 'payment', 'customergroupid'], 'safe'],
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
        $query = Customer::find();
        
        $query->joinWith(['groups']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
             $dataProvider->sort->attributes['customergroupid'] = [ //ชื่อฟีลด์
            'asc' => ['customergroup.groupname' => SORT_ASC],
            'desc' => ['customergroup.groupname' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'recid' => $this->recid,
          //  'customergroupid' => $this->customergroupid,
            'createdate' => $this->createdate,
        ]);

        $query->andFilterWhere(['like', 'customername', $this->customername])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'taxid', $this->taxid])
           ->andFilterWhere(['like', 'customergroup.groupname', $this->customergroupid])
            ->andFilterWhere(['like', 'payment', $this->payment]);

        return $dataProvider;
    }
}
