<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DadosCaso;

/**
 * DadosCasoSearch represents the model behind the search form about `app\models\DadosCaso`.
 */
class DadosCasoSearch extends DadosCaso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'qtde_alunos'], 'integer'],
            [['date_created', 'tipo_caso', 'turma_id', 'polo'], 'safe'],
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
        $query = DadosCaso::find();

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
            'qtde_alunos' => $this->qtde_alunos,
        ]);

        $query->andFilterWhere(['like', 'date_created', $this->date_created])
            ->andFilterWhere(['like', 'tipo_caso', $this->tipo_caso])
            ->andFilterWhere(['like', 'turma_id', $this->turma_id])
            ->andFilterWhere(['like', 'polo', $this->polo]);

        return $dataProvider;
    }
}
