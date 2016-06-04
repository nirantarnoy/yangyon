<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "calendar".
 *
 * @property integer $recid
 * @property string $calendarname
 * @property string $detail
 * @property string $createdate
 */
class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createdate'], 'safe'],
            [['calendarname', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'calendarname' => 'Calendarname',
            'detail' => 'Detail',
            'createdate' => 'Createdate',
        ];
    }
}
