<?php

namespace App\Helpers;

use Exception;

/**
 * Library Access BNI API_V3.0.3
 */
class CoreHelper {

	public static function base64url_encode($data) {
		return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
	}

	public static function base64url_decode($data) {
		return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
	}

}