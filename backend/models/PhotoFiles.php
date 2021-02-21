<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class PhotoFiles extends ActiveRecord
    {
        public static function tableName()
        {
            return 'photo_files';
        }

        public function rules()
        {
            return [
                [['photo_id'], 'integer'],
                [['file'], 'file', 'skipOnEmpty' => true, 'extensions' => 'jpg, jpeg, png', 'maxFiles' => 0],
                [['file_handler'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id' => 'id',
                'photo_id' => 'Photo ID',
                'file' => 'Qalereya',
                'file_handler' => 'File handler',
            ];
        }
    }