<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\InfoCaso;

/**
 * InfoCasoSearch represents the model behind the search form about `app\models\InfoCaso`.
 */
class InfoCasoSearch extends InfoCaso
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_infoc', 'quantidade_alunos', 'id_descricao', 'id_relator'], 'integer'],
            [['date_created', 'tipo_caso', 'polo'], 'safe'],
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
        $query = InfoCaso::find();

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
            'id_infoc' => $this->id_infoc,
            'quantidade_alunos' => $this->quantidade_alunos,
            'id_descricao' => $this->id_descricao,
            'id_relator' => $this->id_relator,
        ]);

        $query->andFilterWhere(['like', 'date_created', $this->date_created])
            ->andFilterWhere(['like', 'tipo_caso', $this->tipo_caso])
            ->andFilterWhere(['like', 'polo', $this->polo]);

        return $dataProvider;
    }
}
