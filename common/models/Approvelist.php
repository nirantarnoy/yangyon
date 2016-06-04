<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "approvelist".
 *
 * @property integer $recid
 * @property integer $vendid
 * @property integer $prodid
 * @property string $fromdate
 * @property string $todate
 * @property integer $createby
 * @property string $createdate
 */
class Approvelist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'approvelist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendid', 'prodid', 'createby'], 'integer'],
            [['fromdate', 'todate', 'createdate'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'vendid' => 'Vendid',
            'prodid' => 'Prodid',
            'fromdate' => 'Fromdate',
            'todate' => 'Todate',
            'createby' => 'Createby',
            'createdate' => 'Createdate',
        ];
    }
}
