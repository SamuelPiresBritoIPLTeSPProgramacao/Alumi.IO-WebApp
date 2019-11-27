<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TurmaSearch represents the model behind the search form of `frontend\models\Turma`.
 */
class TurmaSearch extends Turma
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ano'], 'integer'],
            [['letra'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Turma::find();

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
            'id' => $this->id,
            'ano' => $this->ano,
        ]);

        $query->andFilterWhere(['like', 'letra', $this->letra]);

        return $dataProvider;
    }
}
