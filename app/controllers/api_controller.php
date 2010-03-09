<?php

class ApiController extends AppController
{
	var $name = "Api";
	var $uses = array('Float', 'Bool', 'Configuration', 'ApiRequest');
	var $layout = "ajax";
	
	/**
	 * Allowed keys to access the API
	 * 1 API = 1 Silo
	 * 
	 * ToDo: this will be moved to a database
	 *
	 * @var array
	 */
	var $api_keys = array('1' => 'examplesilokey');
	
	/**
	 * Adds a single 'float' registry via POST
	 * 
	 * ToDo: should add several registries at once
	 * ToDo: die() is fugly, throw exceptions!
	 * 
	 * @param string $_POST['tagname']
	 * @param string $_POST['value']
	 * @param string $_POST['time']
	 * @param string $_POST['api_key']
	 */
	function float_add() {
		if (isset($_POST['tagname']) && isset($_POST['value']) 
			&& isset($_POST['time']) && isset($_POST['api_key'])
		) {
			if (!in_array($_POST['api_key'], $this->api_keys)) {
				die('error: incorrect api key');
			}
			
			$this->ApiRequest->save(array("method" => "float_add", "silo_id" => array_search($_POST['api_key'], $this->api_keys), "api_key" => $api_key));
			
			$_POST['silo_id'] = array_search($_POST['api_key'], $this->api_keys);
			$this->Float->create();
			if (!$this->Float->save($_POST)) {
				die('error: saving to the database');
			}
			
			echo "success";
		}
		else {
			die('error: incorrect parameters');
		}
	}

	/**
	 * Adds a single 'bool' registry via POST
	 * 
	 * ToDo: should add several registries at once
	 * ToDo: die() is fugly, throw exceptions!
	 * 
	 * @param string $_POST['tagname']
	 * @param string $_POST['value']
	 * @param string $_POST['time']
	 * @param string $_POST['api_key']
	 */
	function bool_add() {
		if (isset($_POST['tagname']) && isset($_POST['value']) 
			&& isset($_POST['time']) && isset($_POST['api_key'])
		) {
			if (!in_array($_POST['api_key'], $this->api_keys)) {
				die('error: incorrect api key');
			}

			$this->ApiRequest->save(array("method" => "bool_add", "silo_id" => array_search($_POST['api_key'], $this->api_keys), "api_key" => $api_key));

			$_POST['silo_id'] = array_search($_POST['api_key'], $this->api_keys);			
			$this->Bool->create();
			if (!$this->Bool->save($_POST)) {
				die('error: saving to the database');
			}
			
			echo "success";
		}
		else {
			die('error: incorrect parameters');
		}
	}

	/**
	 * Returns all configuration parameters for the given silo 
	 *
	 **/
	function config_get($api_key)
	{
		if (empty($api_key)) {
			die("error: correct usage is {domain}/config_get/{api_key}");
		}
		
		$silo_id = array_search($api_key, $this->api_keys);		
		$this->ApiRequest->save(array("method" => "config_get", "silo_id" => $silo_id, "api_key" => $api_key));
		$fields = array("fan_auto", "humidity_min", "humidity_max", "fan_service_min", "fan_service_max");
		$this->data = $this->Configuration->find(array("silo_id" => $silo_id), $fields);
		
		if (!$this->data) {
			die("error: there's no data for the given key");
		}
	}

	/**
	 * this functions is just for testing, must be removed on production
	 * returns all the float values
	 **/
	function float_debug()
	{
		$results = $this->Float->findAll(null, null, "time DESC");
		
		foreach ($results as $result) {
			echo date("D M j G:i:s Y",  $result['Float']['time']);
			echo " | ";
			echo $result['Float']['tagname'];
			echo ":";
			echo $result['Float']['value'];
			echo ",";
			echo $result['Float']['time'];
			echo "<br />";
		}
	}
	
	/**
	 * this functions is just for testing, must be removed on production
	 * returns all the bools values
	 **/
	function bool_debug()
	{
		$results = $this->Bool->findAll(null, null, "time DESC");
		
		foreach ($results as $result) {
			echo date("D M j G:i:s Y",  $result['Bool']['time']);
			echo " | ";
			echo $result['Bool']['tagname'];
			echo ":";
			echo $result['Bool']['value'];
			echo ",";
			echo $result['Bool']['time'];
			echo "<br />";
		}
	}
}

?>