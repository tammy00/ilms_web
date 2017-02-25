<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turma".
 *
 * @property string $sigla
 * @property integer $qtde_alunos
 * @property string $outras_caracteristicas
 * @property string $observacoes
 * @property string $aplicativo_movel
 */
class Turma extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'turma';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sigla', 'qtde_alunos', 'outras_caracteristicas', 'observacoes', 'aplicativo_movel'], 'required'],
            [['qtde_alunos'], 'integer'],
            [['outras_caracteristicas', 'observacoes'], 'string'],
            [['sigla'], 'string', 'max' => 100],
            [['aplicativo_movel'], 'string', 'max' => 150],
            [['sigla'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sigla' => 'Sigla',
            'qtde_alunos' => 'Qtde Alunos',
            'outras_caracteristicas' => 'Outras Caracteristicas',
            'observacoes' => 'Observacoes',
            'aplicativo_movel' => 'Aplicativo Movel',
        ];
    }
}
