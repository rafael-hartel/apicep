<?php 

namespace frontend\models\services\viacep;

use Yii;
use yii\httpclient\Client;
use yii\helpers\Json;

class ViacepRequest
{
	const URL = "https://viacep.com.br/ws/";

	private static function chamada($request){
		$response = $request->send();
		switch ($response->getStatusCode()) {
			case 200:
			case 400:
			case 404:
			case 422:
				return Json::decode($response->content, true);
				break;

			default:
				throw new \Exception($response->content, $response->getStatusCode());
				break;
		}
	}

	private static function getRequest($dados){

		$client = new Client(['baseUrl' => self::URL. $dados. '/json/']);
		$headers = [
			'content-type' => 'application/json'
		];

		$request = $client->createRequest()->addHeaders(['content-type' => 'application/json']);

		return $request;
	}

	public static function getEndereco($cep)
	{
		$request = self::getRequest($cep);
	    return self::chamada($request);
	}
}