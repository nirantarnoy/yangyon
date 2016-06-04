<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "activity".
 *
 * @property integer $recid
 * @property string $activityname
 * @property string $detail
 * @property integer $manual
 * @property string $createdate
 */
class Activity extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'activity';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['manual'], 'integer'],
            [['createdate'], 'safe'],
            [['activityname', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'activityname' => 'Activityname',
            'detail' => 'Detail',
            'manual' => 'Manual',
            'createdate' => 'Createdate',
        ];
    }
}
