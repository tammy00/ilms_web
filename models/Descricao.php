<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "descricao".
 *
 * @property string $id_descricao
 * @property string $natureza_problema
 * @property string $relator
 * @property string $descricao_problema
 * @property string $problema_detalhado
 * @property string $palavras_chaves
 * @property string $id_infoc
 * @property string $id_polo
 *
 * @property InfoCaso $idInfoc
 * @property Polo $idPolo
 * @property InfoCaso[] $infoCasos
 * @property Polo[] $polos
 */
class Descricao extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'descricao';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['natureza_problema', 'descricao_problema', 'problema_detalhado'], 'string'],
            [['id_infoc', 'id_polo'], 'integer'],
            [['relator'], 'string', 'max' => 250],
            [['palavras_chaves'], 'string', 'max' => 400],
            [['id_infoc'], 'exist', 'skipOnError' => true, 'targetClass' => InfoCaso::className(), 'targetAttribute' => ['id_infoc' => 'id_infoc']],
            [['id_polo'], 'exist', 'skipOnError' => true, 'targetClass' => Polo::className(), 'targetAttribute' => ['id_polo' => 'id_polo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_descricao' => 'Id Descricao',
            'natureza_problema' => 'Natureza do Problema',
            'relator' => 'Relator',
            'descricao_problema' => 'Problema resumido',
            'problema_detalhado' => 'Problema detalhado',
            'palavras_chaves' => 'Palavras-chaves',
            'id_infoc' => 'Id Infoc',
            'id_polo' => 'Id Polo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInfoc()
    {
        return $this->hasOne(InfoCaso::className(), ['id_infoc' => 'id_infoc']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPolo()
    {
        return $this->hasOne(Polo::className(), ['id_polo' => 'id_polo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfoCasos()
    {
        return $this->hasMany(InfoCaso::className(), ['id_descricao' => 'id_descricao']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPolos()
    {
        return $this->hasMany(Polo::className(), ['id_descricao' => 'id_descricao']);
    }
}
