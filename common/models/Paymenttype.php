<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "paymenttype".
 *
 * @property integer $recid
 * @property string $paymentname
 * @property string $description
 * @property integer $factor
 * @property string $createdate
 */
class Paymenttype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'paymenttype';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['factor'], 'integer'],
            [['createdate'], 'safe'],
            [['paymentname', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'paymentname' => 'Paymentname',
            'description' => 'Description',
            'factor' => 'Factor',
            'createdate' => 'Createdate',
        ];
    }
}
