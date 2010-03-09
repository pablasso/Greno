<?php

class ConfigurationsController extends AppController
{
	var $name = "Configurations";
	
	/**
	 * Edits silo parameters such as fan operations
	 *
	 * @return void
	 **/
	function edit($silo_id = null)
	{	
		if ( empty($this->data) ) {
			$this->data = $this->Configuration->find(array("silo_id" => $silo_id));
		}
		else
		{
			if ($this->Configuration->save($this->data))
			{
				$flash_message = "La configuración ha sido actualizada.";
				$flash_layout = "flash_good";
			}
			else  {
				$flash_message = "Ocurrió un error y no se pudo actualizar la configuración.";
				$flash_layout = "flash_bad";
			}
			
			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/silos/view/{$this->data["Configuration"]["silo_id"]}", null, true);
		}
		
		$this->set("silo_id", $silo_id);
	}
}

?>
