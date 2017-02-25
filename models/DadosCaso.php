<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dados_caso".
 *
 * @property integer $id
 * @property string $date_created
 * @property string $tipo_caso
 * @property string $turma_id
 * @property integer $qtde_alunos
 * @property string $polo
 */
class DadosCaso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dados_caso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'qtde_alunos'], 'integer'],
            [['date_created', 'tipo_caso', 'polo'], 'string', 'max' => 255],
            [['turma_id'], 'string', 'max' => 300],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_created' => 'Date Created',
            'tipo_caso' => 'Tipo Caso',
            'turma_id' => 'Turma ID',
            'qtde_alunos' => 'Qtde Alunos',
            'polo' => 'Polo',
        ];
    }
}
