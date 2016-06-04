<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "vendor".
 *
 * @property integer $recid
 * @property string $vendercode
 * @property string $vendorname
 * @property string $detail
 * @property integer $vendorgroupid
 * @property string $payment
 * @property string $createdate
 * @property string $updatedate
 */
class Vendor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vendor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendorgroupid'], 'integer'],
            [['createdate', 'updatedate'], 'safe'],
            [['vendercode'], 'string', 'max' => 50],
            [['vendorname', 'detail', 'payment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'vendercode' => 'Vendercode',
            'vendorname' => 'Vendorname',
            'detail' => 'Detail',
            'vendorgroupid' => 'Vendorgroupid',
            'payment' => 'Payment',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
        ];
    }
}
