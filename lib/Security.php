<?php
class Security
{

	private static $seed = 'IheoYufrb7H2eXsPMMMF';

	static public function getSeed()
	{
   		return self::$seed;
	}

	public static function chiffrer($cfr)
	{
	  $pw=$cfr.self::$seed;
	  $cfr = hash('sha256', $pw);
	  return $cfr;
	}

	public static function generateRandomHex() {
	  // Generate a 32 digits hexadecimal number
	  $numbytes = 16; // Because 32 digits hexadecimal = 16 bytes
	  $bytes = openssl_random_pseudo_bytes($numbytes);
	  $hex   = bin2hex($bytes);
	  return $hex;
}

}
?>
