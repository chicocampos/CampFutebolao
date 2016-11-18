<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "times".
 *
 * @property integer $ID
 * @property string $NOME
 * @property string $APELIDO
 * @property integer $CAMPEONATOS_ID
 */
class Times extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'times';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOME', 'CAMPEONATOS_ID'], 'required'],
            [['CAMPEONATOS_ID'], 'integer'],
            [['NOME', 'APELIDO'], 'string', 'max' => 50],
            [['CAMPEONATOS_ID'], 'exist', 'skipOnError' => true, 'targetClass' => Campeonatos::className(), 'targetAttribute' => ['CAMPEONATOS_ID' => 'ID']],
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
            'CAMPEONATOS_ID' => 'Campeonato',
        ];
    }
}
