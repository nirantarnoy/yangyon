<?php
namespace backend\Models;
use yii\db\ActiveRecord;
class Transadjust extends \common\models\Transtable{
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
}