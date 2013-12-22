<?php
class Token{
	public static function generate()
	{
		return Session::put(Config::get("session/CSRF_protect"), uniqid());
	}
}