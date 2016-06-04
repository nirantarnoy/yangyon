<?php
namespace backend\Models;
use yii\db\ActiveRecord;
class Bomlist extends \common\models\Bomlist{
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
    public function getProd(){
        return $this->hasOne(Product::className(), ['recid'=>'productid']);
    }
}