<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "professor".
 *
 * @property string $id_matricula
 * @property string $nome
 * @property string $tipo_bolsa
 * @property string $departamento
 * @property string $outras_caracteristicas
 * @property string $observacoes
 */
class Professor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'professor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_matricula', 'nome', 'tipo_bolsa', 'departamento', 'outras_caracteristicas', 'observacoes'], 'required'],
            [['outras_caracteristicas', 'observacoes'], 'string'],
            [['id_matricula', 'nome', 'departamento'], 'string', 'max' => 150],
            [['tipo_bolsa'], 'string', 'max' => 100],
            [['id_matricula'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_matricula' => 'Id Matricula',
            'nome' => 'Nome',
            'tipo_bolsa' => 'Tipo Bolsa',
            'departamento' => 'Departamento',
            'outras_caracteristicas' => 'Outras Caracteristicas',
            'observacoes' => 'Observacoes',
        ];
    }
}
