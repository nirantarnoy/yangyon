<?php
namespace backend\Models;

class Vendor extends \common\models\Vendor{
      public function getGroup(){
        return $this->hasOne(Vendorgroup::className(), ['recid'=>'vendorgroupid']);
    }

}

