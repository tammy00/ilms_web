<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "disciplina".
 *
 * @property string $id_nome
 * @property string $departamento
 * @property string $observacoes
 * @property string $outras_caracteristicas
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
            [['id_nome', 'departamento', 'observacoes', 'outras_caracteristicas'], 'required'],
            [['observacoes', 'outras_caracteristicas'], 'string'],
            [['id_nome'], 'string', 'max' => 150],
            [['departamento'], 'string', 'max' => 255],
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
            'departamento' => 'Departamento',
            'observacoes' => 'Observacoes',
            'outras_caracteristicas' => 'Outras Caracteristicas',
        ];
    }
}
