<?php
class Log{
	public function log($action = 'defaulted', $name = 'NIL'){
		DB::getInstance()->insert(Config::get('mysql/table/logs/log'), array(
			'type'			=> 'logout',
			'text'			=> "{$name} has {$action} at " . date('Y-m-d H:i:s'),
			'date'			=> date('Y-m-d H:i:s')
		));
	}
}