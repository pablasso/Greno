<?php $this->pageTitle = "Agregando Evaluación de Plaga al Silo 100 - AdaptiveRTC"; ?>

  <!-- START .grid_9 - LEFT CONTENT -->  
  <div class="grid_9 cnt" id="left">
    <h1>Silo 100</h1>
    <div id="lipsum">

<!--FORM ELEMENTS EXAMPLE-->
	 <?php echo $form->create('Plague', array("class" => "nice", "action" => "add/{$silo_id}")); ?>
        <h2>Evaluación de Plaga</h2>
        <p class="left">
			<?php echo $form->hidden("silo_id", array("value" => $silo_id)); ?>
			<?php echo $form->input("date_custom", array("label" => "Fecha", "class" => "inputText", "type" => "text", "style" => "width:145px", "value" => date("Y-m-d"),"div" => false)); ?>
			<?php echo $form->input("person", array("label" => "Persona Responsable", "class" => "inputText", "div" => false)); ?>

			<?php echo $form->input("primary_alive_name", array("label" => "Nombre de Plaga Viva Primaria", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("primary_alive_sample", array("label" => "Plaga Viva Primaria En 1KG de Muestra", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("primary_alive_total", array("label" => "Plaga Viva Primaria En El Total de la Muestra", "class" => "inputText", "div" => false)); ?>

			<?php echo $form->input("secondary_alive_name", array("label" => "Nombre de Plaga Viva Secundaria", "class" => "inputText", "div" => false)); ?>			
			<?php echo $form->input("secondary_alive_sample", array("label" => "Plaga Viva Secundaria En 1KG de Muestra", "class" => "inputText", "div" => false)); ?>			
			<?php echo $form->input("secondary_alive_total", array("label" => "Plaga Viva Secundaria En El Total de la Muestra", "class" => "inputText", "div" => false)); ?>	
		</p>
        <p class="right">
			<?php echo $form->input("primary_dead_name", array("label" => "Nombre de Plaga Muerta Primaria", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("primary_dead_sample", array("label" => "Plaga Muerta Primaria En 1KG de Muestra", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("primary_dead_total", array("label" => "Plaga Muerta Primaria En El Total de la Muestra", "class" => "inputText", "div" => false)); ?>

			<?php echo $form->input("secondary_dead_name", array("label" => "Nombre de Plaga Muerta Secundaria", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("secondary_dead_sample", array("label" => "Plaga Muerta Secundaria En 1KG de Muestra", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("secondary_dead_total", array("label" => "Plaga Muerta Secundaria En El Total de la Muestra", "class" => "inputText", "div" => false)); ?>
			
			<label>¿Observaciones?</label>
			<?php echo $form->textarea("comments", array("class" => "inputText_wide", "rows" => "5", "div" => false)); ?>
			<br clear="all" />
			<button class="green" type="submit">Guardar Evaluación</button>
        </p>
        <div class="clear"></div>
      </form>
    </div>
<!--END FORM ELEMENTS EXAMPLE-->
    
  </div>
<!-- END LEFT CONTENT-->  

<!-- START RIGHT CONTENT - Widget menu -->    
  <div class="grid_3">
    <!-- TODO WIDGET -->
	<?php echo $this->element("todos", array("section" => "plagues/add")); ?>
    <br />
    <!-- ACTIVITY WIDGET -->
    <br />
  </div>
  <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->