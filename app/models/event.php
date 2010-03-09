<?php

class Event extends AppModel
{
	var $name = 'Event';
	var $belongsTo = 'Silo';

	/**
	 * Possible event types
	 *
	 * @var string
	 **/
	var $types = array( 
		1 => "Fumigar",
	 	2 => "Aplicar Ozono",
	 	3 => "Reparación del Sistema",
	 	4 => "Daños Observados"
	);
}

?>