<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "relator".
 *
 * @property string $id_relator
 * @property string $perfil
 * @property string $id_infoc
 *
 * @property InfoCaso[] $infoCasos
 * @property InfoCaso $idInfoc
 */
class Relator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'relator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_infoc'], 'integer'],
            [['perfil'], 'string', 'max' => 250],  /*
            [['id_infoc'], 'exist', 'skipOnError' => true, 'targetClass' => InfoCaso::className(), 'targetAttribute' => ['id_infoc' => 'id_infoc']],  */
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_relator' => 'Id Relator',
            'perfil' => 'Perfil',
            'id_infoc' => 'Id Infoc',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInfoCasos()
    {
        return $this->hasMany(InfoCaso::className(), ['id_relator' => 'id_relator']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdInfoc()
    {
        return $this->hasOne(InfoCaso::className(), ['id_infoc' => 'id_infoc']);
    }
}
