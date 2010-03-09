<?php

class Image extends AppModel
{
	var $name = 'Image';
	
	var $belongsTo = array(
						'Plague' => array(
						'className' => 'Plague',
						'foreignKey' => 'type_id',
						'conditions' => array('Image.type' => 'plagues')
						));

}

?>