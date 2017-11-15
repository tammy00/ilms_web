<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RespostaEspecialistas;
use app\models\TipoProblema;
use app\models\TituloProblema;

/**
 * RespostaEspecialistasSearch represents the model behind the search form about `app\models\RespostaEspecialistas`.
 */
class RespostaEspecialistasSearch extends RespostaEspecialistas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tipo_problema', 'id_titulo_problema'], 'integer'],
            [['descricao_problema', 'descricao_solucao', 'data_ocorrencia', 'data_insercao', 'nome_especialista', 'funcao_especialista', 'relator'], 'safe'],
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
        $query = RespostaEspecialistas::find();

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
            'id_tipo_problema' => $this->id_tipo_problema,
            'id_titulo_problema' => $this->id_titulo_problema,
            'data_ocorrencia' => $this->data_ocorrencia,
            'data_insercao' => $this->data_insercao,
        ]);

        $query->andFilterWhere(['like', 'descricao_problema', $this->descricao_problema])
            ->andFilterWhere(['like', 'descricao_solucao', $this->descricao_solucao])
            ->andFilterWhere(['like', 'nome_especialista', $this->nome_especialista])
            ->andFilterWhere(['like', 'funcao_especialista', $this->funcao_especialista])
            ->andFilterWhere(['like', 'relator', $this->relator]);

        return $dataProvider;
    }

    public function searchForResponses($id_titulo)
    {
        $query = RespostaEspecialistas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

       /* $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }  */

        // grid filtering conditions
        $query->andFilterWhere([
            'id_titulo_problema' => $id_titulo,
        ]);

        return $dataProvider;
    }
}
