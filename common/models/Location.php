<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "location".
 *
 * @property integer $recid
 * @property string $locationname
 * @property string $detail
 * @property integer $warehouseid
 * @property string $createdate
 * @property string $updatedate
 */
class Location extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['warehouseid'], 'integer'],
            [['createdate', 'updatedate'], 'safe'],
            [['locationname', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'locationname' => 'Locationname',
            'detail' => 'Detail',
            'warehouseid' => 'Warehouseid',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
        ];
    }
}
