<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customergroup".
 *
 * @property integer $recid
 * @property string $groupname
 * @property string $description
 * @property string $createdate
 */
class Customergroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customergroup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createdate'], 'safe'],
            [['groupname', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'groupname' => 'Groupname',
            'description' => 'Description',
            'createdate' => 'Createdate',
        ];
    }
}
