<?php
namespace backend\Models;

class Address extends \common\models\Address{
    public function getDistricts(){
      return $this->hasOne(\common\models\District::className(), ['DISTRICT_ID'=>'district']);
    }
   public function getCitys(){
      return $this->hasOne(\common\models\Amphur::className(), ['AMPHUR_ID'=>'city']);
    }
   public function getProvinces(){
       return $this->hasOne(\common\models\Province::className(), ['PROVINCE_ID'=>'province']);
    }
}

