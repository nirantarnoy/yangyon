<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "bomlist".
 *
 * @property integer $recid
 * @property string $bomname
 * @property string $detail
 * @property integer $productid
 * @property integer $createby
 * @property integer $active
 * @property integer $approve
 * @property string $fromdate
 * @property string $todate
 * @property string $createdate
 */
class Bomlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bomlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bomname','productid'],'required'],
            [['productid', 'createby', 'active', 'approve'], 'integer'],
            [['fromdate', 'todate', 'createdate'], 'safe'],
            [['bomname', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'bomname' => 'Bomname',
            'detail' => 'Detail',
            'productid' => 'Productid',
            'createby' => 'Createby',
            'active' => 'Active',
            'approve' => 'Approve',
            'fromdate' => 'Fromdate',
            'todate' => 'Todate',
            'createdate' => 'Createdate',
        ];
    }
}
