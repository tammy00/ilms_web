<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "polo".
 *
 * @property string $id_polo
 * @property string $nome
 * @property string $coordenador
 * @property string $tipo_conexao
 * @property string $infra_laboratorio
 * @property string $infra_fisica
 * @property string $infra_cidade
 * @property string $acesso
 * @property string $outras_caracteristicas
 * @property string $id_descricao
 * @property string $id_turma
 * @property string $id_curso
 *
 * @property Curso[] $cursos
 * @property Descricao[] $descricaos
 * @property Curso $idCurso
 * @property Descricao $idDescricao
 * @property Turma $idTurma
 * @property Turma[] $turmas
 */
class Polo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'polo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['outras_caracteristicas'], 'string'],
            [['id_descricao', 'id_turma', 'id_curso'], 'integer'],
            [['nome', 'coordenador', 'tipo_conexao', 'infra_laboratorio', 'infra_fisica', 'infra_cidade', 'acesso'], 'string', 'max' => 250],  
            [['id_curso'], 'exist', 'skipOnError' => true, 'targetClass' => Curso::className(), 'targetAttribute' => ['id_curso' => 'id_curso']],  
            [['id_descricao'], 'exist', 'skipOnError' => true, 'targetClass' => Descricao::className(), 'targetAttribute' => ['id_descricao' => 'id_descricao']],
            [['id_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['id_turma' => 'id_turma']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_polo' => 'Id Polo',
            'nome' => 'Nome',
            'coordenador' => 'Coordenador',
            'tipo_conexao' => 'Tipo Conexao',
            'infra_laboratorio' => 'Infra Laboratorio',
            'infra_fisica' => 'Infra Fisica',
            'infra_cidade' => 'Infra Cidade',
            'acesso' => 'Acesso',
            'outras_caracteristicas' => 'Outras Caracteristicas',
            'id_descricao' => 'Id Descricao',
            'id_turma' => 'Id Turma',
            'id_curso' => 'Id Curso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['id_polo' => 'id_polo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescricaos()
    {
        return $this->hasMany(Descricao::className(), ['id_polo' => 'id_polo']);
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
    public function getIdDescricao()
    {
        return $this->hasOne(Descricao::className(), ['id_descricao' => 'id_descricao']);
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
    public function getTurmas()
    {
        return $this->hasMany(Turma::className(), ['id_polo' => 'id_polo']);
    }
}
