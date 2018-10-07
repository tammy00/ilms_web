<?php

namespace app\models;
use yii\base\Model;

use Yii;

/**
 * This is the model class for tables 'descricao' and 'pesquisas'
 *

 */
class FormInicial extends Model
{
    /**
     * @inheritdoc
     */

    // Atributos checkbox
    

    public $agente; 
    public $resumo; 





    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

            [[ 'agente'], 'integer'],
            [['resumo'], 'string'],
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
            'resumo' => 'Descrição resumida do problema',

            'agente' => 'Método de Busca',
        ];
    }
}
