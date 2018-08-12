<?php

namespace app\models;
use yii\base\Model;

use Yii;

/**
 * This is the model class for tables 'resposta_esp', 'descricao_problema' and 'moodle259'.
 *

 */
class Combinacao extends Model
{
    /**
     * @inheritdoc
     */

    // Atributos checkbox
    
    public $palavras_chaves;
    public $titulo_problema; 
    public $tipo_problema; 
    public $cbr;
    public $ava;
    public $esp;



    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
        /*** Abaixo, os atributos de descricao_problema   ***/
            [['titulo_problema', 'tipo_problema', 'cbr', 'ava', 'esp'], 'integer'],
            [['palavras_chaves'], 'string', 'max' => 400],  
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [  
            'palavras_chaves' => 'Palavras-chaves',

            // ABaixo, os atributos de 'resposta_esp'
            'titulo_problema' => 'Título do Problema',
            'tipo_problema' => 'Tipo do Problema',
            'ava' => 'AVA',
            'cbr' => 'RBC',
            'esp' => 'Esp.',
        ];
    }
}
