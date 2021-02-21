<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class Events extends ActiveRecord
    {
        public static function tableName()
        {
            return 'events';
        }

        public function rules()
        {
            return [
                [['date'], 'required'],
                [['r_id', 'status'], 'integer'],
                [['body', 'seo_description'], 'string'],
                [['date'], 'safe'],
                [['lang'], 'string', 'max' => 4],
                [['title', 'image', 'price_old', 'price_new', 'seo_keywords'], 'string', 'max' => 255],
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
                'price_old' => 'Köhnə qiymət',
                'price_new' => 'Yeni qiymət',
                'seo_description' => 'Qısa mətn',
                'seo_keywords' => 'Açar sözlər',
                'status' => 'Status',
            ];
        }
    }