<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Sequence;

/**
 * SequenceSearch represents the model behind the search form about `backend\models\Sequence`.
 */
class SequenceSearch extends Sequence
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['recid', 'activitytype', 'activitysubtype', 'startno', 'endno', 'createby'], 'integer'],
            [['prefix', 'createdate'], 'safe'],
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
        $query = Sequence::find();

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
            'activitytype' => $this->activitytype,
            'activitysubtype' => $this->activitysubtype,
            'startno' => $this->startno,
            'endno' => $this->endno,
            'createdate' => $this->createdate,
            'createby' => $this->createby,
        ]);

        $query->andFilterWhere(['like', 'prefix', $this->prefix]);

        return $dataProvider;
    }
}
