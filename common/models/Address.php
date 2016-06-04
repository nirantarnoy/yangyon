<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property integer $recid
 * @property string $address
 * @property string $detail
 * @property integer $district
 * @property integer $city
 * @property integer $province
 * @property string $zipcode
 * @property integer $addresstype
 * @property integer $isprimary
 * @property integer $addressofid
 * @property string $createdate
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['district', 'city', 'province', 'addresstype', 'isprimary', 'addressofid'], 'integer'],
            [['createdate'], 'safe'],
            [['address', 'detail'], 'string', 'max' => 255],
            [['zipcode'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'address' => 'Address',
            'detail' => 'Detail',
            'district' => 'District',
            'city' => 'City',
            'province' => 'Province',
            'zipcode' => 'Zipcode',
            'addresstype' => 'Addresstype',
            'isprimary' => 'Isprimary',
            'addressofid' => 'Addressofid',
            'createdate' => 'Createdate',
        ];
    }
}
