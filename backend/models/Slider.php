<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class Slider extends ActiveRecord
    {
        public static function tableName()
        {
            return 'slider';
        }

        public function rules()
        {
            return [
                [['r_id', 'status', 'order'], 'integer'],
                [['body'], 'string'],
                [['lang'], 'string', 'max' => 4],
                [['title', 'image', 'button_link', 'button_text'], 'string', 'max' => 255],
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
                'body' => 'Qısa mətn',
                'button_text' => 'Button mətni',
                'button_link' => 'Button linki',
                'status' => 'Status',
                'order' => 'Sıra',
            ];
        }
    }