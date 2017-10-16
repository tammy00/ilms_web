<?php

namespace app\models;
use yii\base\Model;

use Yii;

/**
 * This is the model class for tables 'resposta_esp', 'descricao_problema' and 'moodle259'.
 *

 */
class BuscaGeral extends Model
{
    /**
     * @inheritdoc
     */

    // Atributos de 'descricao_problema'
    public $natureza_problema;   // Equivalente do tipo_problema
    public $descricao_problema;
    public $problema_detalhado;
    public $palavras_chaves;
    public $id_polo;

    //Atributos em comum de 'descricao_problema' e 'resposta_esp'
    public $relator;

    //Atributos de 'resposta_esp'
    public $titulo_problema;




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        /*** Abaixo, os atributos de descricao_problema   ***/
            [['natureza_problema', 'descricao_problema', 'problema_detalhado'], 'string'],
            [['id_polo'], 'integer'],
            [['relator'], 'string', 'max' => 250],
            [['palavras_chaves'], 'string', 'max' => 400],   // Cadê o max dos 3 primeiros?
            /*************************************/

            /*** Abaixo, os atributos de resposta_esp   ***/
            [['titulo_problema'], 'string', 'max' => 200],
            /*************************************/
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [  // Abaixo, os atributos de 'descricao_problema'
            'natureza_problema' => 'Natureza do Problema',
            'relator' => 'Relator',
            'descricao_problema' => 'Problema resumido',
            'problema_detalhado' => 'Problema detalhado',
            'palavras_chaves' => 'Palavras-chaves',
            'id_polo' => 'Polo',

            // ABaixo, os atributos de 'resposta_esp'
            'titulo_problema' => 'Título do Problema',
        ];
    }
}
