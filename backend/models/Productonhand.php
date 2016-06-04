<?php

namespace backend\Models;

use yii\db\ActiveRecord;

class Productonhand extends \common\models\Productonhand {

    public function behaviors() {
        $current_timestamp = date('Y-m-d H:i:s');
        return[
            'timestamp' => [
                'class' => \yii\behaviors\AttributeBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => 'createdate',
                // ActiveRecord::EVENT_BEFORE_UPDATE=>'modifydate',
                ],
                'value' => $current_timestamp,
            ]
        ];
    }

    public function getProduct() {
        return $this->hasOne(Product::className(), ['recid' => 'prodid']);
    }

    public function getUnits() {
        return $this->hasOne(Unit::className(), ['recid' => 'unit']);
    }

    public function getWh() {
        return $this->hasOne(Warehouse::className(), ['recid' => 'warehouseid']);
    }

    public function getLoc() {
        return $this->hasOne(Location::className(), ['recid' => 'locationid']);
    }

    public function getLot() {
        return $this->hasOne(Lotnumber::className(), ['recid' => 'lotid']);
    }

}
