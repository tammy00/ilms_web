<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "titulo_problema".
 *
 * @property integer $id
 * @property string $titulo
 *
 * @property RespostaEsp[] $respostaEsps
 */
class TituloProblema extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'titulo_problema';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['titulo'], 'required'],
            [['titulo'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'titulo' => 'Titulo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespostaEsps()
    {
        return $this->hasMany(RespostaEsp::className(), ['id_titulo_problema' => 'id']);
    }
}
