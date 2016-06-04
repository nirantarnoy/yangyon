<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Productonhand;

/**
 * ProductonhandSearch represents the model behind the search form about `backend\models\Productonhand`.
 */
class ProductonhandSearch extends Productonhand
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'prodid', 'warehouseid', 'locationid', 'lotid', 'serialid', 'status'], 'integer'],
            [['realqty', 'reservqty', 'qty'], 'number'],
            [['createdate'], 'safe'],
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
        $query = Productonhand::find();

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
            'prodid' => $this->prodid,
            'warehouseid' => $this->warehouseid,
            'locationid' => $this->locationid,
            'lotid' => $this->lotid,
            'serialid' => $this->serialid,
            'realqty' => $this->realqty,
            'reservqty' => $this->reservqty,
            'qty' => $this->qty,
            'status' => $this->status,
            'createdate' => $this->createdate,
        ]);

        return $dataProvider;
    }
    public function search2($params)
    {
        $query = Productonhand::find()->where(['prodid'=>$params]);

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
            'prodid' => $this->prodid,
            'warehouseid' => $this->warehouseid,
            'locationid' => $this->locationid,
            'lotid' => $this->lotid,
            'serialid' => $this->serialid,
            'realqty' => $this->realqty,
            'reservqty' => $this->reservqty,
            'qty' => $this->qty,
            'status' => $this->status,
            'createdate' => $this->createdate,
        ]);

        return $dataProvider;
    }
}
