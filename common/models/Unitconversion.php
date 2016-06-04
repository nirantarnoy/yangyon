<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "unitconversion".
 *
 * @property integer $recid
 * @property integer $prodid
 * @property integer $fromunit
 * @property integer $tounit
 * @property string $fromfactor
 * @property string $tofactor
 * @property string $createdate
 * @property string $updatedate
 */
class Unitconversion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unitconversion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prodid'], 'required'],
            [['prodid', 'fromunit', 'tounit'], 'integer'],
            [['fromfactor', 'tofactor'], 'number'],
            [['createdate', 'updatedate'], 'safe'],
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
            'fromunit' => 'Fromunit',
            'tounit' => 'Tounit',
            'fromfactor' => 'Fromfactor',
            'tofactor' => 'Tofactor',
            'createdate' => 'Createdate',
            'updatedate' => 'Updatedate',
        ];
    }
}
