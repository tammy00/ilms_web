<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Curso;

/**
 * CursoSearch represents the model behind the search form about `app\models\Curso`.
 */
class CursoSearch extends Curso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_curso', 'duracao', 'id_polo', 'id_turma', 'id_disciplina'], 'integer'],
            [['nome', 'tipo_curso', 'departamento', 'coordenador', 'outras_caracteristicas', 'observacoes'], 'safe'],
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
        $query = Curso::find();

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
            'id_curso' => $this->id_curso,
            'duracao' => $this->duracao,
            'id_polo' => $this->id_polo,
            'id_turma' => $this->id_turma,
            'id_disciplina' => $this->id_disciplina,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'tipo_curso', $this->tipo_curso])
            ->andFilterWhere(['like', 'departamento', $this->departamento])
            ->andFilterWhere(['like', 'coordenador', $this->coordenador])
            ->andFilterWhere(['like', 'outras_caracteristicas', $this->outras_caracteristicas])
            ->andFilterWhere(['like', 'observacoes', $this->observacoes]);

        return $dataProvider;
    }
}
