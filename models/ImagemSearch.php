<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Imagem;

/**
 * ImagemSearch represents the model behind the search form about `app\models\Imagem`.
 */
class ImagemSearch extends Imagem
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_imagem', 'periodo', 'ano'], 'integer'],
            [['curso', 'disciplina', 'palavra_chave', 'descricao'], 'safe'],
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
        $query = Imagem::find();

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
            'id_imagem' => $this->id_imagem,
            'periodo' => $this->periodo,
            'ano' => $this->ano,
        ]);

        $query->andFilterWhere(['like', 'curso', $this->curso])
            ->andFilterWhere(['like', 'disciplina', $this->disciplina])
            ->andFilterWhere(['like', 'palavra_chave', $this->palavra_chave])
            ->andFilterWhere(['like', 'descricao', $this->descricao]);

        return $dataProvider;
    }
}
