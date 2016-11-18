<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "usuarios".
 *
 * @property integer $ID
 * @property string $NOME
 * @property string $APELIDO
 * @property integer $ACEITA_TERMOS_USO
 * @property string $DATA_NASCIMENTO
 * @property string $LOGIN
 * @property string $SENHA
 * @property string $FACEBOOK
 * @property string $CELULAR
 * @property string $OBSERVACAO
 */
class Usuarios extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOME', 'ACEITA_TERMOS_USO', 'DATA_NASCIMENTO', 'LOGIN', 'SENHA'], 'required'],
            //[['ACEITA_TERMOS_USO'], 'integer', 'min' => 1],
            [['ACEITA_TERMOS_USO'], 'compare', 'compareValue' => true, 'message' => 'Obrigatório aceitar os Termos de Uso.' ],
            [['DATA_NASCIMENTO'], 'safe'],
            [['OBSERVACAO'], 'string'],
            [['NOME', 'FACEBOOK'], 'string', 'max' => 50],
            [['APELIDO'], 'string', 'max' => 20],
            [['LOGIN', 'SENHA'], 'string', 'max' => 15],
            [['CELULAR'], 'string', 'max' => 12],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'NOME' => 'Nome',
            'APELIDO' => 'Apelido',
            'ACEITA_TERMOS_USO' => 'Aceito os Termos de Uso',
            'DATA_NASCIMENTO' => 'Data de Nascimento',
            'LOGIN' => 'Login',
            'SENHA' => 'Senha',
            'FACEBOOK' => 'Facebook',
            'CELULAR' => 'Celular',
            'OBSERVACAO' => 'Observacao',
        ];
    }

    public static function findIdentity($id)
	{   	 
    	//return static::findOne($id);

    	$user = Usuarios::findOne($id);
        if (count($user))
        {
        	return new static ($user);
        }
        return null;
	}
    
	public static function findIdentityByAccessToken($token, $type = null)
	{
	}
    
	public static function findByUsername($username)
	{
    	$user = Usuarios::find()->where(['LOGIN' => $username])->one();

        if(count($user))
        {
        	return new static($user);
        }

        return null;
	}
 
	public function getId()
	{
    	return $this->ID;
	}

	public function getAuthKey()
	{   	 
	}

	public function validateAuthKey($authKey)
	{	 
	}  

    public function validatePassword($password)
	{
		return $this->SENHA === $password;
	}
}
