<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lotnumber".
 *
 * @property integer $recid
 * @property integer $prodid
 * @property string $lotnumbercode
 * @property string $detail
 * @property string $startdate
 * @property string $enddate
 * @property string $createdate
 */
class Lotnumber extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lotnumber';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prodid','lotnumbercode'], 'required'],
            [['prodid'], 'integer'],
            [['startdate', 'enddate', 'createdate'], 'safe'],
            [['lotnumbercode', 'detail'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'prodid' => 'Prodid',
            'lotnumbercode' => 'Lotnumbercode',
            'detail' => 'Detail',
            'startdate' => 'Startdate',
            'enddate' => 'Enddate',
            'createdate' => 'Createdate',
        ];
    }
}
