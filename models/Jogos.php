<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jogos".
 *
 * @property integer $ID
 * @property integer $RODADA
 * @property string $DATA_HORA
 * @property integer $GOLS_CASA
 * @property integer $GOLS_VISITANTE
 * @property integer $TIME_CASA_ID
 * @property integer $TIME_VISITANTE_ID
 */
class Jogos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jogos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RODADA', 'DATA_HORA', 'TIME_CASA_ID', 'TIME_VISITANTE_ID'], 'required'],
            [['RODADA', 'GOLS_CASA', 'GOLS_VISITANTE', 'TIME_CASA_ID', 'TIME_VISITANTE_ID'], 'integer'],
            [['DATA_HORA'], 'safe'],
            [['TIME_CASA_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Times::className(), 'targetAttribute' => ['TIME_CASA_ID' => 'ID']],
            [['TIME_VISITANTE_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Times::className(), 'targetAttribute' => ['TIME_VISITANTE_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'RODADA' => 'Rodada',
            'DATA_HORA' => 'Data e Hora de Início',
            'GOLS_CASA' => 'Resultado do Time da Casa',
            'GOLS_VISITANTE' => 'Resultado do Time Visitante',
            'TIME_CASA_ID' => 'Time da Casa',
            'TIME_VISITANTE_ID' => 'Time Visitante',
        ];
    }
}
