<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class StaticPages extends ActiveRecord
    {
        public static function tableName()
        {
            return 'static_pages';
        }

        public function rules()
        {
            return [
                [['r_id'], 'integer'],
                [['fact_1_body', 'fact_2_body', 'fact_3_body', 'mission', 'vision', 'value', 'director_about', 'director_message', 'text', 'seo_description'], 'string'],
                [['lang'], 'string', 'max' => 4],
                [['type', 'fact_1_title', 'fact_2_title', 'fact_3_title', 'image', 'director_fullname', 'director_image', 'seo_title', 'seo_keywords', 'seo_image'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'r_id' => 'Relation ID',
                'type' => 'Type',
                'lang' => 'Dil',
                'fact_1_title' => 'Başlıq',
                'fact_1_body' => 'Mətn',
                'fact_2_title' => 'Başlıq',
                'fact_2_body' => 'Mətn',
                'fact_3_title' => 'Başlıq',
                'fact_3_body' => 'Mətn',
                'image' => 'Şəkil',
                'mission' => 'Missiya',
                'vision' => 'Vizyon',
                'value' => 'Dəyərlər',
                'director_fullname' => 'Ad soyad',
                'director_image' => 'Rəhbər şəkil',
                'director_about' => 'Haqqında',
                'director_message' => 'Müraciəti',
                'text' => 'Mətn',
                'seo_title' => 'Başlıq',
                'seo_description' => 'Qısa təsvir',
                'seo_keywords' => 'Açar sözlər',
                'seo_image' => 'SEO şəkil',
            ];
        }
    }