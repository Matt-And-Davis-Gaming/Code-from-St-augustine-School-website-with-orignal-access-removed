<?php
class User{
	private $_db,
			$_data;

	public function __construct($user = null)
	{
		$this->_db = DB::getInstance();
	}

	public function create($fields = array())
	{
		if (!$this->_db->insert('users', $fields)) {
			throw new Exception("There was an error. Please read our <a href=\"/help/policies#Registration%20Problems\">F.A.Q. on Registration Problems</a>");
			
		}
	}

	public function find($user = null)
	{
		if($user){
			$field = (is_numeric($user)) ? 'id' : 'username' ;
			$data = $this->_db->get(Config::get('utable'), array($field, '=', $user));

			if ($data->count()) {
				$this->_data = $data->first();

				return true;
			}else{
				die("Deadly run time error");
			}
		}
	}

	public function login($username = null, $password = null)
	{
		$user = $this->find($username);
		echo "<pre>", print_r($this->_data), "</pre>";
		return false;
	}
}