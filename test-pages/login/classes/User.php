<?php
class User{
	private $_db,
			$_data,
			$_sessionName,
			$_cookieName,
			$_isLoggedIn,
			$_log;

	public function __construct($user = null)
	{
		$this->_db = DB::getInstance();

		$this->_sessionName = Config::get("session/session_name");
		$this->_cookieName = Config::get("remember/cookie_name");
		# $this->_log = new Log();

		if (!$user) {
			if(Session::exists($this->_sessionName)){
				$user = Session::get($this->_sessionName);
				# user ID is now stored in $user

				if($this->find($user)){
					$this->_isLoggedIn = true;
				}else{
					# prosses logout
				}
			}
		}else {
			$this->find($user);
		}

	}

	public function update($fields = array(), $id=null)
	{

		if (!$id and $this->isLoggedIn()) {
			$id = $this->data()->id;
		}
		# die($id);

		if(!$this->_db->update(Config::get('mysql/table/users'), $id, $fields)){
			throw new Exception("There was an error. Please read our <a href=\"/help/policies#up\">F.A.Q. on Updating Problems</a><br>");
			DB::getInstance()->insert(Config::get('mysql/table/logs/log'), array(
						'type'			=> 'update error',
						'text'			=> "{$this->data()->name} has had an error in updating his/her name in at " . date('Y-m-d H:i:s'),
						'date'			=> date('Y-m-d H:i:s')
			));

			
		}	
	}

	public function create($fields = array())
	{
		if (!$this->_db->insert('users', $fields)) {
			throw new Exception("There was an error. Please read our <a href=\"/help/policies#regp\">F.A.Q. on Registration Problems</a><br>");
			
		}
	}

	public function find($user = null)
	{
		if($user){
			$field = (is_numeric($user)) ? 'id' : 'username' ;
			# echo "<pre>", print_r(array($field, '=', $user)), "</pre>";
			# die();
			$data = $this->_db->get(Config::get('mysql/table/users'), array($field, '=', $user));

			if ($data->count()) { 
				$this->_data = $data->first();

				return true;
			}else{
				//die("Deadly run time error");
			}
		}
	}

	public function login($username = null, $password = null, $remember = false)
	{
		
		if(!$username && !$password && $this->exists()){
			echo 'You already logged in, however your session has expired. Logging you in now.';

			Session::put($this->_sessionName, $this->data()->id);
			#$this->_log->log('logged in automaticly', $this->data()->name, 'login');
			DB::getInstance()->insert(Config::get('mysql/table/logs/log'), array(
						'type'			=> 'alogin',
						'text'			=> "{$this->data()->name} has automaticly logged in at " . date('Y-m-d H:i:s'),
						'date'			=> date('Y-m-d H:i:s')
			));

			Redirect::to('inden.php');

		}else{
			#die('login method has been called with all peramiters');
			$user = $this->find($username);
			if ($user) {
				if ($this->data()->password === Hash::make($password, $this->data()->salt)) {
					Session::put($this->_sessionName, $this->data()->id);
					
					if($remember){
						# die(Config::get('mysql/table/session'));
						$hash = Hash::unique();
						$hashCheck = $this->_db->get(Config::get('mysql/table/session'), array('user_id', '=', $this->data()->id));

						# insert data into the stuff
						if(!$hashCheck->count()){
							$this->_db->insert(Config::get('mysql/table/session'), array(
								'user_id'		=> $this->data()->id,
								'hash'			=> $hash
							));
							#$this->_log->log('logged in', $this->data()->name, 'login');
						}else{
							$hash = $hashCheck->first()->hash;
						}

						Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));

					}

					DB::getInstance()->insert(Config::get('mysql/table/logs/log'), array(
						'type'			=> 'login',
						'text'			=> "{$this->data()->name} has logged in at " . date('Y-m-d H:i:s'),
						'date'			=> date('Y-m-d H:i:s')
					));
					return true;
				}
			}
		}
		return false;
	}

	public function hasPermission($key)
	{
		$group = $this->_db->get(Config::get('mysql/table/groups'), array('id', '=', $this->data()->group));

		if ($group->count()) {
			$permissions = json_decode($group->first()->permissions, true);

			if(isset($permissions[$key])){
				if($permissions[$key] == true){
					return true;
				}
			}
		}
		return false;
	}

	public function exists()
	{
		 return (!empty($this->_data)) ? true : false ;
	}

	public function logout()
	{
		$this->_db->delete(Config::get('mysql/table/session'), array('user_id', '=', $this->data()->id));
		# $this->_log->log('logged out', $this->data()->name, 'logout');
		DB::getInstance()->insert(Config::get('mysql/table/logs/log'), array(
				'type'			=> 'logout',
				'text'			=> "{$this->data()->name} has logged out at " . date('Y-m-d H:i:s'),
				'date'			=> date('Y-m-d H:i:s')
			));

		Session::delete($this->_sessionName);
		Cookie::delete($this->_cookieName);
	}

	public function data(){
		return $this->_data;
	}
	public function isLoggedIn()
	{
		return $this->_isLoggedIn;
	}
}