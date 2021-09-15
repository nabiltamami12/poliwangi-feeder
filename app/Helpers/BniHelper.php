<?php
namespace App\Helpers;

/**
 * Library Access BNI API_V3.0.3
 */
class BniHelper {

	function __construct($action = null, $data = null)
	{
		if (!$action) die('aksi tidak ditemukan');
		$production = env('APP_ENV') === 'production';
		$this->url = $production ? env('BNI_URL') : 'https://apibeta.bni-ecollection.com/';
		$this->data = $data;
	}
	
	public function test()
	{
		return $this->url;
	}

}