<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tutor;

/**
 * TutorSearch represents the model behind the search form about `app\models\Tutor`.
 */
class TutorSearch extends Tutor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_matricula', 'nome', 'tipo_tutoria', 'tipo_bolsa', 'outras_caracteristicas', 'observacoes', 'polo_id'], 'safe'],
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
        $query = Tutor::find();

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
        $query->andFilterWhere(['like', 'id_matricula', $this->id_matricula])
            ->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'tipo_tutoria', $this->tipo_tutoria])
            ->andFilterWhere(['like', 'tipo_bolsa', $this->tipo_bolsa])
            ->andFilterWhere(['like', 'outras_caracteristicas', $this->outras_caracteristicas])
            ->andFilterWhere(['like', 'observacoes', $this->observacoes])
            ->andFilterWhere(['like', 'polo_id', $this->polo_id]);

        return $dataProvider;
    }
}
