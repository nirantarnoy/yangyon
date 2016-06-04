<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bom".
 *
 * @property integer $recid
 * @property integer $bomlistid
 * @property integer $productid
 * @property string $qtyper
 * @property integer $type
 * @property integer $calculation
 * @property integer $level
 */
class Bom extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bom';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bomlistid', 'productid', 'type', 'calculation', 'level'], 'integer'],
            [['qtyper'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'bomlistid' => 'Bomlistid',
            'productid' => 'Productid',
            'qtyper' => 'Qtyper',
            'type' => 'Type',
            'calculation' => 'Calculation',
            'level' => 'Level',
        ];
    }
}
