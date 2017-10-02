<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_problema".
 *
 * @property integer $id
 * @property string $tipo
 *
 * @property RespostaEsp[] $respostaEsps
 */
class TipoProblema extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_problema';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo'], 'required'],
            [['tipo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipo' => 'Tipo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespostaEsps()
    {
        return $this->hasMany(RespostaEsp::className(), ['id_tipo_problema' => 'id']);
    }
}
