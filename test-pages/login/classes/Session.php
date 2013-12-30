<?php
class Session{

	public static function exists($name)
	{
		return (isset($_SESSION[$name])) ? true : false;
	}
	public static function put($name, $value)
	{
		return $_SESSION[$name] = $value;
	}

	public static function get($name)
	{
		return $_SESSION[$name];
	}
	public static function delete($name)
	{
		if (self::exists($name)) {
			unset($_SESSION[$name]);
		}
	}

	public static function flash($name, $contents = '')
	{
		if (self::exists($name)) {
			#echo '{$name} exists';
			$session = self::get($name);
			self::delete($name);
			return $session;
		}else{
			#echo "{$name} does not exist";
			self::put($name, $contents);
		}
		return '';
	}

}