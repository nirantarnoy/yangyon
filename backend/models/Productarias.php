<?php
namespace backend\Models;

class Productarias extends \common\models\Productarias{
    public function getProd(){
        return $this->hasOne(Product::className(), ['recid'=>'productid']);
    }
    public function getVendor(){
        return $this->hasOne(Vendor::className(), ['recid'=>'vendorid']);
    }
}
