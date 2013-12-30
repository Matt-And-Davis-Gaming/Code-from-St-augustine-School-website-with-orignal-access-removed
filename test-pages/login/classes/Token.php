<?php
class Token{
	public static function generate()
	{
		return Session::put(Config::get("session/CSRF_protect"), sha1(uniqid()));
	}
	public static function check($token)
	{
		$token_name = Config::get("session/CSRF_protect");

		if (Session::exists($token_name) && $token === Session::get($token_name)) {
			Session::delete($token_name);
			return true;
		}

		return false;

	}
}