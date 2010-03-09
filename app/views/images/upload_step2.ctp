<?php echo $javascript->link('jquery.imgareaselect.min.js'); ?>

<!-- START .grid_9 - LEFT CONTENT -->  
<div class="grid_9 cnt" id="left">
	<div id="lipsum">

		<?php echo $form->create("Image", array("action" => "upload_step3", "enctype" => "multipart/form-data", "class" => "nice")); ?>
        	<h2>Selecciona un área</h2>
			<?php echo $form->hidden("path", array("value" => "{$this->data['Image']['path']}")); ?>
        	<?php echo $form->hidden("filename", array("value" => "{$this->data['Image']['filename']}")); ?>
        	<?php echo $form->hidden("type", array("value" => "{$this->data['Image']['type']}")); ?>
			<?php echo $form->hidden("type_id", array("value" => "{$this->data['Image']['type_id']}")); ?>
			<?php echo $form->hidden("caption", array("value" => "{$this->data['Image']['caption']}")); ?>
			<?php echo $cropimage->createJavaScript($uploaded['imageWidth'], $uploaded['imageHeight'], 151, 151); ?>
			<?php echo $cropimage->createForm($uploaded["imagePath"], 151, 151); ?><br />
			<button id="save_thumb" class="green" type="submit">Subir</button>
		</form>
	
	</div>
</div>

<!-- START RIGHT CONTENT - Widget menu -->    
<div class="grid_3">
	<!-- TODO WIDGET -->
	<div class="widget">
		<h3>Tareas</h3>
		<a href="/qualities/add/3" class="view_all">Agregar Evaluación de Calidad</a>
		<a href="/plagues/add/3" class="view_all">Agregar Evaluación de Plaga</a>
		<a href="#" class="view_all"><strike>Modificar este Silo</strike></a>
		<a href="#" class="view_all"><strike>Agregar Fotos al Silo</strike></a>
	</div>
	<br />
	<!-- ACTIVITY WIDGET -->
	<div class="widget">
		<h3>Actividad Reciente</h3>
		<a href="/silos" class="view_all">Silo 100</a>
		<a href="/locations" class="view_all">Silos Carretera a Guadalajara</a>
	</div>
	<br />
</div>
<!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->