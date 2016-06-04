<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property integer $recid
 * @property string $name
 * @property string $engname
 * @property string $idno
 * @property string $companytype
 * @property string $email
 * @property string $tel
 * @property string $mobile
 * @property string $createdate
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['createdate'], 'safe'],
            [['name', 'engname', 'idno', 'companytype', 'email', 'tel', 'mobile'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'name' => 'Name',
            'engname' => 'Engname',
            'idno' => 'Idno',
            'companytype' => 'Companytype',
            'email' => 'Email',
            'tel' => 'Tel',
            'mobile' => 'Mobile',
            'createdate' => 'Createdate',
        ];
    }
}
