<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "file_upload".
 *
 * @property integer $id
 * @property string $filename
 */
class FileUpload extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'file_upload';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['filename'], 'required'],
            [['filename'], 'string', 'max' => 100],
            [['filename'], 'file', 'skipOnEmpty' => false, 'extensions' => 'xlsx, xls'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'filename' => 'Filename',
        ];
    }
}
