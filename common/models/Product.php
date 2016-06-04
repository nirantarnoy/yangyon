<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $recid
 * @property string $prodcode
 * @property string $prodname
 * @property string $prodename
 * @property string $detail
 * @property integer $prodgroupid
 * @property integer $prodcategoryid
 * @property integer $planid
 * @property integer $inventunit
 * @property integer $purchaseunit
 * @property integer $saleunit
 * @property integer $bomunit
 * @property integer $isactive
 * @property string $photo
 * @property double $netweight
 * @property double $tareweight
 * @property double $grossweight
 * @property double $height
 * @property double $width
 * @property double $dept
 * @property double $density
 * @property double $minstock
 * @property double $maxstock
 * @property double $minorder
 * @property double $maxorder
 * @property double $multiple
 * @property integer $prodtype
 * @property double $cost
 * @property string $costdate
 * @property integer $packing
 * @property integer $createby
 * @property string $createdate
 * @property string $modifydate
 * @property double $minorder1
 * @property double $maxorder1
 * @property double $multiple1
 * @property double $minorder2
 * @property double $maxorder2
 * @property double $multiple2
 * @property integer $modelid
 * @property integer $lifetime
 * @property integer $leedtime
 * @property integer $puchactive
 * @property integer $saleactive
 * @property double $purchprice
 * @property double $saleprice
 * @property double $saleprice2
 * @property double $saleprice3
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prodcode'],'required'],
           // ['prodcode','unique'],
            [['prodgroupid', 'prodcategoryid', 'planid', 'inventunit', 'purchaseunit', 'saleunit', 'bomunit', 'isactive', 'prodtype', 'packing', 'createby', 'modelid', 'lifetime', 'leedtime', 'puchactive', 'saleactive'], 'integer'],
            [['netweight', 'tareweight', 'grossweight', 'height', 'width', 'dept', 'density', 'minstock', 'maxstock', 'minorder', 'maxorder', 'multiple', 'cost', 'minorder1', 'maxorder1', 'multiple1', 'minorder2', 'maxorder2', 'multiple2', 'purchprice', 'saleprice', 'saleprice2', 'saleprice3'], 'number'],
            [['costdate', 'createdate', 'modifydate'], 'safe'],
            [['prodname', 'prodename', 'detail', 'photo'], 'string', 'max' => 255],
           
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
    
        return [
            'recid' => 'Recid',
            'prodcode' => 'Product code',
            'prodname' => 'Product name',
            'prodename' => 'English name',
            'detail' => 'Detail',
            'prodgroupid' => 'Product group',
            'prodcategoryid' => 'Product category',
            'planid' => 'Plan',
            'inventunit' => 'Invent unit',
            'purchaseunit' => 'Purchase unit',
            'saleunit' => 'Sale unit',
            'bomunit' => 'Bom unit',
            'isactive' => 'Invent active',
            'photo' => 'Photo',
            'netweight' => 'Net weight',
            'tareweight' => 'Tare weight',
            'grossweight' => 'Gross weight',
            'height' => 'Height',
            'width' => 'Width',
            'dept' => 'Dept',
            'density' => 'Density',
            'minstock' => 'Min stock',
            'maxstock' => 'Max stock',
            'minorder' => 'Min order',
            'maxorder' => 'Max order',
            'multiple' => 'Multiple',
            'prodtype' => 'Bom type',
            'cost' => 'Cost',
            'costdate' => 'Cost date',
            'packing' => 'Packing',
            'createby' => 'Createby',
            'createdate' => 'Createdate',
            'modifydate' => 'Modifydate',
            'minorder1' => 'Minorder1',
            'maxorder1' => 'Maxorder1',
            'multiple1' => 'Multiple1',
            'minorder2' => 'Minorder2',
            'maxorder2' => 'Maxorder2',
            'multiple2' => 'Multiple2',
            'modelid' => 'Model',
            'lifetime' => 'Life time',
            'leedtime' => 'Leed time',
            'puchactive' => 'Puchase active',
            'saleactive' => 'Sale active',
            'purchprice' => 'Purchprice',
            'saleprice' => 'Saleprice',
            'saleprice2' => 'Saleprice2',
            'saleprice3' => 'Saleprice3',
        ];
    }
}
