<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pesquisas".
 *
 * @property integer $id_pesquisa
 * @property integer $id_solucao
 * @property integer $id_usuario
 * @property integer $id_polo
 * @property string $relator
 * @property string $natureza_problema
 * @property string $descricao_problema
 * @property string $problema_detalhado
 * @property string $palavras_chaves
 */
class Pesquisas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesquisas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_solucao', 'id_usuario', 'id_polo', 'status', 'id_resposta', 'id_ava'], 'integer'],
            [['similaridade'], 'number'],
            [['natureza_problema', 'descricao_problema', 'problema_detalhado'], 'string'],
            [['metodo'], 'string', 'max' => 100],
            [['relator'], 'string', 'max' => 250],
            [['palavras_chaves'], 'string', 'max' => 400],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pesquisa' => 'Id Pesquisa',
            'id_solucao' => 'Id Solucao',
            'id_ava' => 'ID AVA',
            'id_resposta' => 'ID Resposta do Especilista',
            'id_usuario' => 'Usuário',
            'id_polo' => 'Polo',
            'relator' => 'Relator',
            'natureza_problema' => 'Natureza do Problema',
            'descricao_problema' => 'Descrição do Problema',
            'problema_detalhado' => 'Problema Detalhado',
            'palavras_chaves' => 'Palavras-chaves',
            'status' => 'Status',
            'similaridade' => 'Similaridade',
            'metodo' => 'Método de Pesquisa',
        ];
    }

}
