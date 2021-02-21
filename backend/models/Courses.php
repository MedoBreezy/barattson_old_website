<?php
    namespace backend\models;

	use yii\db\ActiveRecord;

    class Courses extends ActiveRecord
    {
        public static function tableName()
        {
            return 'courses';
        }

        public function rules()
        {
            return [
                [['date_start', 'date_finish'], 'required'],
                [['r_id', 'status', 'category'], 'integer'],
                [['body', 'advantage', 'privilege', 'included', 'seo_description'], 'string'],
                [['date_start', 'date_finish'], 'safe'],
                [['lang'], 'string', 'max' => 4],
                [['title', 'image', 'price_old', 'price_new', 'register_link', 'seo_keywords'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'r_id' => 'Relation ID',
                'lang' => 'Dil',
                'title' => 'Başlıq',
                'body' => 'Mətn',
                'image' => 'Şəkil',
                'date_start' => 'Başlama tarixi',
                'date_finish' => 'Bitmə tarixi',
                'advantage' => 'Əldə ediləcək imkanlar',
                'privilege' => 'Üstünlüklər',
                'included' => 'Nə daxildir',
                'price_old' => 'Köhnə qiymət',
                'price_new' => 'Yeni qiymət',
                'register_link' => 'Qeydiyyat linki',
                'category' => 'Bölmə',
                'courses_category' => 'Bölmə',
                'seo_description' => 'Qısa mətn',
                'seo_keywords' => 'Açar sözlər',
                'status' => 'Status',
            ];
        }
    }