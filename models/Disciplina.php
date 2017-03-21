<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplina".
 *
 * @property string $id_disciplina
 * @property string $nome
 * @property string $departamento
 * @property string $observacoes
 * @property string $outras_caracteristicas
 * @property string $id_curso
 * @property string $id_professor
 *
 * @property Curso[] $cursos
 * @property Curso $idCurso
 * @property Professor $idProfessor
 * @property Professor[] $professors
 */
class Disciplina extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'disciplina';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['observacoes', 'outras_caracteristicas'], 'string'],
            [['id_curso', 'id_professor'], 'integer'],
            [['nome', 'departamento'], 'string', 'max' => 250],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id_curso']],
            [['id_professor'], 'exist', 'skipOnError' => true, 'targetClass' => Professor::className(), 'targetAttribute' => ['id_professor' => 'id_professor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_disciplina' => 'Id Disciplina',
            'nome' => 'Nome',
            'departamento' => 'Departamento',
            'observacoes' => 'Observacoes',
            'outras_caracteristicas' => 'Outras Caracteristicas',
            'id_curso' => 'Id Curso',
            'id_professor' => 'Id Professor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['id_disciplina' => 'id_disciplina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCurso()
    {
        return $this->hasOne(Curso::className(), ['id_curso' => 'id_curso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfessor()
    {
        return $this->hasOne(Professor::className(), ['id_professor' => 'id_professor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfessors()
    {
        return $this->hasMany(Professor::className(), ['id_disciplina' => 'id_disciplina']);
    }
}
