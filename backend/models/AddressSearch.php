<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Address;

/**
 * AddressSearch represents the model behind the search form about `backend\models\Address`.
 */
class AddressSearch extends Address
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'district', 'city', 'province', 'addresstype', 'isprimary', 'addressofid'], 'integer'],
            [['address', 'detail', 'zipcode', 'createdate'], 'safe'],
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
        $query = Address::find();

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
            'district' => $this->district,
            'city' => $this->city,
            'province' => $this->province,
            'addresstype' => $this->addresstype,
            'isprimary' => $this->isprimary,
            'addressofid' => $this->addressofid,
            'createdate' => $this->createdate,
        ]);

        $query->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'detail', $this->detail])
            ->andFilterWhere(['like', 'zipcode', $this->zipcode]);

        return $dataProvider;
    }
}
