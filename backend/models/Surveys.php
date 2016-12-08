<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "surveys".
 *
 * @property integer $survey_id
 * @property integer $language_id
 * @property integer $client_id
 * @property integer $country_id
 * @property string $title
 * @property integer $status_id
 * @property string $end_at
 * @property string $created_at
 * @property string $updated_at
 * @property string $start_at
 */
class Surveys extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'surveys';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language_id', 'client_id', 'country_id', 'title', 'status_id'], 'required'],
            [['language_id', 'client_id', 'country_id', 'status_id'], 'integer'],
            [['end_at', 'created_at', 'updated_at', 'start_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'client_id']],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['country_id' => 'country_id']],
            [['language_id'], 'exist', 'skipOnError' => true, 'targetClass' => Languages::className(), 'targetAttribute' => ['language_id' => 'language_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'survey_id' => 'Survey ID',
            'language_id' => 'Poll language',
            'client_id' => 'Client name',
            'country_id' => 'Country Name',
            'title' => 'Title',
            'status_id' => 'Status ID',
            'end_at' => 'End At',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'start_at' => 'Start At',
        ];
    }
    
    public function getclientClients(){
        
        return $this->hasOne(Clients::className(), ['client_id' => 'client_id']);
        
    }
     public function getlanguageLanguages(){
        
        return $this->hasOne(Languages::className(), ['language_id' => 'language_id']);
        
    }
     public function getcountryCountries(){
        
        return $this->hasOne(Countries::className(), ['country_id' => 'country_id']);
        
    }
}
