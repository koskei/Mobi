<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "responses".
 *
 * @property integer $id
 * @property integer $xls_id
 * @property string $errormsg
 * @property string $unmatched
 * @property string $multimatched
 * @property string $dateCreated
 * @property string $updatedTime
 */
class Responses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'responses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['xls_id', 'errormsg', 'unmatched', 'multimatched'], 'required'],
            [['xls_id'], 'integer'],
            [['errormsg', 'unmatched', 'multimatched'], 'string'],
            [['dateCreated', 'updatedTime'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'xls_id' => 'Xls ID',
            'errormsg' => 'Errormsg',
            'unmatched' => 'Unmatched',
            'multimatched' => 'Multimatched',
            'dateCreated' => 'Date Created',
            'updatedTime' => 'Updated Time',
        ];
    }
}
