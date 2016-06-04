<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "transtable".
 *
 * @property integer $recid
 * @property integer $transtype
 * @property string $transno
 * @property string $deatail
 * @property string $docref
 * @property string $transdate
 * @property integer $status
 * @property string $createdate
 */
class Transtable extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'transtable';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['transtype', 'status'], 'integer'],
            [['transdate', 'createdate'], 'safe'],
            [['transno'], 'string', 'max' => 11],
            [['deatail', 'docref'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'recid' => 'Recid',
            'transtype' => 'Transtype',
            'transno' => 'Transno',
            'deatail' => 'Deatail',
            'docref' => 'Docref',
            'transdate' => 'Transdate',
            'status' => 'Status',
            'createdate' => 'Createdate',
        ];
    }
}
