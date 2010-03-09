<?php

class Float extends AppModel {
	var $name = 'Float';
	var $belongsTo = 'Silo';

	/**
	 * Returns temperature and humidity
	 *
	 * @param int $silo_id
	 * @param int $start_day
	 * @param int $end_day
	 * @return array
	 **/
	function getGraphData($silo_id, $start_day, $end_day)
	{
		$start_day = abs($start_day);
		$end_day = abs($end_day);
		$sql  = "SELECT * FROM floats WHERE silo_id = {$silo_id} AND time > UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL {$start_day} DAY)) AND time < UNIX_TIMESTAMP(DATE_SUB(NOW(),INTERVAL {$end_day} DAY))";
		$sql .= " AND (tagname = 'temp_amb' OR tagname = 'hum_rel') ORDER BY time ASC";
		$floats = $this->query($sql);
		$temperature = array();
		$humidity = array();
		$six_hours = 21600;

		foreach ($floats as $float) {
			if ($float["floats"]["tagname"] == "temp_amb")
			{
				$float["floats"]["value"] = (int)$float["floats"]["value"] > 100 ? 100 : (int)$float["floats"]["value"];
				$float["floats"]["value"] = $float["floats"]["value"] < -5 ? -5 : $float["floats"]["value"];
				$temperature[] = array(($float["floats"]["time"] - $six_hours) * 1000, $float["floats"]["value"]);
			}
			else if ($float["floats"]["tagname"] == "hum_rel") {
				$humidity[] = array(($float["floats"]["time"] - $six_hours) * 1000, $float["floats"]["value"]);
			}
		}

		$data = array();
		$data["temperature"]["label"] = " Temperatura";
		$data["temperature"]["data"] = $temperature;
		$data["humidity"]["label"] = " Humedad";
		$data["humidity"]["data"] = $humidity;
		return $data;
	}
}

?>