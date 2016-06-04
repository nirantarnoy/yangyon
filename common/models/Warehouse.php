<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "warehouse".
 *
 * @property integer $recid
 * @property string $warehousename
 * @property string $detail
 * @property integer $type
 * @property integer $calculation
 * @property string $createdate
 * @property string $updatedate
 */
class Warehouse extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'warehouse';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'calculation'], 'integer'],
            [['createdate', 'updatedate'], 'safe'],
            [['warehousename', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'warehousename' => 'Warehousename',
            'detail' => 'Detail',
            'type' => 'Type',
            'calculation' => 'Calculation',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
        ];
    }
}
