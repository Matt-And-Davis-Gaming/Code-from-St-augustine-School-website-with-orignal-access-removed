<?php
class DB{

	//set varibles
	private static $_instance = null;

	private $_pdo,
		$_query,
		$_error = false,
		$_results,
		$_count = 0;

	//connect to db
	private function __construct(){
		try{
			$this->_pdo = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/db'),
						Config::get('mysql/username'),
						Config::get('mysql/password')
					);
		//echo 'connected';
		} catch(PDOException $e) {
			die($e->getMessage());
		}
	}

	//init instance for the database and store the __construct here
	public static function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance = new DB();
		}

		return self::$_instance;
	}

	//standerd query
	public function query($sql, $params = array()){

		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)){
			//echo 1;
			if(count($params)){
				$x = 1;
				foreach($params as $param){
					//echo $x;
					$this->_query->bindValue($x, $param);
					$x++;

				}

			}

			if($this->_query->execute()){
				$this->_results	= $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count	= $this->_query->rowCount();
				if ($this->_count < 1){
					echo 'query fail code 2. User or content not found';
					$this->_error = true;
				}else{
					echo 'query success. Count: ' . $this->_count;
				}
			}else{
				$this->_error = true;
				echo 'query fail code 1. Not proper SQL';
			}

		}
		//echo '2';
		return $this;

		//http://www.youtube.com/watch?feature=player_detailpage&v=PaBWDOBFxDc#t=571

	}

	public function error(){
		return $this->_error;
	}

}
