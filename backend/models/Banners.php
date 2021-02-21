<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class Banners extends ActiveRecord
    {
        public static function tableName()
        {
            return 'banners';
        }

        public function rules()
        {
            return [
                [['r_id', 'status'], 'integer'],
                [['lang'], 'string', 'max' => 4],
                [['title', 'image', 'link'], 'string', 'max' => 255],
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
                'link' => 'Link',
                'status' => 'Status',
            ];
        }
    }