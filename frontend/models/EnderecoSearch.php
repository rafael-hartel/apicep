<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Endereco;

/**
 * EnderecoSearch represents the model behind the search form of `app\models\Endereco`.
 */
class EnderecoSearch extends Endereco
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cep', 'logradouro', 'cidade', 'uf', 'bairro', 'complemento', 'siafi', 'ibge'], 'safe'],
            [['id_endereco'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Endereco::find();

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
            'id_endereco' => $this->id_endereco,
        ]);

        $query->andFilterWhere(['ilike', 'cep', $this->cep])
            ->andFilterWhere(['ilike', 'logradouro', $this->logradouro])
            ->andFilterWhere(['ilike', 'cidade', $this->cidade])
            ->andFilterWhere(['ilike', 'uf', $this->uf])
            ->andFilterWhere(['ilike', 'bairro', $this->bairro])
            ->andFilterWhere(['ilike', 'complemento', $this->complemento])
            ->andFilterWhere(['ilike', 'siafi', $this->siafi])
            ->andFilterWhere(['ilike', 'ibge', $this->ibge]);

        return $dataProvider;
    }
}
