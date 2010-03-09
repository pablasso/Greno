<?php

class EventsController extends AppController
{
	var $name = "Events";

	/**
	 * Displays the given event
	 *
	 * @param int $id Evet Id
	 * @return void
	 */
	function view($id = null)
	{
		$this->Event->id = $id;
		$this->data = $this->Event->read();
		$this->set("types", $this->Event->types);
	}
	
	/**
	 * Add an event for the given silo
	 *
	 * @param int $silo_id Silo Id
	 * @return void
	 */
	function add($silo_id)
	{
		$this->set("types", $this->Event->types);
		$this->set("silo_id", $silo_id);
		
		if (!empty($this->data))
		{
			$this->Event->create();
			
			if ($this->Event->save($this->data))
			{
				$flash_message = "Tu Evento ha sido guardado.";
				$flash_layout = "flash_good";
			}
			else 
			{
				$flash_message = "Ocurrió un error y no se guardo el Evento.";
				$flash_layout = "flash_bad";
			}

			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/silos/view/{$this->data['Event']['silo_id']}", null, true);
		}
	}
	
	/**
	 * Deletes the given event
	 *
	 * @param int $id Event Id
	 * @return void
	 */
	function delete($id)
	{
		$this->layout = "ajax";
		$this->Event->id = $id;
		$this->data = $this->Event->read();

		if ($this->Event->delete($id))
		{
			$flash_message = "El Evento ha sido borrado.";
			$flash_layout = "flash_info";
		}
		else 
		{
			$flash_message = "Ocurrió un error y no se borro el Evento.";
			$flash_layout = "flash_bad";
		}
		
		$this->Session->setFlash($flash_message, $flash_layout);
		$this->redirect("/silos/view/{$this->data['Event']['silo_id']}", null, true);
	}

	/**
	 * Edits the given event
	 *
	 * @param int $id Event Id
	 * @return void
	 */
	function edit($id = null)
	{
		$this->Event->id = $id;
		
		if (empty($this->data))
		{
			$this->data = $this->Event->read();
			$this->set("silo_id", $this->data["Event"]["silo_id"]);
			$this->set("types", $this->Event->types);
		}
		else
		{
			if ($this->Event->save($this->data))
			{
				$flash_message = "El Evento ha sido actualizado.";
				$flash_layout = "flash_good";
			}
			else 
			{
				$flash_message = "Ocurrió un error y no se pudo actualizar el Evento.";
				$flash_layout = "flash_bad";
			}
			
			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/silos/view/{$this->data['Event']['silo_id']}", null, true);
		}
	}
}

?>