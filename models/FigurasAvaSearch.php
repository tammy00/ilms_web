<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FigurasAva;

/**
 * FigurasAvaSearch represents the model behind the search form about `app\models\FigurasAva`.
 */
class FigurasAvaSearch extends FigurasAva
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_figura', 'total_alunos'], 'integer'],
            [['nome_figura', 'aplicativo', 'tipo_grafico', 'curso', 'disciplina', 'polo', 'ano_periodo', 'palavras_chaves'], 'safe'],
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
        $query = FigurasAva::find()->orderBy(['curso' => SORT_ASC]);

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
            'id_figura' => $this->id_figura,
            'total_alunos' => $this->total_alunos,
        ]);

        $query->andFilterWhere(['like', 'nome_figura', $this->nome_figura])
            ->andFilterWhere(['like', 'aplicativo', $this->aplicativo])
            ->andFilterWhere(['like', 'tipo_grafico', $this->tipo_grafico])
            ->andFilterWhere(['like', 'curso', $this->curso])
            ->andFilterWhere(['like', 'disciplina', $this->disciplina])
            ->andFilterWhere(['like', 'polo', $this->polo])
            ->andFilterWhere(['like', 'ano_periodo', $this->ano_periodo])
            ->andFilterWhere(['like', 'palavras_chaves', $this->palavras_chaves]);

        return $dataProvider;
    }
}
