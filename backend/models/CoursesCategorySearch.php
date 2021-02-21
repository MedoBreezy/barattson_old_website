<?php
    namespace backend\models;

    use yii\data\ActiveDataProvider;

    class CoursesCategorySearch extends CoursesCategory
    {
        public function rules()
        {
            return [
                [['id', 'r_id'], 'integer'],
                [['lang', 'title'], 'safe'],
            ];
        }

        public function search($params)
        {
            $query = CoursesCategory::find();

            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);

            $this->load($params);

            if (!$this->validate()) {
                return $dataProvider;
            }

            $query->andFilterWhere([
                'id' => $this->id,
                'r_id' => $this->r_id,
            ]);

            $query->andFilterWhere(['like', 'lang', $this->lang])
                ->andFilterWhere(['like', 'title', $this->title]);

            return $dataProvider;
        }
    }