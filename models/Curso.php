<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "curso".
 *
 * @property string $id_nome
 * @property string $polo_id
 * @property string $tipo_curso
 * @property integer $duracao
 * @property string $departamento
 * @property string $coordenador
 * @property string $outras_caracteristicas
 * @property string $observacoes
 *
 * @property Polo $polo
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
            [['id_nome', 'polo_id', 'tipo_curso', 'duracao', 'departamento', 'coordenador', 'outras_caracteristicas', 'observacoes'], 'required'],
            [['duracao'], 'integer'],
            [['outras_caracteristicas', 'observacoes'], 'string'],
            [['id_nome', 'polo_id', 'coordenador'], 'string', 'max' => 150],
            [['tipo_curso'], 'string', 'max' => 50],
            [['departamento'], 'string', 'max' => 100],
            [['id_nome'], 'unique'],
            [['polo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Polo::className(), 'targetAttribute' => ['polo_id' => 'id_nome']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_nome' => 'Id Nome',
            'polo_id' => 'Polo ID',
            'tipo_curso' => 'Tipo Curso',
            'duracao' => 'Duracao',
            'departamento' => 'Departamento',
            'coordenador' => 'Coordenador',
            'outras_caracteristicas' => 'Outras Caracteristicas',
            'observacoes' => 'Observacoes',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolo()
    {
        return $this->hasOne(Polo::className(), ['id_nome' => 'polo_id']);
    }
}
