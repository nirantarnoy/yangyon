<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $recid
 * @property string $customername
 * @property string $detail
 * @property integer $customergroupid
 * @property string $taxid
 * @property integer $payment
 * @property integer $currency
 * @property string $email
 * @property string $tel
 * @property string $mobile
 * @property string $createdate
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customergroupid', 'payment', 'currency'], 'integer'],
            [['createdate'], 'safe'],
            [['customername', 'detail', 'email', 'tel', 'mobile'], 'string', 'max' => 255],
            [['taxid'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'customername' => 'Customername',
            'detail' => 'Detail',
            'customergroupid' => 'Customergroupid',
            'taxid' => 'Taxid',
            'payment' => 'Payment',
            'currency' => 'Currency',
            'email' => 'Email',
            'tel' => 'Tel',
            'mobile' => 'Mobile',
            'createdate' => 'Createdate',
        ];
    }
}
