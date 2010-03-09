<?php $this->pageTitle = "Agregando ubicación - AdaptiveRTC"; ?>

  <!-- START .grid_9 - LEFT CONTENT -->  
  <div class="grid_9 cnt" id="left">
    <h1>Agregando una nueva ubicación</h1>
    <div id="lipsum">

<!--FORM ELEMENTS EXAMPLE-->
	 <?php echo $form->create('Location', array("class" => "nice", "action" => "add")); ?>
        <p class="left">
			<?php echo $form->input("name", array("label" => "Nombre", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("address", array("label" => "Dirección", "class" => "inputText", "div" => false)); ?>
			<label>Descripción</label>
			<?php echo $form->textarea("description", array("class" => "inputText_wide", "rows" => "5", "div" => false)); ?>
			<label>Código de Google Maps</label>
			<?php echo $form->textarea("map", array("class" => "inputText_wide", "rows" => "5", "div" => false)); ?>
			<br clear="all" />
			<button class="green" type="submit">Guardar Ubicación</button>
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