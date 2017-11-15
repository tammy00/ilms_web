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
            [['id_solucao', 'id_usuario', 'id_polo', 'status', 'id_titulo_problema'], 'integer'],
            [['similaridade'], 'number'],
            [['natureza_problema', 'descricao_problema', 'problema_detalhado'], 'string'],
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
            'id_usuario' => 'Usuário',
            'id_polo' => 'Polo',
            'relator' => 'Relator',
            'natureza_problema' => 'Natureza do Problema',
            'descricao_problema' => 'Descrição do Problema',
            'problema_detalhado' => 'Problema Detalhado',
            'palavras_chaves' => 'Palavras-chaves',
            'status' => 'Status',
            'similaridade' => 'Similaridade',
            'id_titulo_problema' => 'Título do Problema',
        ];
    }

    public function afterFind()
    {
        switch ($this->status)
        {
             case 0: 
                 $this->status = 'Sem resposta';
                 break;
             case 1: 
                 $this->status = 'Solução não ajudou';
                 break;
             case 2: 
                 $this->status = 'Caso da Base de Casos';
                 break;
        }

        if ( $this->id_polo != null )
        {
            $polo = Polo::find()->where(['id_polo' => $this->id_polo])->one();
            $this->id_polo = $polo->nome;
        }
    }
}
