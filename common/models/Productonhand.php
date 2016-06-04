<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productonhand".
 *
 * @property integer $recid
 * @property integer $prodid
 * @property integer $warehouseid
 * @property integer $locationid
 * @property integer $lotid
 * @property integer $serialid
 * @property double $realqty
 * @property double $reservqty
 * @property double $qty
 * @property integer $status
 * @property string $createdate
 */
class Productonhand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productonhand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prodid', 'warehouseid', 'locationid', 'lotid', 'serialid', 'status'], 'integer'],
            [['realqty', 'reservqty', 'qty'], 'number'],
            [['createdate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'prodid' => 'Prodid',
            'warehouseid' => 'Warehouseid',
            'locationid' => 'Locationid',
            'lotid' => 'Lotid',
            'serialid' => 'Serialid',
            'realqty' => 'Realqty',
            'reservqty' => 'Reservqty',
            'qty' => 'Qty',
            'status' => 'Status',
            'createdate' => 'Createdate',
        ];
    }
}
