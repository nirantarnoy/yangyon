<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Lotnumber;

/**
 * LotnumberSearch represents the model behind the search form about `backend\models\Lotnumber`.
 */
class LotnumberSearch extends Lotnumber
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid'], 'integer'],
            [['lotnumbercode', 'detail', 'enddate', 'prodid'], 'safe'],
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
        $query = Lotnumber::find();

        // add conditions that should always apply here
        $query->joinWith(['products']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
          $dataProvider->sort->attributes['prodid'] = [ //ชื่อฟีลด์
            'asc' => ['product.prodcode' => SORT_ASC],
            'desc' => ['product.prodcode' => SORT_DESC],
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
           // 'prodid' => $this->prodid,
            'startdate' => $this->startdate,
            'enddate' => $this->enddate,
            'createdate' => $this->createdate,
        ]);

        $query->andFilterWhere(['like', 'lotnumbercode', $this->lotnumbercode])
            ->andFilterWhere(['like', 'product.prodcode', $this->prodid])
   ->andFilterWhere(['like', 'detail', $this->detail]);

        return $dataProvider;
    }
}
