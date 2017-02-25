<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "polo".
 *
 * @property string $id_nome
 * @property string $coordenador
 * @property string $tipo_conexao
 * @property string $infra_laboratorio
 * @property string $infra_fisica
 * @property string $infra_cidade
 * @property string $acesso
 * @property string $outras_caracteristicas
 *
 * @property Curso[] $cursos
 * @property Tutor[] $tutors
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
            [['id_nome', 'coordenador', 'tipo_conexao', 'infra_laboratorio', 'infra_fisica', 'infra_cidade', 'acesso', 'outras_caracteristicas'], 'required'],
            [['outras_caracteristicas'], 'string'],
            [['id_nome'], 'string', 'max' => 150],
            [['coordenador', 'tipo_conexao', 'infra_laboratorio', 'infra_fisica', 'infra_cidade', 'acesso'], 'string', 'max' => 255],
            [['id_nome'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_nome' => 'Id Nome',
            'coordenador' => 'Coordenador',
            'tipo_conexao' => 'Tipo Conexao',
            'infra_laboratorio' => 'Infra Laboratorio',
            'infra_fisica' => 'Infra Fisica',
            'infra_cidade' => 'Infra Cidade',
            'acesso' => 'Acesso',
            'outras_caracteristicas' => 'Outras Caracteristicas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCursos()
    {
        return $this->hasMany(Curso::className(), ['polo_id' => 'id_nome']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTutors()
    {
        return $this->hasMany(Tutor::className(), ['polo_id' => 'id_nome']);
    }
}
