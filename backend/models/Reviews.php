<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class Reviews extends ActiveRecord
    {
        public static function tableName()
        {
            return 'reviews';
        }

        public function rules()
        {
            return [
                [['date'], 'required'],
                [['r_id', 'status'], 'integer'],
                [['body', 'seo_description'], 'string'],
                [['date'], 'safe'],
                [['lang'], 'string', 'max' => 4],
                [['title', 'seo_keywords'], 'string', 'max' => 255],
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
                'date' => 'Tarix',
                'seo_description' => 'Qısa mətn',
                'seo_keywords' => 'Açar sözlər',
                'status' => 'Status',
            ];
        }
    }