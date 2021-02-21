<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class Vacancies extends ActiveRecord
    {
        public static function tableName()
        {
            return 'vacancies';
        }

        public function rules()
        {
            return [
                [['date_start', 'date_finish'], 'required'],
                [['r_id', 'status'], 'integer'],
                [['body', 'seo_description'], 'string'],
                [['date_start', 'date_finish'], 'safe'],
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
                'date_start' => 'Başlama tarixi',
                'date_finish' => 'Bitmə tarixi',
                'seo_description' => 'Qısa mətn',
                'seo_keywords' => 'Açar sözlər',
                'status' => 'Status',
            ];
        }
    }