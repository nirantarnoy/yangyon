<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "saletable".
 *
 * @property integer $recid
 * @property string $saleno
 * @property string $deliverydate
 * @property string $shipdate
 * @property integer $customerid
 * @property integer $payment
 * @property double $discount
 * @property double $discountper
 * @property integer $vat
 * @property double $discountamt
 * @property double $discountperamt
 * @property double $vatamt
 * @property double $totalamt
 * @property integer $status
 * @property string $totaltext
 * @property string $remark
 * @property string $note
 * @property string $createdate
 */
class Saletable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'saletable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deliverydate', 'shipdate', 'createdate'], 'safe'],
            [['customerid', 'payment', 'vat', 'status'], 'integer'],
            [['discount', 'discountper', 'discountamt', 'discountperamt', 'vatamt', 'totalamt'], 'number'],
            [['saleno', 'totaltext', 'remark', 'note'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'saleno' => 'Saleno',
            'deliverydate' => 'Deliverydate',
            'shipdate' => 'Shipdate',
            'customerid' => 'Customerid',
            'payment' => 'Payment',
            'discount' => 'Discount',
            'discountper' => 'Discountper',
            'vat' => 'Vat',
            'discountamt' => 'Discountamt',
            'discountperamt' => 'Discountperamt',
            'vatamt' => 'Vatamt',
            'totalamt' => 'Totalamt',
            'status' => 'Status',
            'totaltext' => 'Totaltext',
            'remark' => 'Remark',
            'note' => 'Note',
            'createdate' => 'Createdate',
        ];
    }
}
