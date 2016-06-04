<?php
namespace backend\Models;
use yii\db\ActiveRecord;
class Product extends \common\models\Product{
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
    public function getPlan(){
        return $this->hasOne(Plan::className(), ['recid'=>'planid']);
    }
   public function getGroups(){
        return $this->hasOne(Productgroup::className(), ['recid'=>'prodgroupid']);
    }
   public function getCategory(){
        return $this->hasOne(Productcategory::className(), ['recid'=>'prodcategoryid']);
    }
   public function getUnit(){
        return $this->hasOne(Unit::className(), ['recid'=>'inventunit']);
    }
  
}


