<?php
    namespace backend\models;

    use yii\data\ActiveDataProvider;

    class TeamSearch extends Team
    {
        public function rules()
        {
            return [
                [['id', 'r_id', 'status'], 'integer'],
                [['lang', 'fullname', 'profession', 'image', 'body', 'seo_description', 'seo_keywords'], 'safe'],
            ];
        }

        public function search($params)
        {
            $query = Team::find();

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
                'status' => $this->status,
            ]);

            $query->andFilterWhere(['like', 'lang', $this->lang])
                ->andFilterWhere(['like', 'fullname', $this->fullname])
                ->andFilterWhere(['like', 'profession', $this->profession])
                ->andFilterWhere(['like', 'image', $this->image])
                ->andFilterWhere(['like', 'body', $this->body])
                ->andFilterWhere(['like', 'seo_description', $this->seo_description])
                ->andFilterWhere(['like', 'seo_keywords', $this->seo_keywords]);

            return $dataProvider;
        }
    }