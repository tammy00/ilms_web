<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Polo;

/**
 * PoloSearch represents the model behind the search form about `app\models\Polo`.
 */
class PoloSearch extends Polo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_nome', 'coordenador', 'tipo_conexao', 'infra_laboratorio', 'infra_fisica', 'infra_cidade', 'acesso', 'outras_caracteristicas'], 'safe'],
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
        $query = Polo::find();

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
        $query->andFilterWhere(['like', 'id_nome', $this->id_nome])
            ->andFilterWhere(['like', 'coordenador', $this->coordenador])
            ->andFilterWhere(['like', 'tipo_conexao', $this->tipo_conexao])
            ->andFilterWhere(['like', 'infra_laboratorio', $this->infra_laboratorio])
            ->andFilterWhere(['like', 'infra_fisica', $this->infra_fisica])
            ->andFilterWhere(['like', 'infra_cidade', $this->infra_cidade])
            ->andFilterWhere(['like', 'acesso', $this->acesso])
            ->andFilterWhere(['like', 'outras_caracteristicas', $this->outras_caracteristicas]);

        return $dataProvider;
    }
}
