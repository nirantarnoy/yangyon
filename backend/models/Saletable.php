<?php
namespace backend\Models;
use yii\db\ActiveRecord;

class Saletable extends \common\models\Saletable{
    public function behaviors() {
          $current_timestamp = date('Y-m-d H:i:s');
        return[
            'timestamp'=>[
                'class'=>  \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                ActiveRecord::EVENT_BEFORE_INSERT=>'createdate',
               // ActiveRecord::EVENT_BEFORE_UPDATE=>'modifydate',
                ],
                'value'=> $current_timestamp,
            ]
        ];
    }
    public function getCustomer(){
        return $this->hasOne(Customer::className(), ['recid'=>'customerid']);
    }
    public function getTerms(){
        return $this->hasOne(\common\models\Paymenttype::className(), ['recid'=>'payment']);
    }
}

