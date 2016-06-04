<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "worktime".
 *
 * @property integer $recid
 * @property string $worktimename
 * @property string $detial
 * @property string $createdate
 */
class Worktime extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worktime';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createdate'], 'safe'],
            [['worktimename', 'detial'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'worktimename' => 'Worktimename',
            'detial' => 'Detial',
            'createdate' => 'Createdate',
        ];
    }
}
