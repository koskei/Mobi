<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "languages".
 *
 * @property integer $language_id
 * @property string $language
 */
class Languages extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'languages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['language'], 'required'],
            [['language'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'language_id' => 'Language ID',
            'language' => 'Language',
        ];
    }
}
