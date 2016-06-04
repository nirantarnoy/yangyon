<?php
namespace backend\Models;
use yii\db\ActiveRecord;

class Warehouse extends \common\models\Warehouse{
     public function behaviors() {
        $current_timestamp = date('Y-m-d H:i:s');
        return[
            'timestamp'=>[
                'class'=>  \yii\behaviors\AttributeBehavior::className(),
                'attributes'=>[
                ActiveRecord::EVENT_BEFORE_INSERT=>'createdate',
                ActiveRecord::EVENT_BEFORE_UPDATE=>'updatedate',
                ],
                'value'=> $current_timestamp,
            ]
        ];
    }
}

