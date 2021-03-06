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
				$item = escape($item);
				if ($rule === 'required' && empty($value)) {
					$this->addError($items[$item]['name'] . " is required");
				} elseif (!empty($value)) {
					switch ($rule) {
						case 'min':
							if (strlen($value) < $rule_value) {
								$this->addError($items[$item]['name'] . " must be a minimum of {$rule_value} characters");
							}
							break;
						
						case 'max':
							if (strlen($value) > $rule_value) {
								$this->addError($items[$item]['name'] . " must be a maximum of {$rule_value} characters");
							}
							break;
						
						case 'matches':
							if ($value != $source[$rule_value]) {
								$this->addError($items[$item]['name'] . " must match " . $items[$rule_value]['name']);
							}
							break;
						
						case 'unique':
							# echo "<pre>", count(array($item, '=', $value)), "</pre>";
							$check = $this->_db->get($rule_value, array($item, '=', $value));
							if ($check->count()) {
								$this->addError($items[$item]['name'] . " already exists. Please try another " . $items[$item]['name'] . ".");
							}
							break;
						case 'alnum':
							if(!ctype_alnum($value) or is_numeric($value)){
								$this->addError($items[$item]['name'] . " needs to be English Standerd Keybord Characters of the set: {a-z, A-Z, 1-9} and not compleatly numeric.");
							}
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