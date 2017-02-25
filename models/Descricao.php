<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "descricao".
 *
 * @property integer $id
 * @property string $natureza_problema
 * @property string $relator
 * @property string $curso_id
 * @property string $disciplina_id
 * @property string $descricao_problema
 * @property string $problema
 * @property string $palavras_chaves
 */
class Descricao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'descricao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['natureza_problema', 'relator'], 'string', 'max' => 255],
            [['curso_id', 'disciplina_id'], 'string', 'max' => 150],
            [['descricao_problema'], 'string', 'max' => 1000],
            [['problema'], 'string', 'max' => 500],
            [['palavras_chaves'], 'string', 'max' => 400],
            [['id'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'natureza_problema' => 'Natureza do Problema',
            'relator' => 'Relator',
            'curso_id' => 'Curso',
            'disciplina_id' => 'Disciplina',
            'descricao_problema' => 'Descricao do Problema',
            'problema' => 'Problema',
            'palavras_chaves' => 'Palavras-Chaves',
        ];
    }
}
