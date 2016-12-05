<?php

namespace app\models;

use Yii;

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
 * @property string $OBSERVACAO
 * @property integer $SUPERADMIN
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
            [['ACEITA_TERMOS_USO', 'SUPERADMIN'], 'integer'],
            [['ACEITA_TERMOS_USO'], 'compare', 'compareValue' => true, 'message' => 'Obrigatório aceitar os Termos de Uso.' ],
            [['DATA_NASCIMENTO'], 'safe'],
            [['OBSERVACAO'], 'string'],
            [['NOME'], 'string', 'max' => 50],
            [['APELIDO'], 'string', 'max' => 20],
            [['LOGIN', 'SENHA'], 'string', 'max' => 15],
            [['LOGIN'], 'unique'],
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
            'OBSERVACAO' => 'Observações',
            'SUPERADMIN' => 'Superadmin',
        ];
    }
    
    public static function findIdentity($id)
	{   	 
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
    
    public static function isSuperAdmin()
    {
        return !Yii::$app->user->isGuest && Yii::$app->user->identity->user_type == self::USER_TYPE_SUPER_ADMIN;
    }
}
