<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutor".
 *
 * @property string $id_tutor
 * @property string $nome
 * @property string $tipo_tutoria
 * @property string $tipo_bolsa
 * @property string $outras_caracteristicas
 * @property string $observacoes
 * @property string $id_turma
 *
 * @property Turma[] $turmas
 * @property Turma $idTurma
 */
class Tutor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['outras_caracteristicas', 'observacoes'], 'string'],
            [['id_turma'], 'integer'],
            [['nome'], 'string', 'max' => 250],
            [['tipo_tutoria', 'tipo_bolsa'], 'string', 'max' => 100],
            [['id_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['id_turma' => 'id_turma']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tutor' => 'Id Tutor',
            'nome' => 'Nome',
            'tipo_tutoria' => 'Tipo Tutoria',
            'tipo_bolsa' => 'Tipo Bolsa',
            'outras_caracteristicas' => 'Outras Caracteristicas',
            'observacoes' => 'Observacoes',
            'id_turma' => 'Id Turma',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTurmas()
    {
        return $this->hasMany(Turma::className(), ['id_tutor' => 'id_tutor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTurma()
    {
        return $this->hasOne(Turma::className(), ['id_turma' => 'id_turma']);
    }
}
