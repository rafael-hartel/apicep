<?php

namespace common\models;

use Yii;
use yii\base\Model;

class CustomModel extends Model
{
	/*
	Este custom model é feito para facilitar os inputs com máscaras, como o CEP.
	No model eu faço um getCepText / setCepText para separar os valores com ou sem máscara,
	facilitando caso precise guardar os dados no banco por exemplo.

	Aqui é só uma forma para facilitar o quando escrevemos as labels na tela, 
	o Yii ao invés de buscar a label da variável "cepText" ele busca a do "cep".
	*/
	public function getAttributeLabel($attribute)
	{
		if(($atributo_pai = $this->atributoTexto($attribute)) !== false){
			return parent::getAttributeLabel($atributo_pai);
		}
		return parent::getAttributeLabel($attribute);
	}

	private function atributoTexto($attribute){
		$pos = strpos($attribute, 'Text');

		if($pos !== false && $pos == (strlen($attribute) - 4)){
			return substr($attribute, 0, -4);
		}

		return false;
	}
}