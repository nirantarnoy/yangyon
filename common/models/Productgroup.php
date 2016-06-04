<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productgroup".
 *
 * @property integer $recid
 * @property string $groupname
 * @property string $detail
 * @property string $createdate
 */
class Productgroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productgroup';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createdate'], 'safe'],
            ['groupname','unique'],
            [['groupname', 'detail'], 'string', 'max' => 255],
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
            'detail' => 'Detail',
            'createdate' => 'Createdate',
        ];
    }
}
