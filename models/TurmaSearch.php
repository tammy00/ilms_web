<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Turma;

/**
 * TurmaSearch represents the model behind the search form about `app\models\Turma`.
 */
class TurmaSearch extends Turma
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_turma', 'qtde_alunos', 'id_polo', 'id_curso', 'id_tutor', 'id_aplicativo'], 'integer'],
            [['sigla', 'outras_caracteristicas', 'observacoes', 'aplicativo_movel'], 'safe'],
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
            'id_turma' => $this->id_turma,
            'qtde_alunos' => $this->qtde_alunos,
            'id_polo' => $this->id_polo,
            'id_curso' => $this->id_curso,
            'id_tutor' => $this->id_tutor,
            'id_aplicativo' => $this->id_aplicativo,
        ]);

        $query->andFilterWhere(['like', 'sigla', $this->sigla])
            ->andFilterWhere(['like', 'outras_caracteristicas', $this->outras_caracteristicas])
            ->andFilterWhere(['like', 'observacoes', $this->observacoes])
            ->andFilterWhere(['like', 'aplicativo_movel', $this->aplicativo_movel]);

        return $dataProvider;
    }
}
