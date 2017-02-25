<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Descricao;

/**
 * DescricaoSearch represents the model behind the search form about `app\models\Descricao`.
 */
class DescricaoSearch extends Descricao
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['natureza_problema', 'relator', 'curso_id', 'disciplina_id', 'descricao_problema', 'problema', 'palavras_chaves'], 'safe'],
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
        $query = Descricao::find();

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
        ]);

        $query->andFilterWhere(['like', 'natureza_problema', $this->natureza_problema])
            ->andFilterWhere(['like', 'relator', $this->relator])
            ->andFilterWhere(['like', 'curso_id', $this->curso_id])
            ->andFilterWhere(['like', 'disciplina_id', $this->disciplina_id])
            ->andFilterWhere(['like', 'descricao_problema', $this->descricao_problema])
            ->andFilterWhere(['like', 'problema', $this->problema])
            ->andFilterWhere(['like', 'palavras_chaves', $this->palavras_chaves]);

        return $dataProvider;
    }
}
