<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productmodel".
 *
 * @property integer $recid
 * @property string $modelname
 * @property string $detail
 * @property string $createdate
 */
class Productmodel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productmodel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createdate'], 'safe'],
            [['modelname', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'modelname' => 'Modelname',
            'detail' => 'Detail',
            'createdate' => 'Createdate',
        ];
    }
}
