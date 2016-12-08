<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Salas;

/**
 * SalasSearch represents the model behind the search form of `app\models\Salas`.
 */
class SalasSearch extends Salas
{
    public $jogo;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'ACERTO_RESULTADO', 'ACERTO_TIME_CASA', 'ACERTO_TIME_VISITANTE', 'ACERTO_DIFERENCA', 'ADMINISTRADOR'], 'integer'],
            [['NOME', 'OBSERVACAO', 'jogo'], 'safe'],
            [['VALOR_ENTRADA'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Salas::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'ID' => $this->ID,
            'VALOR_ENTRADA' => $this->VALOR_ENTRADA,
            'ACERTO_RESULTADO' => $this->ACERTO_RESULTADO,
            'ACERTO_TIME_CASA' => $this->ACERTO_TIME_CASA,
            'ACERTO_TIME_VISITANTE' => $this->ACERTO_TIME_VISITANTE,
            'ACERTO_DIFERENCA' => $this->ACERTO_DIFERENCA,
            'ADMINISTRADOR' => $this->ADMINISTRADOR,
        ]);

        $query->andFilterWhere(['like', 'NOME', $this->NOME])
            ->andFilterWhere(['like', 'OBSERVACAO', $this->OBSERVACAO]);

        return $dataProvider;
    }
}
