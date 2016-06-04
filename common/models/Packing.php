<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "packing".
 *
 * @property integer $recid
 * @property string $packcode
 * @property string $detail
 * @property double $factor
 * @property string $createdate
 */
class Packing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'packing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['factor'], 'number'],
            [['createdate'], 'safe'],
            [['packcode', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'packcode' => 'Packcode',
            'detail' => 'Detail',
            'factor' => 'Factor',
            'createdate' => 'Createdate',
        ];
    }
}
