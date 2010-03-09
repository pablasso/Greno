<?php

class Silo extends AppModel
{
	var $name = 'Silo';
	var $belongsTo = 'Location';

	var $hasMany = array(
			'Quality' => array(
			'className' => 'Quality',
			'order'     => 'Quality.date_custom ASC'
		),
			'Plague' => array(
			'className' => 'Plague',
			'order'     => 'Plague.date_custom ASC'
		),
			'Event' => array(
			'className' => 'Event',
			'order'     => 'Event.date_custom ASC'
		),
			'Float' => array(
			'className' => 'Float'
		),
			'Bool' => array(
			'className' => 'Bool'
		)
	);

	/**
	 * Returns silo status and last api request date
	 *
	 * @return array
	 **/
	function get_status($silo_id)
	{
		App::import('model', 'ApiRequest');
		$api_request = new ApiRequest();
		$api_status = array();
		$result = $api_request->find(array("silo_id" => $silo_id), array("created"), "created DESC" );
	
		if (!$result)
		{
			$api_status["is_online"] = false;
			$api_status["last_request"] = null;
		}
		else
		{
			$last_request = strtotime($result["ApiRequest"]["created"]);
			$api_status["is_online"] = ($last_request - strtotime("- 15 minutes") > 0 ) ? true : false;
			$api_status["last_request"] = $result["ApiRequest"]["created"];
		}

		return $api_status;
	}
}

?>