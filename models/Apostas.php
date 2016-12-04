<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "apostas".
 *
 * @property integer $ID
 * @property integer $USUARIO_ID
 * @property integer $JOGO_SALA_ID
 * @property integer $RESULTADO_CASA
 * @property integer $RESULTADO_VISITANTE
 */
class Apostas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'apostas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            //[['USUARIO_ID', 'JOGO_SALA_ID', 'RESULTADO_CASA', 'RESULTADO_VISITANTE'], 'required'],
            [['USUARIO_ID', 'JOGO_SALA_ID', 'RESULTADO_CASA', 'RESULTADO_VISITANTE'], 'integer'],
            [['JOGO_SALA_ID'], 'exist', 'skipOnError' => true, 'targetClass' => JogosSala::className(), 'targetAttribute' => ['JOGO_SALA_ID' => 'ID']],
            [['USUARIO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::className(), 'targetAttribute' => ['USUARIO_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'USUARIO_ID' => 'Usuario  ID',
            'JOGO_SALA_ID' => 'Jogo  Sala  ID',
            'RESULTADO_CASA' => 'Resultado  Casa',
            'RESULTADO_VISITANTE' => 'Resultado  Visitante',
        ];
    }
    
    public function beforeSave($insert)
    {
        //$this->USUARIO_ID = Yii::$app->user->identity->ID;
       
        //$model->save();
        if (!$this->JOGO_SALA_ID)
        {
            $this->USUARIO_ID = Yii::$app->user->identity->ID;
            $this->JOGO_SALA_ID = Yii::$app->getRequest()->getQueryParam('JOGO_SALA_ID');
        }
        else
        {
            echo 'Refazer aposta'; //ajustar para cair aqui
        }

        //$model->save();

        //$jogos_sala = new JogosSala();
        //$this->JOGO_SALA_ID = $jogos_sala->ID;

        return true;
    }
    
}
