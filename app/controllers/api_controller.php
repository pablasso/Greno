<?php

class ApiController extends AppController
{
	var $name = "Api";
	var $uses = array('Float', 'Bool', 'Temperature', 'Configuration', 'ApiRequest');
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
	 * 
	 * @param string $_POST['tagname']
	 * @param float $_POST['value']
	 * @param int $_POST['time']
	 * @param string $_POST['api_key']
	 * @return void
	 */
	function float_add() {
		if (isset($_POST['tagname']) && isset($_POST['value']) 
			&& isset($_POST['time']) && isset($_POST['api_key'])
		) {
			if (!in_array($_POST['api_key'], $this->api_keys)) {
				die('error: incorrect api key');
			}
			
			$this->ApiRequest->save(array("method" => "float_add", 
										  "silo_id" => array_search($_POST['api_key'], $this->api_keys), 
										  "api_key" => $_POST['api_key']));
			
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
	 * 
	 * @param string $_POST['tagname']
	 * @param int $_POST['value']
	 * @param int $_POST['time']
	 * @param string $_POST['api_key']
	 * @return void
	 */
	function bool_add() {
		if (isset($_POST['tagname']) && isset($_POST['value']) 
			&& isset($_POST['time']) && isset($_POST['api_key'])
		) {
			if (!in_array($_POST['api_key'], $this->api_keys)) {
				die('error: incorrect api key');
			}

			$this->ApiRequest->save(array("method" => "bool_add", 
										  "silo_id" => array_search($_POST['api_key'], $this->api_keys), 
										  "api_key" => $_POST['api_key']));

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
	function config_get()
	{
		header("Context-type: text/plain");
		
		if (empty($_POST['api_key'])) {
			die("error: api_key not set");
		}
		
		$silo_id = array_search($_POST['api_key'], $this->api_keys);		
		$this->ApiRequest->save(array("method" => "config_get", "silo_id" => $silo_id, "api_key" => $_POST['api_key']));
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
		$results = $this->Float->findAll(null, null, "time ASC");
		header("Content-type: text/plain");
		
		foreach ($results as $result) {
			echo date("D M j G:i:s Y",  $result['Float']['time']);
			echo "|";
			echo $result['Float']['tagname'];
			echo "|";
			echo $result['Float']['value'];
			echo "|";
			echo $result['Float']['time'];
			echo "\n";
		}
	}
	
	/**
	 * this functions is just for testing, must be removed on production
	 * returns all the bools values
	 **/
	function bool_debug()
	{
		$results = $this->Bool->findAll(null, null, "time ASC");
		header("Content-type: text/plain");
		
		foreach ($results as $result) {
			echo date("D M j G:i:s Y",  $result['Bool']['time']);
			echo "|";
			echo $result['Bool']['tagname'];
			echo "|";
			echo $result['Bool']['value'];
			echo "|";
			echo $result['Bool']['time'];
			echo "\n";
		}
	}
	
	/**
	 * Creates a record for a single temperature column
	 *
	 * @param int $_POST['column']
	 * @param int $_POST['total']
	 * @param int $_POST['time']
	 * @param string $_POST['temperatures']
	 * @param string $_POST['api_key']
	 * @return void
	 **/
	function temperature_add()
	{
		if (isset($_POST['column']) && isset($_POST['total']) && 
			isset($_POST['time']) && isset($_POST['temperatures']) && 
			isset($_POST['api_key']) 
		) {
			if (!in_array($_POST['api_key'], $this->api_keys)) {
				die('error: incorrect api key');
			}
			
			$this->ApiRequest->save(array("method" => "temp_add", 
										  "silo_id" => array_search($_POST['api_key'], $this->api_keys), 
										  "api_key" => $_POST['api_key']));
			
			$_POST['silo_id'] = array_search($_POST['api_key'], $this->api_keys);
			$this->Temperature->create();
			if (!$this->Temperature->save($_POST)) {
				die('error: saving to the database');
			}
			
			echo "success";
		}
		else {
			die('error: incorrect parameters');
		}
	}

	/**
	 * this functions is just for testing, must be removed on production
	 * returns all the temperatures values
	 **/
	function temperature_debug()
	{
		$results = $this->Temperature->findAll(null, null, "time ASC");
		header("Content-type: text/plain");
		
		foreach ($results as $result) {
			echo date("D M j G:i:s Y",  $result['Temperature']['time']);
			echo "|";
			echo $result['Temperature']['column'];
			echo "|";
			echo $result['Temperature']['total'];
			echo "|";
			echo $result['Temperature']['time'];
			echo "|";
			echo $result['Temperature']['temperatures'];
			echo "\n";
		}
	}
}

?>