<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jogos_sala".
 *
 * @property integer $ID
 * @property integer $SALA_ID
 * @property integer $JOGO_ID
 */
class JogosSala extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jogos_sala';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SALA_ID', 'JOGO_ID'], 'required'],
            [['SALA_ID', 'JOGO_ID'], 'integer'],
            [['JOGO_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Jogos::className(), 'targetAttribute' => ['JOGO_ID' => 'ID']],
            [['SALA_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Salas::className(), 'targetAttribute' => ['SALA_ID' => 'ID']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'SALA_ID' => 'Sala  ID',
            'JOGO_ID' => 'Jogo  ID',
        ];
    }
}
