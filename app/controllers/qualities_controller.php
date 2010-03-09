<?php

class QualitiesController extends AppController
{
	var $name = "Qualities";

	/**
	 * Displays the given quality
	 *
	 * @param int $id Quality Id
	 * @return void
	 */
	function view($id = null)
	{
		$this->Quality->id = $id;
		$this->data = $this->Quality->read();
	}
	
	/**
	 * Add a quality evaluation for the given silo
	 *
	 * @param int $silo_id Silo Id
	 * @return void
	 */
	function add($silo_id)
	{
		$this->set("silo_id", $silo_id);
		
		if (!empty($this->data))
		{
			$this->Quality->create();	
			if ($this->Quality->save($this->data))
			{
				$flash_message = "Tu Evaluación de Calidad ha sido guardada.";
				$flash_layout = "flash_good";
			}
			else 
			{
				$flash_message = "Ocurrió un error y no se guardo la Evaluación de Calidad.";
				$flash_layout = "flash_bad";
			}

			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/silos/view/{$this->data['Quality']['silo_id']}", null, true);
		}
	}
	
	/**
	 * Deletes the given quality
	 *
	 * @param int $id Quality Id
	 * @return void
	 */
	function delete($id)
	{
		$this->layout = "ajax";
		$this->Quality->id = $id;
		$this->data = $this->Quality->read();

		if ($this->Quality->delete($id))
		{
			$flash_message = "La Evaluación de Calidad ha sido borrada.";
			$flash_layout = "flash_info";
		}
		else 
		{
			$flash_message = "Ocurrió un error y no se borro la Evaluación de Calidad.";
			$flash_layout = "flash_bad";
		}
		
		$this->Session->setFlash($flash_message, $flash_layout);
		$this->redirect("/silos/view/{$this->data["Quality"]["silo_id"]}", null, true);
	}

	/**
	 * Edits the given quality
	 *
	 * @param int $id Quality Id
	 * @return void
	 */
	function edit($id = null)
	{
		$this->Quality->id = $id;
		
		if (empty($this->data))
		{
			$this->data = $this->Quality->read();
			$this->set("silo_id", $this->data["Quality"]["silo_id"]);
		}
		else
		{
			if ($this->Quality->save($this->data))
			{
				$flash_message = "La Evaluación de Calidad ha sido actualizada.";
				$flash_layout = "flash_good";
			}
			else 
			{
				$flash_message = "Ocurrió un error y no se pudo actualizar la Evaluación de Calidad.";
				$flash_layout = "flash_bad";
			}
			
			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/silos/view/{$this->data["Quality"]["silo_id"]}", null, true);
		}
	}
}

?>