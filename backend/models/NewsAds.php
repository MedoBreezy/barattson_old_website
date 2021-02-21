<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class NewsAds extends ActiveRecord
    {
        public static function tableName()
        {
            return 'news_ads';
        }

        public function rules()
        {
            return [
                [['type', 'date'], 'required'],
                [['r_id', 'type', 'status'], 'integer'],
                [['body', 'seo_description'], 'string'],
                [['date'], 'safe'],
                [['lang'], 'string', 'max' => 4],
                [['title', 'image', 'seo_keywords'], 'string', 'max' => 255],
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
                'date' => 'Tarix',
                'type' => 'Tip',
                'seo_description' => 'Qısa mətn',
                'seo_keywords' => 'Açar sözlər',
                'status' => 'Status',
            ];
        }
    }