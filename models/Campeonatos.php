<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "campeonatos".
 *
 * @property integer $ID
 * @property string $NOME
 * @property string $DIVISAO
 */
class Campeonatos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'campeonatos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOME', 'DIVISAO'], 'required'],
            [['NOME', 'DIVISAO'], 'string', 'max' => 50],
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
            'DIVISAO' => 'Divisão',
        ];
    }
}
