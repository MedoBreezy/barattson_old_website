<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class Teachers extends ActiveRecord
    {
        public static function tableName()
        {
            return 'teachers';
        }

        public function rules()
        {
            return [
                [['r_id', 'status', 'order'], 'integer'],
                [['body', 'seo_description'], 'string'],
                [['lang'], 'string', 'max' => 4],
                [['fullname', 'image', 'seo_keywords'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'r_id' => 'Relation ID',
                'lang' => 'Dil',
                'fullname' => 'Ad soyad',
                'image' => 'Şəkil',
                'body' => 'Mətn',
                'seo_description' => 'Qısa təsvir',
                'seo_keywords' => 'Açar sözlər',
                'status' => 'Status',
                'order' => 'Sıra',
            ];
        }
    }