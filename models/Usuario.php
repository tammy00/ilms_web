<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\base\Security;
use yii\web\IdentityInterface;
use app\models\Usuario;

/**
 * This is the model class for table "usuario".
 *
 * @property string $id
 * @property string $nome
 * @property string $email
 * @property string $perfil
 * @property string $senha
 */
class Usuario extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'senha'], 'required'],
            [['id'], 'integer'],
            [['nome', 'email', 'perfil'], 'string', 'max' => 200],
            [['senha'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nome' => 'Nome',
            'email' => 'E-mail',
            'perfil' => 'Perfil',
            'senha' => 'Senha',
        ];
    }

    public function getId()
    {
        return $this->id;
    }

    public static function findByEmail($email)
    {
        //return Usuario::find()->where(['email' => $email])->one();
        return Usuario::findOne(['email' => $email]);
    }

    /**
     * @inheritdoc
     */

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->senha === md5($password);
    }

    public function setPassword($password)
    {
        $this->password_hash = Security::generatePasswordHash($password);
    }



    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Security::generateRandomKey();
    }
    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Security::generateRandomKey() . '_' . time();
    }
    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }



    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
          return static::findOne(['access_token' => $token]);
    }
}
