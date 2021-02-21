<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class CoursesCategory extends ActiveRecord
    {
        public static function tableName()
        {
            return 'courses_category';
        }

        public function rules()
        {
            return [
                [['r_id'], 'integer'],
                [['lang'], 'string', 'max' => 4],
                [['title'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'r_id' => 'Relation ID',
                'lang' => 'Dil',
                'title' => 'Başlıq',
            ];
        }
    }