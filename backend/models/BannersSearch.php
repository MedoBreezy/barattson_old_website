<?php
    namespace backend\models;

    use yii\data\ActiveDataProvider;

    class BannersSearch extends Banners
    {
        public function rules()
        {
            return [
                [['id', 'r_id', 'status'], 'integer'],
                [['lang', 'title', 'image', 'link'], 'safe'],
            ];
        }

        public function search($params)
        {
            $query = Banners::find();

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
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'image', $this->image]);

            return $dataProvider;
        }
    }