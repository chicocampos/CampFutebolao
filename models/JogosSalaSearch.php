<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JogosSala;

/**
 * JogosSalaSearch represents the model behind the search form of `app\models\JogosSala`.
 */
class JogosSalaSearch extends JogosSala
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'SALA_ID', 'JOGO_ID'], 'integer'],
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
        $query = JogosSala::find();

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
            'SALA_ID' => $this->SALA_ID,
            'JOGO_ID' => $this->JOGO_ID,
        ]);

        return $dataProvider;
    }
}
