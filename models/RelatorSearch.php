<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Relator;

/**
 * RelatorSearch represents the model behind the search form about `app\models\Relator`.
 */
class RelatorSearch extends Relator
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_relator', 'id_infoc'], 'integer'],
            [['perfil'], 'safe'],
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
        $query = Relator::find();

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
            'id_relator' => $this->id_relator,
            'id_infoc' => $this->id_infoc,
        ]);

        $query->andFilterWhere(['like', 'perfil', $this->perfil]);

        return $dataProvider;
    }
}
