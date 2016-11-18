<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "participantes".
 *
 * @property integer $ID
 * @property integer $USUARIO_ID
 * @property integer $SALA_ID
 * @property integer $PONTUACAO
 */
class Participantes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'participantes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USUARIO_ID', 'SALA_ID', 'PONTUACAO'], 'required'],
            [['USUARIO_ID', 'SALA_ID', 'PONTUACAO'], 'integer'],
            [['SALA_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Salas::className(), 'targetAttribute' => ['SALA_ID' => 'ID']],
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
            'USUARIO_ID' => 'Usuario',
            'SALA_ID' => 'Sala',
            'PONTUACAO' => 'Pontuação',
        ];
    }
}
