<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Surveys;

/**
 * SurveySearch represents the model behind the search form of `backend\models\Surveys`.
 */
class SurveySearch extends Surveys
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['survey_id', 'language_id', 'client_id', 'country_id', 'status_id'], 'integer'],
            [['title', 'end_at', 'created_at', 'updated_at', 'start_at'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Surveys::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'survey_id' => $this->survey_id,
            'language_id' => $this->language_id,
            'client_id' => $this->client_id,
            'country_id' => $this->country_id,
            'status_id' => $this->status_id,
            'end_at' => $this->end_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'start_at' => $this->start_at,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
