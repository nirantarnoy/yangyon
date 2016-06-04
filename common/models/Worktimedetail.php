<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "worktimedetail".
 *
 * @property integer $recid
 * @property integer $worktimeid
 * @property integer $mon
 * @property integer $tue
 * @property integer $wed
 * @property integer $thu
 * @property integer $fri
 * @property integer $sat
 * @property integer $sun
 */
class Worktimedetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'worktimedetail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['worktimeid'], 'required'],
            [['worktimeid', 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'worktimeid' => 'Worktimeid',
            'mon' => 'Mon',
            'tue' => 'Tue',
            'wed' => 'Wed',
            'thu' => 'Thu',
            'fri' => 'Fri',
            'sat' => 'Sat',
            'sun' => 'Sun',
        ];
    }
}
