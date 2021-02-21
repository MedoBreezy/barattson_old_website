<?php
    namespace backend\models;

    use yii\data\ActiveDataProvider;

    class MenuSearch extends Menu
    {
        public function rules()
        {
            return [
                [['id', 'r_id', 'status', 'type'], 'integer'],
                [['lang', 'title', 'link'], 'safe'],
            ];
        }

        public function search($params)
        {
            $query = Menu::find();

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
                'link' => $this->link,
                'status' => $this->status,
            ]);

            $query->andFilterWhere(['like', 'lang', $this->lang])
                ->andFilterWhere(['like', 'title', $this->title])
                ->andFilterWhere(['like', 'type', $this->type]);

            return $dataProvider;
        }
    }