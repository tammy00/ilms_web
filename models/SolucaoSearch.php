<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Solucao;

/**
 * SolucaoSearch represents the model behind the search form about `app\models\Solucao`.
 */
class SolucaoSearch extends Solucao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_solucao', 'id_infoc'], 'integer'],
            [['solucao', 'palavras_chaves', 'acao_implementada', 'solucao_implementada', 'efetividade_acao_implementada', 'custos', 'impacto_pedagogico', 'atores_envolvidos'], 'safe'],
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
        $query = Solucao::find();

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
            'id_solucao' => $this->id_solucao,
            'id_infoc' => $this->id_infoc,
        ]);

        $query->andFilterWhere(['like', 'solucao', $this->solucao])
            ->andFilterWhere(['like', 'palavras_chaves', $this->palavras_chaves])
            ->andFilterWhere(['like', 'acao_implementada', $this->acao_implementada])
            ->andFilterWhere(['like', 'solucao_implementada', $this->solucao_implementada])
            ->andFilterWhere(['like', 'efetividade_acao_implementada', $this->efetividade_acao_implementada])
            ->andFilterWhere(['like', 'custos', $this->custos])
            ->andFilterWhere(['like', 'impacto_pedagogico', $this->impacto_pedagogico])
            ->andFilterWhere(['like', 'atores_envolvidos', $this->atores_envolvidos]);

        return $dataProvider;
    }
}
