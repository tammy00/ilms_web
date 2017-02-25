<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutor".
 *
 * @property string $id_matricula
 * @property string $nome
 * @property string $tipo_tutoria
 * @property string $tipo_bolsa
 * @property string $outras_caracteristicas
 * @property string $observacoes
 * @property string $polo_id
 *
 * @property Polo $polo
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
            [['id_matricula', 'nome', 'tipo_tutoria', 'tipo_bolsa', 'outras_caracteristicas', 'observacoes', 'polo_id'], 'required'],
            [['outras_caracteristicas', 'observacoes'], 'string'],
            [['id_matricula'], 'string', 'max' => 10],
            [['nome', 'polo_id'], 'string', 'max' => 150],
            [['tipo_tutoria', 'tipo_bolsa'], 'string', 'max' => 100],
            [['id_matricula'], 'unique'],
            [['polo_id'], 'exist', 'skipOnError' => true, 'targetClass' => Polo::className(), 'targetAttribute' => ['polo_id' => 'id_nome']],
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
            'tipo_tutoria' => 'Tipo Tutoria',
            'tipo_bolsa' => 'Tipo Bolsa',
            'outras_caracteristicas' => 'Outras Caracteristicas',
            'observacoes' => 'Observacoes',
            'polo_id' => 'Polo ID',
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
