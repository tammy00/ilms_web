<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pesquisas;

/**
 * PesquisasSearch represents the model behind the search form about `app\models\Pesquisas`.
 */
class PesquisasSearch extends Pesquisas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pesquisa', 'id_solucao', 'id_usuario', 'id_polo', 'status'], 'integer'],
            [['relator', 'natureza_problema', 'descricao_problema', 'problema_detalhado', 'palavras_chaves'], 'safe'],
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
        $query = Pesquisas::find();

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
            'id_pesquisa' => $this->id_pesquisa,
            'id_solucao' => $this->id_solucao,
            'id_usuario' => $this->id_usuario,
            'id_polo' => $this->id_polo,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'relator', $this->relator])
            ->andFilterWhere(['like', 'natureza_problema', $this->natureza_problema])
            ->andFilterWhere(['like', 'descricao_problema', $this->descricao_problema])
            ->andFilterWhere(['like', 'problema_detalhado', $this->problema_detalhado])
            ->andFilterWhere(['like', 'palavras_chaves', $this->palavras_chaves])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
