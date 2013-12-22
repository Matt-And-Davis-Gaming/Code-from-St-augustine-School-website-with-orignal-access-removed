<?php
class Users{
	private $_db;

	public function __construct($user = null)
	{
		$this->_db = DB::getInstance();
	}

	public function create($fields = array())
	{
		if (!$this->_db->insert('users', $fields)) {
			throw new Exception("There was an error. Please read our <a href=\"/help/policies#Registration%20Problems\">F.A.Q. on Registration Problems.c</a>);
			
		}
	}
}