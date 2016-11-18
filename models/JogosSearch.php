<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Jogos;

/**
 * JogosSearch represents the model behind the search form of `app\models\Jogos`.
 */
class JogosSearch extends Jogos
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'RODADA', 'GOLS_CASA', 'GOLS_VISITANTE', 'TIME_CASA_ID', 'TIME_VISITANTE_ID'], 'integer'],
            [['DATA_HORA'], 'safe'],
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
        $query = Jogos::find();

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
            'RODADA' => $this->RODADA,
            'DATA_HORA' => $this->DATA_HORA,
            'GOLS_CASA' => $this->GOLS_CASA,
            'GOLS_VISITANTE' => $this->GOLS_VISITANTE,
            'TIME_CASA_ID' => $this->TIME_CASA_ID,
            'TIME_VISITANTE_ID' => $this->TIME_VISITANTE_ID,
        ]);

        return $dataProvider;
    }
}
