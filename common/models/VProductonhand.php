<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "v_productonhand".
 *
 * @property integer $prodid
 * @property double $realqty
 * @property double $reserv
 * @property double $qty
 * @property double $minstock
 * @property string $prodcode
 * @property string $prodname
 */
class VProductonhand extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'v_productonhand';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prodid'], 'integer'],
            [['realqty', 'reserv', 'qty', 'minstock'], 'number'],
            [['prodcode', 'prodname'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prodid' => 'Prodid',
            'realqty' => 'Realqty',
            'reserv' => 'Reserv',
            'qty' => 'Qty',
            'minstock' => 'Minstock',
            'prodcode' => 'Prodcode',
            'prodname' => 'Prodname',
        ];
    }
}
