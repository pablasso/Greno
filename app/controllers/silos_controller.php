<?php

class SilosController extends AppController {

	var $name = "Silos";
	var $uses = array("Silo", "Event", "Float", "Bool");
	
	/**
	 * Displays the given Silo
	 *
	 * @param int $id Silo Id
	 * @return void
	 */
	function view($id)
	{
		$this->Silo->id = $id;
		$this->data = $this->Silo->read();
		$this->set("event_types", $this->Event->types);
		$this->set("silo_status", $this->Silo->get_status($id));
	}
	
	/**
	 * Add a new Silo associated to the given Location
	 *
	 * @return void
	 */
	function add($location_id)
	{
		$this->set("location_id", $location_id);

		if (!empty($this->data))
		{
			$this->Silo->create();
			
			if ($this->Silo->save($this->data)) 
			{
				$flash_message = "El silo ha sido guardado.";
				$flash_layout = "flash_good";
			}
			else 
			{
				$flash_message = "Ocurrió un error y no se guardó el silo.";
				$flash_layout = "flash_bad";
			}

			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/locations/view/{$this->data['Silo']['location_id']}", null, true);
		}
	}

	/**
	 * Deletes the given silo
	 *
	 * @param int $id Silo Id
	 * @return void
	 */
	function delete($id)
	{
		$this->layout = "ajax";
		$this->Silo->id = $id;
		$this->data = $this->Silo->read();

		if ($this->Silo->delete($id))
		{
			$flash_message = "El silo ha sido borrado.";
			$flash_layout = "flash_info";
		}
		else
		{
			$flash_message = "Ocurrió un error y no se borró el silo.";
			$flash_layout = "flash_bad";
		}

		$this->Session->setFlash($flash_message, $flash_layout);
		$this->redirect("/locations/view/{$this->data["Silo"]["location_id"]}", null, true);
	}

	/**
	 * Edits the given silo
	 *
	 * @param int $id Silo Id
	 * @return void
	 */
	function edit($id = null)
	{
		$this->Silo->id = $id;
		
		if (empty($this->data))
		{
			$this->data = $this->Silo->read();
			$this->set("location_id", $this->data["Silo"]["location_id"]);
		}
		else
		{
			if ($this->Silo->save($this->data))
			{
				$flash_message = "El silo ha sido actualizado.";
				$flash_layout = "flash_good";
			}
			else 
			{
				$flash_message = "Ocurrió un error y no se pudo actualizar el silo.";
				$flash_layout = "flash_bad";
			}
			
			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/locations/view/{$this->data["Silo"]["location_id"]}", null, true);
		}
	}

	/**
	 * Returns graph's data given the date range via json
	 *
	 * @param int $silo_id
	 * @param int $start_day
	 * @param int $end_day
	 * @return void
	 **/
	function get_graph($silo_id, $start_day, $end_day)
	{
		$this->layout = "ajax";
		$floats = $this->Float->getGraphData($silo_id, $start_day, $end_day);
		$bools = $this->Bool->getGraphData($silo_id, $start_day, $end_day);
		$data = array_merge($floats, $bools);
		$six_hours = 21600;
		$data["start_timestamp"] = (strtotime("{$start_day} day") - $six_hours) * 1000;
		$data["end_timestamp"] = (strtotime("{$end_day} day") - $six_hours)  * 1000;
		$this->set("data", $data);
	}
}

?>