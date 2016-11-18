<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuariosSearch represents the model behind the search form of `app\models\Usuarios`.
 */
class UsuariosSearch extends Usuarios
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'ACEITA_TERMOS_USO'], 'integer'],
            [['NOME', 'APELIDO', 'DATA_NASCIMENTO', 'LOGIN', 'SENHA', 'FACEBOOK', 'CELULAR', 'OBSERVACAO'], 'safe'],
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
        $query = Usuarios::find();

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
            'ACEITA_TERMOS_USO' => $this->ACEITA_TERMOS_USO,
            'DATA_NASCIMENTO' => $this->DATA_NASCIMENTO,
        ]);

        $query->andFilterWhere(['like', 'NOME', $this->NOME])
            ->andFilterWhere(['like', 'APELIDO', $this->APELIDO])
            ->andFilterWhere(['like', 'LOGIN', $this->LOGIN])
            ->andFilterWhere(['like', 'SENHA', $this->SENHA])
            ->andFilterWhere(['like', 'FACEBOOK', $this->FACEBOOK])
            ->andFilterWhere(['like', 'CELULAR', $this->CELULAR])
            ->andFilterWhere(['like', 'OBSERVACAO', $this->OBSERVACAO]);

        return $dataProvider;
    }
}
