<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resposta_esp".
 *
 * @property integer $id
 * @property integer $id_tipo_problema
 * @property integer $id_titulo_problema
 * @property string $descricao_problema
 * @property string $descricao_solucao
 * @property string $data_ocorrencia
 * @property string $data_insercao
 * @property string $nome_especialista
 * @property string $funcao_especialista
 * @property string $relator
 *
 * @property TipoProblema $idTipoProblema
 * @property TituloProblema $idTituloProblema
 */
class RespostaEspecialistas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'resposta_esp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_tipo_problema', 'id_titulo_problema', 'descricao_problema', 'descricao_solucao', 'data_ocorrencia', 'data_insercao', 'nome_especialista', 'funcao_especialista', 'relator'], 'required'],
            [['id', 'id_tipo_problema', 'id_titulo_problema'], 'integer'],
            [['data_ocorrencia', 'data_insercao'], 'safe'],
            [['descricao_problema', 'descricao_solucao'], 'string', 'max' => 300],
            [['nome_especialista'], 'string', 'max' => 200],
            [['funcao_especialista'], 'string', 'max' => 100],
            [['relator'], 'string', 'max' => 250],
            [['id_tipo_problema'], 'exist', 'skipOnError' => true, 'targetClass' => TipoProblema::className(), 'targetAttribute' => ['id_tipo_problema' => 'id']],
            [['id_titulo_problema'], 'exist', 'skipOnError' => true, 'targetClass' => TituloProblema::className(), 'targetAttribute' => ['id_titulo_problema' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_tipo_problema' => 'Id Tipo Problema',
            'id_titulo_problema' => 'Id Titulo Problema',
            'descricao_problema' => 'Descricao Problema',
            'descricao_solucao' => 'Descricao Solucao',
            'data_ocorrencia' => 'Data Ocorrencia',
            'data_insercao' => 'Data Insercao',
            'nome_especialista' => 'Nome Especialista',
            'funcao_especialista' => 'Funcao Especialista',
            'relator' => 'Relator',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoProblema()
    {
        return $this->hasOne(TipoProblema::className(), ['id' => 'id_tipo_problema']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTituloProblema()
    {
        return $this->hasOne(TituloProblema::className(), ['id' => 'id_titulo_problema']);
    }
}
