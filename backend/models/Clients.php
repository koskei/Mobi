<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "clients".
 *
 * @property integer $client_id
 * @property string $clientName
 * @property integer $country_id
 */
class Clients extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['clientName', 'country_id'], 'required'],
            [['country_id'], 'integer'],
            [['clientName'], 'string', 'max' => 45],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Countries::className(), 'targetAttribute' => ['country_id' => 'country_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'client_id' => 'Client ID',
            'clientName' => 'Client Name',
            'country_id' => 'Country ID',
        ];
    }
    
    public  function getcountryCountries(){
        
        return $this->hasOne(Countries::className(), ['country_id'=>'country_id']);
    }
    
  
}
