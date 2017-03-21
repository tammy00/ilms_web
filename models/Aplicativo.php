<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "aplicativo".
 *
 * @property string $id_aplicativo
 * @property string $nome
 * @property string $observacoes
 * @property string $id_turma
 *
 * @property Turma $idTurma
 * @property Turma[] $turmas
 */
class Aplicativo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'aplicativo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['observacoes'], 'string'],
            [['id_turma'], 'integer'],
            [['nome'], 'string', 'max' => 50],
            [['id_turma'], 'exist', 'skipOnError' => true, 'targetClass' => Turma::className(), 'targetAttribute' => ['id_turma' => 'id_turma']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_aplicativo' => 'Id Aplicativo',
            'nome' => 'Nome',
            'observacoes' => 'Observacoes',
            'id_turma' => 'Id Turma',
        ];
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
        return $this->hasMany(Turma::className(), ['id_aplicativo' => 'id_aplicativo']);
    }
}
