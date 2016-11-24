<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "salas".
 *
 * @property integer $ID
 * @property string $NOME
 * @property string $VALOR_ENTRADA
 * @property string $OBSERVACAO
 * @property integer $ACERTO_RESULTADO
 * @property integer $ACERTO_TIME_CASA
 * @property integer $ACERTO_TIME_VISITANTE
 * @property integer $ACERTO_DIFERENCA
 * @property string $ADMINISTRADOR
 */
class Salas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'salas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOME', 'VALOR_ENTRADA', 'ADMINISTRADOR'], 'required'],
            [['VALOR_ENTRADA'], 'number'],
            [['OBSERVACAO'], 'string'],
            [['ACERTO_RESULTADO', 'ACERTO_TIME_CASA', 'ACERTO_TIME_VISITANTE', 'ACERTO_DIFERENCA', 'ADMINISTRADOR'], 'integer'],
            [['NOME'], 'string', 'max' => 50],
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
            'VALOR_ENTRADA' => 'Valor de Entrada',
            'OBSERVACAO' => 'Observações',
            'ACERTO_RESULTADO' => 'Placar Exato',
            'ACERTO_TIME_CASA' => 'Placar da Casa',
            'ACERTO_TIME_VISITANTE' => 'Placar do Visitante',
            'ACERTO_DIFERENCA' => 'Diferença de Gols',
            'ADMINISTRADOR' => 'Administrador',
        ];
    }
    
    public function beforeSave($insert)
    {
        $this->ADMINISTRADOR = Yii::$app->user->identity->ID;
        
        $participantes = Participantes::find()->where(["USUARIO_ID"=>Yii::$app->user->identity->ID])
        ->andWhere(['SALA_ID'=>$this->ID])->one();
        if(!$participantes)
        {
            $participantes = new Participantes();
            $participantes->USUARIO_ID = Yii::$app->user->identity->ID;
            $participantes->SALA_ID = $this->ID;
            $participantes->PONTUACAO = 0;
            $participantes->save();
        }
        
        return true;
    }
}
