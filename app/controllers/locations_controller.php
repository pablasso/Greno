<?php

class LocationsController extends AppController {

	var $name = "Locations";
	var $uses = array("Location");
	
	/**
	 * Locations home page
	 *
	 * @return void
	 */
	function index() {
		$this->set("locations", $this->Location->find('all'));
	}

	/**
	 * Displays the given location
	 *
	 * @param int $id Location Id
	 * @return void
	 */
	function view($id = null)
	{
		$this->Location->id = $id;
		$this->data = $this->Location->read();
	}

	/**
	 * Add a new location
	 *
	 * @return void
	 */
	function add()
	{
		if (!empty($this->data))
		{
			$this->Location->create();
			
			if ($this->Location->save($this->data)) 
			{
				$flash_message = "La ubicación ha sido guardada.";
				$flash_layout = "flash_good";
			}
			else 
			{
				$flash_message = "Ocurrió un error y no se guardo la ubicación.";
				$flash_layout = "flash_bad";
			}

			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/locations", null, true);
		}
	}
	
	/**
	 * Deletes the given location
	 *
	 * @param int $id Location Id
	 * @return void
	 */
	function delete($id)
	{
		$this->layout = "ajax";

		if ($this->Location->delete($id))
		{
			$flash_message = "La ubicación ha sido borrada.";
			$flash_layout = "flash_info";
		}
		else
		{
			$flash_message = "Ocurrió un error y no se borro la ubicación.";
			$flash_layout = "flash_bad";
		}
		
		$this->Session->setFlash($flash_message, $flash_layout);
		$this->redirect("/locations", null, true);
	}

	/**
	 * Edits the given location
	 *
	 * @param int $id Location Id
	 * @return void
	 */
	function edit($id = null)
	{
		$this->Location->id = $id;
		
		if (empty($this->data)) {
			$this->data = $this->Location->read();
		}
		else
		{
			if ($this->Location->save($this->data))
			{
				$flash_message = "La ubicación ha sido actualizada.";
				$flash_layout = "flash_good";
			}
			else 
			{
				$flash_message = "Ocurrió un error y no se pudo actualizar la ubicación.";
				$flash_layout = "flash_bad";
			}
			
			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/locations", null, true);
		}
	}
}

?>