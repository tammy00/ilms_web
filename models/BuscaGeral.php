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

    public $check_rbc;
    public $check_lms;
    public $check_exp;

    // Atributos de 'descricao_problema'
    public $natureza_problema;   // Equivalente do tipo_problema
    public $descricao_problema;
    public $problema_detalhado;
    public $palavras_chaves;
    public $id_polo;

    //Atributos em comum de 'descricao_problema' e 'resposta_esp'
    public $relator;

    //Atributos de 'resposta_esp'




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
            [['id', 'id_tipo_problema', 'id_titulo_problema', 'descricao_problema', 'descricao_solucao', 'data_ocorrencia', 'data_insercao', 'nome_especialista', 'funcao_especialista', 'relator'], 'required'],
            [['id', 'id_tipo_problema', 'id_titulo_problema'], 'integer'],
            [['data_ocorrencia', 'data_insercao'], 'safe'],
            [['descricao_problema', 'descricao_solucao'], 'string', 'max' => 300],
            [['nome_especialista'], 'string', 'max' => 200],
            [['funcao_especialista'], 'string', 'max' => 100],
            [['id_tipo_problema'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProblema::className(), 'targetAttribute' => ['id_tipo_problema' => 'id']],
            [['id_titulo_problema'], 'exist', 'skipOnError' => true, 'targetClass' => TituloProblema::className(), 'targetAttribute' => ['id_titulo_problema' => 'id']],
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
            'id_tipo_problema' => 'Id Tipo Problema',
            'id_titulo_problema' => 'Id Titulo Problema',
            'descricao_esp' => 'Descricao Problema',   // Equivalente ao 'descricao_problema'
            'solucao_esp' => 'Descricao Solucao',  // Equivalente ao 'descricao_solucao'
            //'data_ocorrencia' => 'Data Ocorrencia',
            //'data_insercao' => 'Data Insercao',
            'nome_especialista' => 'Nome Especialista',
            'funcao_especialista' => 'Funcao Especialista',
            //'relator' => 'Relator',   // Equivalente ao 'relator' de 'descricao_problema'
        ];
    }
}
