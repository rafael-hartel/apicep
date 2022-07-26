<?php

namespace frontend\models;

use Yii;
use common\models\CustomModel;
use yii\helpers\Json;
use common\models\helpers\StringHelper;
use frontend\models\services\viacep\ViacepRequest;

/**
 * This is the model class for table "endereco".
 *
 * @property string $cep
 * @property string $logradouro
 * @property string $localidade
 * @property string $uf
 * @property string $bairro
 * @property string $complemento
 * @property string $siafi
 * @property string $ibge
 * @property string $ddd
 * @property string $gia
 */
class Endereco extends CustomModel
{
    /**
     * {@inheritdoc}
     */
    public $cep,
        $logradouro,
        $localidade,
        $uf,
        $bairro,
        $complemento,
        $siafi,
        $ibge,
        $ddd,
        $gia;

    public function scenarios()
    {
        return [
            'chamada_api' => ['cepText'],
        ];
    }

    public static function tableName()
    {
        return 'endereco';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['cepText'], 'required', 'on'=>'chamada_api'],
            [['cepText'], 'string', 'length'=> 9, 'notEqual'=>Yii::t('app', 'CepNotEqual')],
            [['cep'], 'string', 'length' => 8],
            [['logradouro', 'localidade', 'bairro', 'complemento'], 'string', 'max' => 255],
            [['uf','ddd'], 'string', 'max' => 2],
            [['gia','siafi', 'ibge'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'cep' => Yii::t('app', 'cep'),
            'logradouro' => Yii::t('app', 'logradouro'),
            'numero' => Yii::t('app', 'numero'),
            'localidade' => Yii::t('app', 'localidade'),
            'uf' => Yii::t('app', 'uf'),
            'bairro' => Yii::t('app', 'bairro'),
            'complemento' => Yii::t('app', 'complemento'),
            'siafi' => Yii::t('app', 'siafi'),
            'ibge' => Yii::t('app', 'ibge'),
            'gia' => Yii::t('app', 'gia'),
            'ddd' => Yii::t('app', 'ddd'),
        ];
    }

    /*
        Aqui eu gero essas funções para separar os valores com e sem máscara do CEP,
        fazendo com que o valor que fica no model é sempre o sem a máscara.
    */
    public function getCepText()
    {
        return StringHelper::maskCep($this->cep);
    }

    public function setCepText($value)
    {
        $this->cep = StringHelper::retiraNaoNumerico($value);
    }

    public function chamarApi()
    {
        try {
            $resultEndereco = ViacepRequest::getEndereco($this->cep);
            if (isset($resultEndereco['erro'])) {
                throw new \Exception(Yii::t('app', 'CepNaoEncontrado'), 1);
            }

            foreach ($resultEndereco as $campo => $valor) {
                if (property_exists($this, $campo)) {
                    // O valor retornado da API vem com máscara, conflitando com o esquema de máscaras desenvolvido
                    if ($campo == 'cep') {
                        $this->cepText = $valor; 
                    } else {
                        $this->$campo = $valor;
                    }
                }
            }

        } catch (\Exception $e) {
            $this->addError('cepText', $e->getMessage());
        }
    }
}
