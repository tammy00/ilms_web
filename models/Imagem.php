<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "imagem".
 *
 * @property integer $id_imagem
 * @property string $curso
 * @property string $disciplina
 * @property integer $periodo
 * @property string $palavra_chave
 * @property string $descricao
 * @property integer $ano
 */
class Imagem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'imagem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['curso', 'disciplina', 'periodo', 'palavra_chave', 'descricao', 'ano'], 'required'],
            [['periodo', 'ano'], 'integer'],
            [['descricao'], 'string'],
            [['curso', 'disciplina'], 'string', 'max' => 250],
            [['palavra_chave'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_imagem' => 'Id Imagem',
            'curso' => 'Curso',
            'disciplina' => 'Disciplina',
            'periodo' => 'Periodo',
            'palavra_chave' => 'Palavra Chave',
            'descricao' => 'Descricao',
            'ano' => 'Ano',
        ];
    }
}
