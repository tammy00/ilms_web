<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solucao".
 *
 * @property string $id_solucao
 * @property string $solucao
 * @property string $palavras_chaves
 * @property string $acao_implementada
 * @property string $solucao_implementada
 * @property string $efetividade_acao_implementada
 * @property string $custos
 * @property string $impacto_pedagogico
 * @property string $atores_envolvidos
 * @property string $id_infoc
 *
 * @property InfoCaso $idInfoc
 */
class Solucao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'solucao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['solucao', 'acao_implementada', 'solucao_implementada', 'impacto_pedagogico', 'efetividade_acao_implementada'], 'string'],
            [['id_infoc'], 'integer'],
            [['palavras_chaves', 'atores_envolvidos'], 'string', 'max' => 250],
            [['custos'], 'string', 'max' => 50],
            [['id_infoc'], 'exist', 'skipOnError' => true, 'targetClass' => InfoCaso::className(), 'targetAttribute' => ['id_infoc' => 'id_infoc']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_solucao' => 'Id Solução',
            'solucao' => 'Solução',
            'palavras_chaves' => 'Palavras-chaves',
            'acao_implementada' => 'Ação Implementada',
            'solucao_implementada' => 'Solução Implementada',
            'efetividade_acao_implementada' => 'Efetividade da Ação Implementada',
            'custos' => 'Custos',
            'impacto_pedagogico' => 'Impacto Pedagógico',
            'atores_envolvidos' => 'Atores Envolvidos',
            'id_infoc' => 'Id Infoc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInfoc()
    {
        return $this->hasOne(InfoCaso::className(), ['id_infoc' => 'id_infoc']);
    }
}
