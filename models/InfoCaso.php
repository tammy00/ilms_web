<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "info_caso".
 *
 * @property string $id_infoc
 * @property string $date_created
 * @property string $tipo_caso
 * @property string $quantidade_alunos
 * @property string $polo
 * @property string $id_descricao
 * @property string $id_relator
 *
 * @property Descricao[] $descricaos
 * @property Descricao $idDescricao
 * @property Relator $idRelator
 * @property Relator[] $relators
 * @property Solucao[] $solucaos
 */
class InfoCaso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'info_caso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['quantidade_alunos', 'id_descricao', 'id_relator'], 'integer'],
            [['date_created'], 'string', 'max' => 50],
            [['tipo_caso', 'polo'], 'string', 'max' => 250],
            [['id_descricao'], 'exist', 'skipOnError' => true, 'targetClass' => Descricao::className(), 'targetAttribute' => ['id_descricao' => 'id_descricao']],
            [['id_relator'], 'exist', 'skipOnError' => true, 'targetClass' => Relator::className(), 'targetAttribute' => ['id_relator' => 'id_relator']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_infoc' => 'Id Infoc',
            'date_created' => 'Date Created',
            'tipo_caso' => 'Tipo Caso',
            'quantidade_alunos' => 'Quantidade Alunos',
            'polo' => 'Polo',
            'id_descricao' => 'Id Descricao',
            'id_relator' => 'Id Relator',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDescricaos()
    {
        return $this->hasMany(Descricao::className(), ['id_infoc' => 'id_infoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdDescricao()
    {
        return $this->hasOne(Descricao::className(), ['id_descricao' => 'id_descricao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRelator()
    {
        return $this->hasOne(Relator::className(), ['id_relator' => 'id_relator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelators()
    {
        return $this->hasMany(Relator::className(), ['id_infoc' => 'id_infoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSolucaos()
    {
        return $this->hasMany(Solucao::className(), ['id_infoc' => 'id_infoc']);
    }
}
