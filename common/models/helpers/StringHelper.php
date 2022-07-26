<?php
namespace common\models\helpers;
use Yii;

/**
* Helper de classes
*/
class StringHelper
{
	const MASK_CEL = '(##) ?####-####';
	const MASK_TEL = '(##) ####-####';
	const MASK_CEP = '#####-###';

	public static function retiraPontos($string)
	{
		$pontos = array(".", ",", "-", "/", "(", ")", " ");
		$string = str_replace($pontos, "", $string);
		return $string;
	}

	public static function retiraNaoNumerico($string)
	{
		return preg_replace("/[^0-9]/", "", $string);
	}

 //mask("12345678911","###.###.###-##");
// 123.456.789-11
	private static function mask($val, $mask)
	{
		if(is_null($val) || $val == ''){
			return null;
		}
		$maskared = '';
		$k = 0;
		for($i = 0; $i<=strlen($mask)-1; $i++) {
			if($mask[$i] == '#') {
				if(isset($val[$k]))
					$maskared .= $val[$k++];
			} 
			elseif($mask[$i] == '?'){
				if((substr_count($mask, '#') + substr_count($mask, '?')) == strlen($val)){
					$maskared .= $val[$k++];					
				}
			}
			else {
				if(isset($mask[$i]))
					$maskared .= $mask[$i];
			}
		}
		return $maskared;
	}
	
	public static function maskCep($value)
	{
		return self::mask($value, self::MASK_CEP);
	}

}