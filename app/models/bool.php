<?php

class Bool extends AppModel {
	var $name = 'Bool';
	var $belongsTo = 'Silo';

	/**
	 * Returns 'ventilador' graph data
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
		$sql  = "SELECT * FROM bools WHERE silo_id = {$silo_id} AND time > UNIX_TIMESTAMP(DATE_SUB(NOW(), INTERVAL {$start_day} DAY)) AND time < UNIX_TIMESTAMP(DATE_SUB(NOW(),INTERVAL {$end_day} DAY))";
		$sql .= " AND tagname = 'ventilador' ORDER BY time ASC";
		$bools = $this->query($sql);
		$ventilador = array();
		$six_hours = 21600;

		foreach ($bools as $bool) {
			$ventilador[] = array(($bool["bools"]["time"] - $six_hours) * 1000, $bool["bools"]["value"]);
		}

		$data = array();
		$data["ventilador"]["label"] = " Ventilador";
		$data["ventilador"]["data"] = $ventilador;
		return $data;
	}
}

?>