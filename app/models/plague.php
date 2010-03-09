<?php

class Plague extends AppModel
{
	var $name = 'Plague';
	var $belongsTo = 'Silo';

	/**
	 * ToDo: before delete, erase all images from filesystem
	 */

	var $hasMany = array(
						'Image' => array(
						'className' => 'Image',
						'foreignKey' => 'type_id',
						'conditions' => array('Image.type' => 'plagues'),
						'order' => 'Image.created DESC',
						'dependent'=> true
						));
}

?>