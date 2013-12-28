<?php
class DB{

	# set varibles
	private static $_instance = null;

	private $_pdo,
		$_query,
		$_error = false,
		$_results,
		$_count = 0;

	# connect to db when class is enstanciated (spelling) and stored in $this->_pdo
	private function __construct()
	{
		#try loop to start the pdo that catches PDOEXexption
		try
		{
			$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'),
						Config::get('mysql/username'),
						Config::get('mysql/password')
					);
		//echo 'connected';
		}
		# catch the PDO exception 
		catch(PDOException $e)
		{
			die($e->getMessage());
		}
	}

	# init instance for the database and store the __construct here
	public static function getInstance()
	{
		if(!isset(self::$_instance))
		{
			self::$_instance = new DB();
		}

		return self::$_instance;
	}

	# standerd query
	public function query($sql, $params = array())
	{
		#reset error variable
		$this->_error = false;

		#prepare sql for pdo
		if($this->_query = $this->_pdo->prepare($sql))
		{
			//echo 1;

			# build sql additions
			if(count($params))
			{
				$x = 1;
				foreach($params as $param)
				{
					//echo $x;
					$this->_query->bindValue($x, $param);
					$x++;

				}

			}

			# execute query and test for it
			if($this->_query->execute())
			{
				$this->_results	= $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count	= $this->_query->rowCount();
					//echo 'query success. Count: ' . $this->_count;
			}else{
				$this->_error = true;
				//echo 'query fail code 1. Not proper SQL';
			}

		}
		//echo '2';
		return $this;

		//http://www.youtube.com/watch?feature=player_detailpage&v=PaBWDOBFxDc#t=571

	}
	
	# call the query and return a nice result set
	public function action($action, $table, $where = array())
	{
		
		if(count($where) == 3)
		{
		
			$operators = array('=', '>', '<', '>=', '<=');
			
			$field		= $where[0];
			$operator	= $where[1];
			$value		= $where[2];
			
			if(in_array($operator, $operators))
			{
				
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				if(!$this->query($sql, array($value))->error())
				{
					# echo "worked";
					return $this;
				}
				
			}
			
		}
		# echo "QUery failed";
		return $this;
		
	}
	
	# get from db
	public function get($table, $where)
	{
		return $this->action('SELECT *', $table, $where);
	}
	
	# delete from db
	public function delete($table, $where)
	{
		return $this->action('DELETE', $table, $where);
	}

	# get results from last query
	public function results()
	{
		return $this->_results;
	}

	# insert into db
	public function insert($table, $fields = array())
	{

		$keys 	= array_keys($fields);
		$values = '';
		$x = 1;
		foreach ($fields as $field) 
		{
			$values .= "?";
			if ($x<count($fields)) 
			{
				$values .= ', ';
			}
			$x++;
		}
		$sql = "INSERT INTO users (`" . implode('`,`', $keys) . "`) VALUES ({$values})";
		die($sql);
		if (!$this->query($sql, $fields)->error())
		{
			return true;# code...
		}

		return false;
	}

	public function update($table, $id, $fields)
	{
		$set = '';
		$x=1;

		foreach ($fields as $name => $value) {
			$set .= "{$name} = ?";

			if ($x < count($fields)) 
			{
				$set .= ', ';
			}

			$x++;
		}

		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id}";

		if (!$this->query($sql, $fields)->error())
		{
			return true;# code...
		}

		return false;
	}

	# get first record in db
	public function first()
	{
		return $this->_results[0];
	}

	# get errors
	public function error()
	{
		return $this->_error;
	}

	# count entries
	public function count()
	{
		return $this->_count;
	}
}
