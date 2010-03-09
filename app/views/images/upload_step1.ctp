<!-- START .grid_9 - LEFT CONTENT -->  
<div class="grid_9 cnt" id="left">
	<div id="lipsum">

		<?php echo $form->create("Image", array("action" => "upload_step2", "enctype" => "multipart/form-data", "class" => "nice")); ?>
        	<h2>Elige una imágen</h2>
        	<?php echo $form->hidden("type", array("value" => "{$type}")); ?>
			<?php echo $form->hidden("type_id", array("value" => "{$type_id}")); ?>
			<?php echo $form->hidden("path", array("value" => "{$path}")); ?>
        	<?php echo $form->hidden("filename", array("value" => "{$filename}")); ?>
			<?php echo $form->input("image", array("type" => "file", "label" => false)); ?>
			<br /><label>¿Comentarios?</label><br />
			<?php echo $form->textarea("caption", array("class" => "inputText_wide", "rows" => "3", "div" => false)); ?>
			<br /><br /><br /><br /><br />
			<button class="green" type="submit">Subir</button>
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