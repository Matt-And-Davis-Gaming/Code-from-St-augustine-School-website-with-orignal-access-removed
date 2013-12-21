<?php
class Validate{
	private $_passed 	= false,
			$_errors 	= array(),
			$_db		= null;

	public function __construct()
	{
		$this->_db = DB::getInstance();
	}

	public function check($source, $items = array())
	{
		# echo "<pre>";
		# print_r($items);
		# die("</pre>");
		foreach ($items as $item => $rules) {
			foreach ($rules as $rule => $rule_value) {
				# echo "{$item} {$rule} must be {$rule_value}!<br>";

				$value = trim($source[$item]);
				if ($rule === 'required' && empty($value)) {
					$this->addError($items[$item]['name'] . " is required");
				}
				if (!empty($value)) {
					switch ($rule) {
						case 'min':
							if (strlen($value) < $rule_value) {
								$this->addError($items[$item]['name'] . " must be a minimum of {$rule_value} characters");
							}
							break;
						
						case 'max':
							# code...
							break;
						
						case 'matches':
							# code...
							break;
						
						case 'unique':
							# code...
							break;
						
						default:
							# code...
							break;
					}
				}
			}
		}

		if (empty($this->_errors)) {
			$this->_passed = true;
		}
		return $this;
	}

	private function addError($error)
	{
		$this->_errors[] = $error;
	}

	public function errors()
	{
		return $this->_errors;
	}

	public function passed()
	{
		return $this->_passed;
	}
}