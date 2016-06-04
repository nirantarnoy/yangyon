<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sequence".
 *
 * @property integer $recid
 * @property integer $activitytype
 * @property integer $activitysubtype
 * @property string $prefix
 * @property integer $startno
 * @property integer $endno
 * @property string $createdate
 * @property integer $createby
 */
class Sequence extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sequence';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['activitytype', 'activitysubtype', 'startno', 'endno', 'createby'], 'integer'],
            [['createdate'], 'safe'],
            [['prefix'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'activitytype' => 'Activitytype',
            'activitysubtype' => 'Activitysubtype',
            'prefix' => 'Prefix',
            'startno' => 'Startno',
            'endno' => 'Endno',
            'createdate' => 'Createdate',
            'createby' => 'Createby',
        ];
    }
}
