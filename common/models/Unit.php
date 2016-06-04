<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "unit".
 *
 * @property integer $recid
 * @property string $unitname
 * @property string $detail
 * @property string $createdate
 */
class Unit extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createdate'], 'safe'],
            ['unitname','unique'],
            [['unitname', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'unitname' => 'Unitname',
            'detail' => 'Detail',
            'createdate' => 'Createdate',
        ];
    }
}
