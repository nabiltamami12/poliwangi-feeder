<?php

namespace App\Helpers;

use Exception;

class CoreHelper {

	public static function base64url_encode($data) {
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

	public static function base64url_decode($data) {
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}

	public static function hitung_semester($semester = 20212, $angkatan = 2016)
	{
		$semester = intval($semester);
		$angkatan = intval($angkatan);
		if ($semester %2 != 0){
			$a = (($semester + 10)-1)/10;
			$b = $a - $angkatan;
			$c = ($b*2)-1;
		}else{
			$a = (($semester + 10)-2)/10;
			$b = $a - $angkatan;
			$c = $b * 2;
		}
		return $c;
	}

}