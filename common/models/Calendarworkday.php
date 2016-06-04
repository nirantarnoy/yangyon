<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calendarworkday".
 *
 * @property integer $recid
 * @property integer $calendarrefid
 * @property string $workdate
 * @property string $workday
 * @property string $workweek
 * @property string $workmonth
 * @property integer $worktimeid
 * @property string $daycomment
 * @property string $createdate
 */
class Calendarworkday extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendarworkday';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['calendarrefid', 'worktimeid'], 'integer'],
            [['workdate', 'createdate'], 'safe'],
            [['workday', 'workweek', 'workmonth', 'daycomment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'calendarrefid' => 'Calendarrefid',
            'workdate' => 'Workdate',
            'workday' => 'Workday',
            'workweek' => 'Workweek',
            'workmonth' => 'Workmonth',
            'worktimeid' => 'Worktimeid',
            'daycomment' => 'Daycomment',
            'createdate' => 'Createdate',
        ];
    }
}
