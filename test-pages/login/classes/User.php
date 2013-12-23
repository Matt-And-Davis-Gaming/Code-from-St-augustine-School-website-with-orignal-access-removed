<?php
class User{
	private $_db;

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
		}
	}

	public function login($username = null, $password = null)
	{
		$user = $this->find($username);

		return false;
	}
}