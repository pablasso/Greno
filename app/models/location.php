<?php

class Location extends AppModel
{
	var $name = 'Location';
	
	var $hasMany = array(
			'Silo' => array(
			'className'  => 'Silo',
			'order'      => 'Silo.name ASC'
		)
	);
}

?>