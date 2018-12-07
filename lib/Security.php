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

}
?>