<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class Video extends ActiveRecord
    {
        public static function tableName()
        {
            return 'video';
        }

        public function rules()
        {
            return [
                [['date'], 'required'],
                [['r_id', 'status'], 'integer'],
                [['seo_description'], 'string'],
                [['date'], 'safe'],
                [['lang'], 'string', 'max' => 4],
                [['title', 'image', 'seo_keywords', 'link'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'r_id' => 'Relation ID',
                'lang' => 'Dil',
                'title' => 'Başlıq',
                'image' => 'Şəkil',
                'link' => 'Youtube linki',
                'date' => 'Tarix',
                'seo_description' => 'Qısa mətn',
                'seo_keywords' => 'Açar sözlər',
                'status' => 'Status',
            ];
        }
    }