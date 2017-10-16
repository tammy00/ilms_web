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
            [['id_pesquisa', 'id_solucao', 'id_usuario', 'id_polo', 'status', 'id_titulo_problema'], 'integer'],
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
            'id_polo' => $this->id_polo,
        ]);

        $query->andFilterWhere(['like', 'relator', $this->relator])
            ->andFilterWhere(['like', 'natureza_problema', $this->natureza_problema])
            ->andFilterWhere(['like', 'palavras_chaves', $this->palavras_chaves]);

        return $dataProvider;
    }

    // Seleciona os casos inexistentes no base

    public function searchPseudoCasos($params)
    {
        $query = Pesquisas::find()->where('status' != 2);

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
            'id_polo' => $this->id_polo,
        ]);

        $query->andFilterWhere(['like', 'relator', $this->relator])
            ->andFilterWhere(['like', 'natureza_problema', $this->natureza_problema])
            ->andFilterWhere(['like', 'palavras_chaves', $this->palavras_chaves]);

        return $dataProvider;
    }
}
