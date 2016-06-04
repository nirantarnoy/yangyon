<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transline".
 *
 * @property integer $recid
 * @property string $transdate
 * @property integer $prodid
 * @property integer $transtableid
 * @property integer $transtype
 * @property integer $transrefid
 * @property string $transrefno
 * @property integer $warhouseid
 * @property integer $locationid
 * @property integer $lotid
 * @property integer $serialid
 * @property double $qty
 * @property double $transin
 * @property double $transout
 * @property integer $unitid
 * @property double $transamount
 * @property integer $status
 * @property integer $warehouseid2
 * @property integer $locationid2
 * @property integer $lotid2
 * @property integer $serialid2
 * @property string $createdate
 */
class Transline extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transline';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transdate', 'createdate'], 'safe'],
            [['prodid', 'transtableid', 'transtype', 'transrefid', 'warhouseid', 'locationid', 'lotid', 'serialid', 'unitid', 'status', 'warehouseid2', 'locationid2', 'lotid2', 'serialid2'], 'integer'],
            [['qty', 'transin', 'transout', 'transamount'], 'number'],
            [['transrefno'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'transdate' => 'Transdate',
            'prodid' => 'Prodid',
            'transtableid' => 'Transtableid',
            'transtype' => 'Transtype',
            'transrefid' => 'Transrefid',
            'transrefno' => 'Transrefno',
            'warhouseid' => 'Warhouseid',
            'locationid' => 'Locationid',
            'lotid' => 'Lotid',
            'serialid' => 'Serialid',
            'qty' => 'Qty',
            'transin' => 'Transin',
            'transout' => 'Transout',
            'unitid' => 'Unitid',
            'transamount' => 'Transamount',
            'status' => 'Status',
            'warehouseid2' => 'Warehouseid2',
            'locationid2' => 'Locationid2',
            'lotid2' => 'Lotid2',
            'serialid2' => 'Serialid2',
            'createdate' => 'Createdate',
        ];
    }
}
