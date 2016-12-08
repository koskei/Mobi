<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "xls".
 *
 * @property integer $id
 * @property string $xls
 * @property string $name
 * @property string $qns
 * @property integer $survey_id
 * @property integer $length
 * @property string $type
 * @property string $rotation
 * @property string $skip
 */
class Xls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'xls';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'qns', 'survey_id', 'length', 'type', 'rotation', 'skip'], 'required'],
            [['qns', 'skip'], 'string'],
            [['survey_id', 'length'], 'integer'],
            
            [['name'], 'string', 'max' => 50],
            [['type', 'rotation'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'xls' => 'Next Action',
            'name' => 'Question Name',
            'qns' => 'Question',
            'survey_id' => 'Survey ID',
            'length' => 'Length',
            'type' => 'Type',
            'rotation' => 'Rotation',
            'skip' => 'Skip Partern',
        ];
    }
    
     public function getsurveySurveys(){
        
        return $this->hasOne(Surveys::className(), ['survey_id' => 'survey_id']);
        
    }
}
