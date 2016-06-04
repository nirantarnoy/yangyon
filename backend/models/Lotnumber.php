<?php
namespace backend\Models;
use yii\db\ActiveRecord;

class Lotnumber extends \common\models\Lotnumber{
     public function behaviors() {
        $current_timestamp = date('Y-m-d H:i:s');
        return[
            'timestamp'=>[
                'class'=>  \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                ActiveRecord::EVENT_BEFORE_INSERT=>'createdate',
                ],
                'value'=> $current_timestamp,
            ]
        ];
    }
       public function getProducts(){
        return $this->hasOne(Product::className(),['recid'=>'prodid']);
    }
}
