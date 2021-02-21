<?php
    namespace backend\models;

    use yii\data\ActiveDataProvider;

    class VideoSearch extends Video
    {
        public function rules()
        {
            return [
                [['id', 'r_id', 'status'], 'integer'],
                [['lang', 'title', 'link', 'image', 'date', 'seo_description', 'seo_keywords'], 'safe'],
            ];
        }

        public function search($params)
        {
            $query = Video::find();

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
                'date' => $this->date,
                'link' => $this->link,
                'status' => $this->status,
            ]);

            $query->andFilterWhere(['like', 'lang', $this->lang])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'image', $this->image])
                ->andFilterWhere(['like', 'seo_description', $this->seo_description])
                ->andFilterWhere(['like', 'seo_keywords', $this->seo_keywords]);

            return $dataProvider;
        }
    }