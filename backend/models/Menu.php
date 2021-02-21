<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class Menu extends ActiveRecord
    {
        public static function tableName()
        {
            return 'menu';
        }

        public function rules()
        {
            return [
                [['type'], 'required'],
                [['r_id', 'status', 'type', 'order'], 'integer'],
                [['lang'], 'string', 'max' => 4],
                [['title', 'link'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'r_id' => 'Relation ID',
                'lang' => 'Dil',
                'title' => 'Başlıq',
                'link' => 'Link',
                'type' => 'Tip',
                'status' => 'Status',
                'order' => 'Sıra',
            ];
        }
    }