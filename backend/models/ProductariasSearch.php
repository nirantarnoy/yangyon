<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Productarias;

/**
 * ProductariasSearch represents the model behind the search form about `backend\models\Productarias`.
 */
class ProductariasSearch extends Productarias
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'productid', 'vendorid'], 'integer'],
            [['ariasname', 'detail', 'createdate'], 'safe'],
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
        $query = Productarias::find();

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
            'productid' => $this->productid,
            'vendorid' => $this->vendorid,
            'createdate' => $this->createdate,
        ]);

        $query->andFilterWhere(['like', 'ariasname', $this->ariasname])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
