<?php

namespace App\Helpers;

use App\Providers\BniEnc;
use Exception;

/**
 * Library Access BNI API_V3.0.3
 */
class BniHelper {
	function __construct($action = null, $data = null)
	{
		if (!$action) throw new Exception('Error: Aksi tidak boleh kosong. contoh: "new BNI($action, $data=null)"');
		$production = env('APP_ENV') === 'production';
		self::$url = $production ? env('BNI_URL') : 'https://apibeta.bni-ecollection.com/';
		$this->data = $data;

		switch ($action) {
			case 'create':
				return $this->create('coba');
				break;
			
			default:
				throw new Exception('Error: Aksi "'.$action.'" tidak ditemukan dalam class BNI.');
				break;
		}
	}
	
	public static function create()
	{
		return self::$url;
	}

}