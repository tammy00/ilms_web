<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "solucao".
 *
 * @property integer $id
 * @property string $diagnostico
 * @property string $solucao
 * @property string $palavras_chaves
 * @property string $acao_implementada
 * @property string $solucao_implementada
 * @property string $efetividade_acao_implementada
 * @property string $custos
 * @property string $impacto_pedagogico
 * @property string $atores_envolvidos
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
            [['id'], 'required'],
            [['id'], 'integer'],
            [['diagnostico', 'custos', 'impacto_pedagogico'], 'string', 'max' => 400],
            [['solucao'], 'string', 'max' => 1000],
            [['palavras_chaves', 'atores_envolvidos'], 'string', 'max' => 255],
            [['acao_implementada'], 'string', 'max' => 5000],
            [['solucao_implementada'], 'string', 'max' => 10],
            [['efetividade_acao_implementada'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'diagnostico' => 'Diagnóstico',
            'solucao' => 'Solução',
            'palavras_chaves' => 'Palavras-Chaves',
            'acao_implementada' => 'Ação Implementada',
            'solucao_implementada' => 'Solução Implementada',
            'efetividade_acao_implementada' => 'Efetividade da Ação Implementada',
            'custos' => 'Custos',
            'impacto_pedagogico' => 'Impacto Pedagógico',
            'atores_envolvidos' => 'Atores Envolvidos',
        ];
    }
}
