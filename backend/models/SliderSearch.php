<?php
    namespace backend\models;

    use yii\data\ActiveDataProvider;

    class SliderSearch extends Slider
    {
        public function rules()
        {
            return [
                [['id', 'r_id', 'status'], 'integer'],
                [['lang', 'title', 'image', 'body', 'button_text', 'button_link'], 'safe'],
            ];
        }

        public function search($params)
        {
            $query = Slider::find();

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
                ->andFilterWhere(['like', 'image', $this->image])
                ->andFilterWhere(['like', 'body', $this->body])
                ->andFilterWhere(['like', 'button_text', $this->button_text])
                ->andFilterWhere(['like', 'button_link', $this->button_link]);

            return $dataProvider;
        }
    }