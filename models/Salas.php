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
            [['NOME', 'VALOR_ENTRADA', 'ACERTO_RESULTADO', 'ACERTO_TIME_CASA', 'ACERTO_TIME_VISITANTE', 'ACERTO_DIFERENCA'], 'required'],
            [['VALOR_ENTRADA'], 'number', 'min' => 0, 'max' => 1000],
            [['OBSERVACAO'], 'string', 'max' => 65500],
            [['ACERTO_RESULTADO', 'ACERTO_TIME_CASA', 'ACERTO_TIME_VISITANTE', 'ACERTO_DIFERENCA', 'ADMINISTRADOR'], 'integer'],
            [['ACERTO_RESULTADO', 'ACERTO_TIME_CASA', 'ACERTO_TIME_VISITANTE', 'ACERTO_DIFERENCA'], 'integer', 'min' => 0, 'max' => 50],
            [['NOME'], 'string', 'max' => 50],
            [['TESTE'],'safe']
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
            'JOGOS' => 'Jogos',
        ];
    }
    
    public function beforeSave($insert)
    {
        $this->ADMINISTRADOR = Yii::$app->user->identity->ID;
        return true;
    }
    
    public function getJogos()
    {
        return $this->hasMany(Jogos::className(), ['ID' => 'JOGO_ID'])
            ->viaTable('jogossala', ['SALA_ID' => 'ID']);
    }
    
    public function getJogo()
    {
        return $this->hasOne(Jogos::className(), ['ID' => 'JOGO_ID'])
            ->viaTable('jogossala', ['SALA_ID' => 'ID']);
    }
    
    public function getParticipantes(){
        return $this->hasMany(Participantes::className(), ['SALA_ID' => 'ID']);
    }
}
