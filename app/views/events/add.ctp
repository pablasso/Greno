<?php $this->pageTitle = "Agregando Evento al Silo 100 - AdaptiveRTC"; ?>

  <!-- START .grid_9 - LEFT CONTENT -->  
  <div class="grid_9 cnt" id="left">
    <h1>Silo 100</h1>
    <div id="lipsum">

<!--FORM ELEMENTS EXAMPLE-->
	 <?php echo $form->create('Event', array("class" => "nice", "action" => "add/{$silo_id}")); ?>
        <h2>Evento</h2>
        <p class="left">
			<?php echo $form->hidden("silo_id", array("value" => $silo_id)); ?>
			<?php echo $form->input("date_custom", array("label" => "Fecha", "class" => "inputText", "type" => "text", "style" => "width:145px", "value" => date("Y-m-d"),"div" => false)); ?>
			<?php echo $form->input("person", array("label" => "Persona Responsable", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->select("type", $types, 1, array("label" => "Tipo", "class" => "inputText", "div" => false), false); ?>
		</p>
        <p class="right">
			<label>¿Observaciones?</label>
			<?php echo $form->textarea("comments", array("class" => "inputText_wide", "rows" => "5", "div" => false)); ?>
			<br clear="all" />
			<button class="green" type="submit">Guardar Evento</button>
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
	<?php echo $this->element("todos", array("section" => "events/add")); ?>
    <br />
    <!-- ACTIVITY WIDGET -->
    <br />
  </div>
  <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->