<?php
class User{
	private $_db,
			$_data,
			$_sessionName;

	public function __construct($user = null)
	{
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get("session/session_name");
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
			# echo "<pre>", print_r(array($field, '=', $user)), "</pre>";
			# die();
			$data = $this->_db->get(Config::get('mysql/utable'), array($field, '=', $user));

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
		if ($user) {
			if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
				Session::put($this->_sessionName, $this->data()->id);
				return true;
			}
		}
		return false;
	}

	private function data(){
		return $this->_data;
	}
}