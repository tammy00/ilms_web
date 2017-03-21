<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property string $id_curso
 * @property string $nome
 * @property string $tipo_curso
 * @property string $duracao
 * @property string $departamento
 * @property string $coordenador
 * @property string $outras_caracteristicas
 * @property string $observacoes
 * @property string $id_polo
 * @property string $id_turma
 * @property string $id_disciplina
 *
 * @property Disciplina $idDisciplina
 * @property Polo $idPolo
 * @property Turma $idTurma
 * @property Disciplina[] $disciplinas
 * @property Polo[] $polos
 * @property Turma[] $turmas
 */
class Curso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'curso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['duracao', 'id_polo', 'id_turma', 'id_disciplina'], 'integer'],
            [['outras_caracteristicas', 'observacoes'], 'string'],
            [['nome', 'tipo_curso', 'departamento', 'coordenador'], 'string', 'max' => 250],
            [['id_disciplina'], 'exist', 'skipOnError' => true, 'targetClass' => Disciplina::className(), 'targetAttribute' => ['id_disciplina' => 'id_disciplina']],
            [['id_polo'], 'exist', 'skipOnError' => true, 'targetClass' => Polo::className(), 'targetAttribute' => ['id_polo' => 'id_polo']],
            [['id_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['id_turma' => 'id_turma']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_curso' => 'Id Curso',
            'nome' => 'Nome',
            'tipo_curso' => 'Tipo Curso',
            'duracao' => 'Duracao',
            'departamento' => 'Departamento',
            'coordenador' => 'Coordenador',
            'outras_caracteristicas' => 'Outras Caracteristicas',
            'observacoes' => 'Observacoes',
            'id_polo' => 'Id Polo',
            'id_turma' => 'Id Turma',
            'id_disciplina' => 'Id Disciplina',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDisciplina()
    {
        return $this->hasOne(Disciplina::className(), ['id_disciplina' => 'id_disciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPolo()
    {
        return $this->hasOne(Polo::className(), ['id_polo' => 'id_polo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTurma()
    {
        return $this->hasOne(Turma::className(), ['id_turma' => 'id_turma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDisciplinas()
    {
        return $this->hasMany(Disciplina::className(), ['id_curso' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolos()
    {
        return $this->hasMany(Polo::className(), ['id_curso' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurmas()
    {
        return $this->hasMany(Turma::className(), ['id_curso' => 'id_curso']);
    }
}
