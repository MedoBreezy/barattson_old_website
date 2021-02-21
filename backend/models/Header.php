<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class Header extends ActiveRecord
    {
        public static function tableName()
        {
            return 'header';
        }

        public function rules()
        {
            return [
                [['r_id'], 'integer'],
                [['lang'], 'string', 'max' => 4],
                [['phone', 'button_1_text', 'button_1_link', 'button_2_text', 'button_2_link', 'button_3_text', 'button_3_link'], 'string', 'max' => 255],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'r_id' => 'Relation ID',
                'lang' => 'Dil',
                'phone' => 'Nömrə',
				'button_1_text' => 'Button 1 text',
				'button_1_link' => 'Button 1 link',
				'button_2_text' => 'Button 2 text',
				'button_2_link' => 'Button 2 link',
				'button_3_text' => 'Button 3 text',
				'button_3_link' => 'Button 3 link',
            ];
        }
    }