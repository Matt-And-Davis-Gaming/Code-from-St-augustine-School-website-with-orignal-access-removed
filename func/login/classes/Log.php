<?php
class Log{
	public function log($action = null, $name = null, $type = null){
		if(isset($action, $name, $type)):
			DB::getInstance()->insert(Config::get('mysql/table/logs/log'), array(
				'type'			=> $type,
				'text'			=> "{$name} has {$action} at " . date('Y-m-d H:i:s'),
				'date'			=> date('Y-m-d H:i:s')
			));
		else:
			echo "<pre>", print_r(get_defined_vars()), "</pre>";
			die("not all log vars are set");
		endif;
	}
}