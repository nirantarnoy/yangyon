<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Saletable;

/**
 * SaletableSearch represents the model behind the search form about `backend\models\Saletable`.
 */
class SaletableSearch extends Saletable
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'vat'], 'integer'],
            [['saleno', 'deliverydate', 'shipdate', 'createdate', 'customerid'], 'safe'],
            [['discount', 'discountper', 'discountamt', 'discountperamt', 'vatamt', 'totalamt'], 'number'],
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
        $query = Saletable::find();
        
        $query->joinWith(['customer']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['customerid'] = [ //ชื่อฟีลด์
            'asc' => ['customer.customername' => SORT_ASC],
            'desc' => ['customer.customername' => SORT_DESC],
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
            'deliverydate' => $this->deliverydate,
            'shipdate' => $this->shipdate,
         //   'customerid' => $this->customerid,
            'discount' => $this->discount,
            'discountper' => $this->discountper,
            'vat' => $this->vat,
            'discountamt' => $this->discountamt,
            'discountperamt' => $this->discountperamt,
            'vatamt' => $this->vatamt,
            'totalamt' => $this->totalamt,
            'createdate' => $this->createdate,
        ]);

        $query->andFilterWhere(['like', 'saleno', $this->saleno])
                ->andFilterWhere(['like', 'customer.customername', $this->customerid]);

        return $dataProvider;
    }
}
