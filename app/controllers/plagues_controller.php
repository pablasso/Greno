<?php

class PlaguesController extends AppController
{
	var $name = 'Plagues';

	/**
	 * Displays the given plague
	 *
	 * @param int $id Plague Id
	 * @return void
	 */
	function view($id = null)
	{
		$this->Plague->id = $id;
		$this->data = $this->Plague->read();
	}
	
	/**
	 * Add a plague evaluation for the given silo
	 *
	 * @param int $silo_id Silo Id
	 * @return void
	 */
	function add($silo_id)
	{
		$this->set("silo_id", $silo_id);
		
		if (!empty($this->data))
		{
			$this->Plague->create();
			if ($this->Plague->save($this->data))
			{
				$flash_message = "Tu Evaluación de Plaga ha sido guardada.";
				$flash_layout = "flash_good";
			}
			else 
			{
				$flash_message = "Ocurrió un error y no se guardo la Evaluación de Plaga.";
				$flash_layout = "flash_bad";
			}

			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/silos/view/{$this->data['Plague']['silo_id']}", null, true);
		}
	}
	
	/**
	 * Deletes the given plague
	 *
	 * @param int $id Plague Id
	 * @return void
	 */
	function delete($id)
	{
		$this->layout = "ajax";
		$this->Plague->id = $id;
		$this->data = $this->Plague->read();

		if ($this->Plague->delete($id))
		{
			$flash_message = "La Evaluación de Plaga ha sido borrada.";
			$flash_layout = "flash_info";
		}
		else 
		{
			$flash_message = "Ocurrió un error y no se borro la Evaluación de Plaga.";
			$flash_layout = "flash_bad";
		}
		
		$this->Session->setFlash($flash_message, $flash_layout);
		$this->redirect("/silos/view/{$this->data['Plague']['silo_id']}", null, true);
	}

	/**
	 * Edits the given plague
	 *
	 * @param int $id Plague Id
	 * @return void
	 */
	function edit($id = null)
	{
		$this->Plague->id = $id;
		
		if (empty($this->data)) 
		{
			$this->data = $this->Plague->read();
			$this->set("silo_id", $this->data["Plague"]["silo_id"]);
		}
		else
		{
			if ($this->Plague->save($this->data))
			{
				$flash_message = "La Evaluación de Plaga ha sido actualizada.";
				$flash_layout = "flash_good";
			}
			else 
			{
				$flash_message = "Ocurrió un error y no se pudo actualizar la Evaluación de Plaga.";
				$flash_layout = "flash_bad";
			}
			
			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/silos/view/{$this->data['Plague']['silo_id']}", null, true);
		}
	}
}
?>