<?php
namespace backend\Models;
use yii\db\ActiveRecord;

class Unit extends \common\models\Unit{
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
   
}


