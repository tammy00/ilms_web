<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "professor".
 *
 * @property string $id_professor
 * @property string $nome
 * @property string $tipo_bolsa
 * @property string $dapartamento
 * @property string $outras_caracteristicas
 * @property string $observacoes
 * @property string $id_disciplina
 *
 * @property Disciplina[] $disciplinas
 * @property Disciplina $idDisciplina
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
            [['outras_caracteristicas', 'observacoes'], 'string'],
            [['id_disciplina'], 'integer'],
            [['nome', 'tipo_bolsa', 'dapartamento'], 'string', 'max' => 250],
            [['id_disciplina'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['id_disciplina' => 'id_disciplina']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_professor' => 'Id Professor',
            'nome' => 'Nome',
            'tipo_bolsa' => 'Tipo Bolsa',
            'dapartamento' => 'Dapartamento',
            'outras_caracteristicas' => 'Outras Caracteristicas',
            'observacoes' => 'Observacoes',
            'id_disciplina' => 'Id Disciplina',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['id_professor' => 'id_professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id_disciplina' => 'id_disciplina']);
    }
}
