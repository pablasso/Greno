<?php

class ImagesController extends AppController
{
	var $name = 'Images';
	var $helpers = array("Cropimage");
	var $components = array("JqImgcrop");
	
	/**
	 * Relative path to store users plague images
	 * the image type folder still needs to be appended
	 *
	 * @var string
	 **/
	var $path = "/img/";
	
	/**
	 * Displays the image upload form
	 *
	 * @param $type Location or Plague, etc.
	 * @param $type_id Plague Id or Quality Id, etc.
	 * @return void
	 **/
	function upload_step1($type, $type_id)
	{
		$this->set("type", $type);
		$this->set("type_id", $type_id);
		$this->set("path", "{$this->path}{$type}/");
		$this->set("filename", "{$type}_{$type_id}_".time());
	}

	/**
	 * Displays the uploaded image so the user could select
	 * an area to crop
	 *
	 * @return void
	 **/
	function upload_step2()
	{
		if ( !empty($this->data) )
		{
			$uploaded = $this->JqImgcrop->uploadImage($this->data["Image"]["image"], $this->data["Image"]["path"], $this->data["Image"]["filename"]);

			if ( !empty($uploaded) && $this->Image->save($this->data) )
			{
				$this->set("uploaded", $uploaded);
				$this->data["Image"]["filename"] = $uploaded["imageName"];
				
				/* temporal changes */
				$flash_message = "La imágen se ha subido satisfactoriamente!.";
				$flash_layout = "flash_good";
				$this->Session->setFlash($flash_message, $flash_layout);
				$this->redirect("/{$this->data['Image']['type']}/view/{$this->data['Image']['type_id']}", null, true);
			}
			else
			{
				$flash_message = "Ocurrió un error y no se puede subir la imágen.";
				$flash_layout = "flash_bad";
				$this->Session->setFlash($flash_message, $flash_layout);
				$this->redirect("/{$this->data['Image']['type']}/view/{$this->data['Image']['type_id']}", null, true);
			}
		}
	}
	
	/**
	 * Crops and saves the given image 
	 *
	 * @return void
	 **/
	function upload_step3 ()
	{
		if ( !empty($this->data) )
		{
			$filename = $this->JqImgcrop->cropImage(
													151, 
													$this->data["Image"]['x1'], 
													$this->data["Image"]['y1'], 
													$this->data["Image"]['x2'], 
													$this->data["Image"]['y2'], 
													$this->data["Image"]['w'], 
													$this->data["Image"]['h'], 
													$this->data["Image"]['imagePath'], 
													$this->data["Image"]['imagePath']
													);

			if ( $filename && $this->Image->save($this->data))
			{
				$flash_message = "La imágen se ha subido satisfactoriamente!.";
				$flash_layout = "flash_good";
			}
			else 
			{
				$flash_message = "Ocurrió un error y no se pudo subir la imágen.";
				$flash_layout = "flash_bad";
			}

			$this->Session->setFlash($flash_message, $flash_layout);
			$this->redirect("/{$this->data['Image']['type']}/view/{$this->data['Image']['type_id']}", null, true);
		}
	}
}

?>