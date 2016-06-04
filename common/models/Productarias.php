<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productarias".
 *
 * @property integer $recid
 * @property integer $productid
 * @property integer $vendorid
 * @property string $ariasname
 * @property string $detail
 * @property string $createdate
 */
class Productarias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productarias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productid', 'vendorid'], 'integer'],
            [['createdate'], 'safe'],
            [['ariasname', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'productid' => 'Productid',
            'vendorid' => 'Vendorid',
            'ariasname' => 'Ariasname',
            'detail' => 'Detail',
            'createdate' => 'Createdate',
        ];
    }
}
