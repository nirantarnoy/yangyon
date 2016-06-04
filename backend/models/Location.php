<?php
namespace backend\Models;
use backend\Models\Warehouse;
use yii\db\ActiveRecord;

class Location extends \common\models\Location{
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
    public function getWarehouse(){
        return $this->hasOne(Warehouse::className(),['recid'=>'warehouseid']);
    }
}

