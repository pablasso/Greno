<?php if (empty($silo_id)) { exit(); } ?>
<?php $this->pageTitle = "Configuraciones del silo #{$silo_id}"; ?>

  <!-- START .grid_9 - LEFT CONTENT -->  
  <div class="grid_9 cnt" id="left">
    <h1>Silo 100</h1>
    <div id="lipsum">
      
<!--FORM ELEMENTS EXAMPLE-->            
	 <?php echo $form->create('Configuration', array("class" => "nice", "action" => "edit")); ?>
        <h2>Configuración del silo</h2>
        <p class="left">
			<?php echo $form->hidden("silo_id", array("value" => $silo_id)); ?>
			<?php echo $form->input("fan_auto", array("label" => "Ventilador Automático", "div" => false)); ?><br /><br />
			<?php echo $form->input("humidity_min", array("label" => "Mínimo de Humedad Relativa (para ventilar)", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("humidity_max", array("label" => "Máximo de Humedad Relativa (para ventilar)", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("fan_service_min", array("label" => "Inicio de ventilación (minutos)", "class" => "inputText", "div" => false)); ?>
			<?php echo $form->input("fan_service_max", array("label" => "Fin de ventilación (minutos)", "class" => "inputText", "div" => false)); ?>
		</p>
		<br clear="all" />
		<button class="green" type="submit">Actualizar Configuración</button>
        <div class="clear"></div>
      </form>
    </div>
<!--END FORM ELEMENTS EXAMPLE-->
    
  </div>
<!-- END LEFT CONTENT-->  

<!-- START RIGHT CONTENT - Widget menu -->    
  <div class="grid_3">
    <!-- TODO WIDGET -->
	<?php echo $this->element("todos", array("section" => "configurations/edit")); ?>
    <br />
    <!-- ACTIVITY WIDGET -->
    <br />
  </div>
  <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->