<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plan".
 *
 * @property integer $recid
 * @property string $planname
 * @property string $detail
 * @property integer $isonhand
 * @property integer $istransaction
 * @property string $createdate
 */
class Plan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['isonhand', 'istransaction'], 'integer'],
            [['createdate'], 'safe'],
            [['planname', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'planname' => 'Planname',
            'detail' => 'Detail',
            'isonhand' => 'Isonhand',
            'istransaction' => 'Istransaction',
            'createdate' => 'Createdate',
        ];
    }
}
