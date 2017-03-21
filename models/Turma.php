<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "turma".
 *
 * @property string $id_turma
 * @property string $sigla
 * @property string $qtde_alunos
 * @property string $outras_caracteristicas
 * @property string $observacoes
 * @property string $aplicativo_movel
 * @property string $id_polo
 * @property string $id_curso
 * @property string $id_tutor
 * @property string $id_aplicativo
 *
 * @property Aplicativo[] $aplicativos
 * @property Curso[] $cursos
 * @property Polo[] $polos
 * @property Aplicativo $idAplicativo
 * @property Curso $idCurso
 * @property Polo $idPolo
 * @property Tutor $idTutor
 * @property Tutor[] $tutors
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
            [['qtde_alunos', 'id_polo', 'id_curso', 'id_tutor', 'id_aplicativo'], 'integer'],
            [['outras_caracteristicas', 'observacoes'], 'string'],
            [['sigla', 'aplicativo_movel'], 'string', 'max' => 50],
            [['id_aplicativo'], 'exist', 'skipOnError' => true, 'targetClass' => Aplicativo::className(), 'targetAttribute' => ['id_aplicativo' => 'id_aplicativo']],
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id_curso']],
            [['id_polo'], 'exist', 'skipOnError' => true, 'targetClass' => Polo::className(), 'targetAttribute' => ['id_polo' => 'id_polo']],
            [['id_tutor'], 'exist', 'skipOnError' => true, 'targetClass' => Tutor::className(), 'targetAttribute' => ['id_tutor' => 'id_tutor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_turma' => 'Id Turma',
            'sigla' => 'Sigla',
            'qtde_alunos' => 'Qtde Alunos',
            'outras_caracteristicas' => 'Outras Caracteristicas',
            'observacoes' => 'Observacoes',
            'aplicativo_movel' => 'Aplicativo Movel',
            'id_polo' => 'Id Polo',
            'id_curso' => 'Id Curso',
            'id_tutor' => 'Id Tutor',
            'id_aplicativo' => 'Id Aplicativo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAplicativos()
    {
        return $this->hasMany(Aplicativo::className(), ['id_turma' => 'id_turma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['id_turma' => 'id_turma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolos()
    {
        return $this->hasMany(Polo::className(), ['id_turma' => 'id_turma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAplicativo()
    {
        return $this->hasOne(Aplicativo::className(), ['id_aplicativo' => 'id_aplicativo']);
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
    public function getIdPolo()
    {
        return $this->hasOne(Polo::className(), ['id_polo' => 'id_polo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTutor()
    {
        return $this->hasOne(Tutor::className(), ['id_tutor' => 'id_tutor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutors()
    {
        return $this->hasMany(Tutor::className(), ['id_turma' => 'id_turma']);
    }
}
