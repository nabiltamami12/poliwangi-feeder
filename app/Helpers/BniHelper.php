<?php

namespace App\Helpers;

use Exception;

/**
 * Library Access BNI API_V3.0.3
 */
class BniHelper {

	function __construct()
	{
		$production = env('APP_ENV') === 'production';
		$this->url = $production ? env('BNI_URL') : 'https://apibeta.bni-ecollection.com/';
		$this->secret_key = $production ? env('BNI_SECRET_KEY') : 'ea0c88921fb033387e66ef7d1e82ab83';
		$this->client_id = $production ? env('BNI_CLIENT_ID') : '001';
		$this->TIME_DIFF_LIMIT = 480;
	}

	public function encrypt(array $json_data) {
		return $this->doubleEncrypt(strrev(time()) . '.' . json_encode($json_data));
	}

	public function decrypt($hased_string) {
		$parsed_string = $this->doubleDecrypt($hased_string);
		list($timestamp, $data) = array_pad(explode('.', $parsed_string, 2), 2, null);
		if ($this->tsDiff(strrev($timestamp)) === true) {
			return json_decode($data, true);
		}
		return null;
	}

	private function tsDiff($ts) {
		return abs($ts - time()) <= $this->TIME_DIFF_LIMIT;
	}

	private function doubleEncrypt($string) {
		$result = '';
		$result = $this->enc($string, $this->client_id);
		$result = $this->enc($result, $this->secret_key);
		return strtr(rtrim(base64_encode($result), '='), '+/', '-_');
	}

	private function enc($string, $key) {
		$result = '';
		$strls = strlen($string);
		$strlk = strlen($key);
		for($i = 0; $i < $strls; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % $strlk) - 1, 1);
			$char = chr((ord($char) + ord($keychar)) % 128);
			$result .= $char;
		}
		return $result;
	}

	private function doubleDecrypt($string) {
		$result = base64_decode(strtr(str_pad($string, ceil(strlen($string) / 4) * 4, '=', STR_PAD_RIGHT), '-_', '+/'));
		$result = $this->dec($result, $this->client_id);
		$result = $this->dec($result, $this->secret_key);
		return $result;
	}

	private function dec($string, $key) {
		$result = '';
		$strls = strlen($string);
		$strlk = strlen($key);
		for($i = 0; $i < $strls; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % $strlk) - 1, 1);
			$char = chr(((ord($char) - ord($keychar)) + 256) % 128);
			$result .= $char;
		}
		return $result;
	}

	function getContent($raw) {
		$raw['client_id'] = $this->client_id;
		$hashed_string = $this->encrypt($raw);

        $post = json_encode(array(
            'client_id' => $this->client_id,
            'data' => $hashed_string,
        ));
		$header[] = 'Content-Type: application/json';
		$header[] = "Accept-Encoding: gzip, deflate";
		$header[] = "Cache-Control: max-age=0";
		$header[] = "Connection: keep-alive";
		$header[] = "Accept-Language: en-US,en;q=0.8,id;q=0.6";

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $this->url);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_VERBOSE, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_ENCODING, true);
		curl_setopt($ch, CURLOPT_AUTOREFERER, true);
		curl_setopt($ch, CURLOPT_MAXREDIRS, 5);

		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/37.0.2062.120 Safari/537.36");

		if ($post)
		{
			curl_setopt($ch, CURLOPT_POST, true);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
		}

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$rs = curl_exec($ch);

		if(empty($rs)){
			var_dump($rs, curl_error($ch));
			curl_close($ch);
			return false;
		}
		curl_close($ch);
		return $rs;
	}

	
	public static function create()
	{
		return self::$url;
	}

}