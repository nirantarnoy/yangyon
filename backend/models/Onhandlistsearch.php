<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;


/**
 * PackingSearch represents the model behind the search form about `backend\models\Packing`.
 */
class OnhandlistSearch extends \common\models\VProductonhand
{
    /**
     * @inheritdoc
     */
      public function rules()
    {
        return [
            [['prodid'], 'integer'],
            //[['realqty', 'reserv', 'qty', 'minstock'], 'number'],
            [['prodcode', 'prodname'], 'string', 'max' => 255],
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
        $query = \common\models\VProductonhand::find();

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
          //  'prodcode' => $this->prodcode,
          //  'prodname' => $this->prodname,
//            'realqty' => $this->realqty,
//            'reserv' => $this->reserv,
//            'qty' => $this->qty,
//            'minstock'=>  $this->minstock,
            //'createdate' => $this->createdate,
        ]);

        $query->andFilterWhere(['like', 'prodcode', $this->prodcode])
            ->andFilterWhere(['like', 'prodname', $this->prodname]);

        return $dataProvider;
    }
}
