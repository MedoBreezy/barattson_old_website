<?php
    namespace backend\models;

    use yii\db\ActiveRecord;

    class TeachersCourses extends ActiveRecord
    {
        public static function tableName()
        {
            return 'teachers_courses';
        }

        public function rules()
        {
            return [
                [['teacher_id', 'course_id'], 'integer'],
            ];
        }

        public function attributeLabels()
        {
            return [
                'id' => 'ID',
                'teacher_id' => 'Teacher ID',
                'course_id' => 'Kurslar',
            ];
        }
    }