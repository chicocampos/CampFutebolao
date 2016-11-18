<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Times;

/**
 * TimesSearch represents the model behind the search form of `app\models\Times`.
 */
class TimesSearch extends Times
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'CAMPEONATOS_ID'], 'integer'],
            [['NOME', 'APELIDO'], 'safe'],
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
        $query = Times::find();

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
            'CAMPEONATOS_ID' => $this->CAMPEONATOS_ID,
        ]);

        $query->andFilterWhere(['like', 'NOME', $this->NOME])
            ->andFilterWhere(['like', 'APELIDO', $this->APELIDO]);

        return $dataProvider;
    }
}
