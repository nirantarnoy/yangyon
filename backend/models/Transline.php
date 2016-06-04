<?php
namespace backend\Models;
use yii\db\ActiveRecord;

class Transline extends \common\models\Transline{
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
    public function getProduct(){
        return $this->hasOne(Product::className(), ['recid'=>'prodid']);
    }
       public function getUnits(){
        return $this->hasOne(Unit::className(), ['recid'=>'unitid']);
    }
        public function getWh(){
        return $this->hasOne(Warehouse::className(), ['recid'=>'warhouseid']);
    }
        public function getLoc(){
        return $this->hasOne(Location::className(), ['recid'=>'locationid']);
    }
       public function getLoc2(){
        return $this->hasOne(Location::className(), ['recid'=>'locationid2']);
    }
        public function getLot(){
        return $this->hasOne(Lotnumber::className(), ['recid'=>'lotid']);
    }
    public function getLot2(){
        return $this->hasOne(Lotnumber::className(), ['recid'=>'lotid2']);
    }
}
