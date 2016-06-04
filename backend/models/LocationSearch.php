<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Location;

/**
 * LocationSearch represents the model behind the search form about `backend\models\Location`.
 */
class LocationSearch extends Location
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid',], 'integer'],
            [['locationname', 'detail','updatedate', 'warehouseid'], 'safe'],
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
        $query = Location::find();

        $query->joinWith(['warehouse']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['warehouseid'] = [ //ชื่อฟีลด์
            'asc' => ['warehouse.warehousename' => SORT_ASC],
            'desc' => ['warehouse.warehousename' => SORT_DESC],
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
            //'warehouseid' => $this->warehouseid,
            'createdate' => $this->createdate,
            'updatedate' => $this->updatedate,
        ]);

        $query->andFilterWhere(['like', 'locationname', $this->locationname])
            ->andFilterWhere(['like', 'warehouse.warehousename', $this->warehouseid])
            ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
