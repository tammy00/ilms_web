<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "figuras_ava".
 *
 * @property string $id_figura
 * @property string $nome_figura
 * @property string $aplicativo
 * @property string $tipo_grafico
 * @property string $curso
 * @property string $disciplina
 * @property string $polo
 * @property string $ano_periodo
 * @property string $total_alunos
 * @property string $palavras_chaves
 */
class FigurasAva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'figuras_ava';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_figura', 'total_alunos'], 'required'],
            [['id_figura', 'total_alunos'], 'integer'],
            [['nome_figura', 'disciplina', 'palavras_chaves'], 'string', 'max' => 200],
            [['aplicativo', 'tipo_grafico', 'curso', 'polo', 'ano_periodo'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_figura' => 'Id Figura',
            'nome_figura' => 'Nome Figura',
            'aplicativo' => 'Aplicativo',
            'tipo_grafico' => 'Tipo Grafico',
            'curso' => 'Curso',
            'disciplina' => 'Disciplina',
            'polo' => 'Polo',
            'ano_periodo' => 'Ano Periodo',
            'total_alunos' => 'Total Alunos',
            'palavras_chaves' => 'Palavras Chaves',
        ];
    }
}
