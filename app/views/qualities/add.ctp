<?php $this->pageTitle = "Agregando Evaluación de Calidad al Silo 100 - AdaptiveRTC"; ?>

  <!-- START .grid_9 - LEFT CONTENT -->  
  <div class="grid_9 cnt" id="left">
    <h1>Silo 100</h1>
    <div id="lipsum">

<!--FORM ELEMENTS EXAMPLE-->
	 <?php echo $form->create('Quality', array("class" => "nice", "action" => "add/{$silo_id}")); ?>
        <h2>Evaluación de Calidad</h2>
        <p class="left">
			<?php echo $form->hidden("silo_id", array("value" => $silo_id)); ?>
			<?php echo $form->input("date_custom", array("label" => "Fecha", "class" => "inputText", "type" => "text", "style" => "width:145px", "value" => date("Y-m-d"),"div" => false)); ?>
			<?php echo $form->input("person", array("label" => "Persona Responsable", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("humidity", array("label" => "Humedad %", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("impurity", array("label" => "Impureza %", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("damage_fungus", array("label" => "Daño por Hongos %", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("damage_heat", array("label" => "Daño por Calor %", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("damage_insects", array("label" => "Daño por Insectos %", "class" => "inputText", "div" => false)); ?>
		</p>
        <p class="right">
			<?php echo $form->input("damage_rot", array("label" => "Podridos %", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("damage_stain", array("label" => "Manchados %", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("damage_other", array("label" => "Otros Daños %", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("broken", array("label" => "Quebrados %", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("weight_specific", array("label" => "Peso Específico", "class" => "inputText", "div" => false)); ?>
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
	<?php echo $this->element("todos", array("section" => "qualities/add")); ?>
    <br />
    <!-- ACTIVITY WIDGET -->
    <br />
  </div>
  <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->