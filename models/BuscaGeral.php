<?php

namespace app\models;
use yii\base\Model;

use Yii;

/**
 * This is the model class for tables 'descricao' and 'pesquisas'
 *

 */
class BuscaGeral extends Model
{
    /**
     * @inheritdoc
     */

    // Atributos checkbox
    
    public $cbr;
    public $lms;
    public $experts;  
    public $agente;  

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
    public $tipo_problema; 




    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        /*** Abaixo, os atributos de descricao_problema   ***/
            [['natureza_problema', 'descricao_problema', 'problema_detalhado'], 'string'],
            [['id_polo', 'cbr', 'lms', 'experts', 'titulo_problema', 'tipo_problema', 'agente'], 'integer'],
            [['relator'], 'string', 'max' => 250],
            [['palavras_chaves'], 'string', 'max' => 400],   // Cadê o max dos 3 primeiros?
            /*************************************/

            /*** Abaixo, os atributos de resposta_esp   ***/
            //[['titulo_problema'], 'string', 'max' => 200],
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
            'tipo_problema' => 'Tipo do Problema',
            'cbr' => 'Casos Passados',
            'experts' => 'Opiniões',
            'lms' => 'Dados do AVA',
        ];
    }
}
