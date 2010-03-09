<?php $this->pageTitle = "Agregando silo - AdaptiveRTC"; ?>

  <!-- START .grid_9 - LEFT CONTENT -->  
  <div class="grid_9 cnt" id="left">
    <h1>Agregando un nuevo Silo</h1>
    <div id="lipsum">

<!--FORM ELEMENTS EXAMPLE-->
	 <?php echo $form->create('Silo', array("class" => "nice", "action" => "add/{$location_id}")); ?>
        <p class="left">
			<?php echo $form->hidden("location_id", array("value" => $location_id)); ?>
			<?php echo $form->input("name", array("label" => "Nombre", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("brand", array("label" => "Marca", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("model", array("label" => "Modelo", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("motors", array("label" => "Motores", "class" => "inputText", "div" => false)); ?>
			<label>Descripción</label>
			<?php echo $form->textarea("description", array("class" => "inputText_wide", "rows" => "5", "div" => false)); ?>
			<br clear="all" />
			<button class="green" type="submit">Guardar Silo</button>
        </p>
        <div class="clear"></div>
      </form>
    </div>
<!--END FORM ELEMENTS EXAMPLE-->
    
  </div>
<!-- END LEFT CONTENT-->  

<!-- START RIGHT CONTENT - Widget menu -->    
  <div class="grid_3">
    <!-- ACTIVITY WIDGET -->
    <br />
  </div>
  <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->