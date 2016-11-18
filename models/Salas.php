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
 * @property integer $ACERTO_DEFERENCA
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
            [['NOME', 'VALOR_ENTRADA'], 'required'],
            [['VALOR_ENTRADA'], 'number'],
            [['OBSERVACAO'], 'string'],
            [['ACERTO_RESULTADO', 'ACERTO_TIME_CASA', 'ACERTO_TIME_VISITANTE', 'ACERTO_DEFERENCA'], 'integer'],
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
            'VALOR_ENTRADA' => 'Valor  Entrada',
            'OBSERVACAO' => 'Observacao',
            'ACERTO_RESULTADO' => 'Acerto  Resultado',
            'ACERTO_TIME_CASA' => 'Acerto  Time  Casa',
            'ACERTO_TIME_VISITANTE' => 'Acerto  Time  Visitante',
            'ACERTO_DEFERENCA' => 'Acerto  Deferenca',
        ];
    }
}
