<?php $this->pageTitle = "Viendo Evento del Silo 100 - AdaptiveRTC"; ?>

  <!-- START .grid_9 - LEFT CONTENT -->  
  <div class="grid_9 cnt" id="left">
    <h1>Silo 100</h1>
    <div id="lipsum">

		<?php $date_custom = explode(" ", $this->data["Event"]["date_custom"]); ?>

    	<h2>Evento: <?php echo $date_custom[0]; ?></h2>

		<p>
			<strong>Persona Responsable:</strong> <?php echo $this->data["Event"]["person"]; ?><br />
			<strong>Tipo de Evento:</strong> <?php echo $types[$this->data["Event"]["type"]]; ?><br />
			<strong>Observaciones:</strong> <?php echo $this->data["Event"]["comments"]; ?><br />
		</p>
    </div>
<!--END FORM ELEMENTS EXAMPLE-->
    
  </div>
<!-- END LEFT CONTENT-->  

<!-- START RIGHT CONTENT - Widget menu -->    
  <div class="grid_3">
    <!-- TODO WIDGET -->
	<?php if ($username == "admin"): ?>
	<?php echo $this->element("todos", array("section" => "events/view", "silo_id" => $this->data["Event"]["silo_id"])); ?>
    <br />
	<?php endif ?>
    <!-- ACTIVITY WIDGET -->
    <br />
  </div>
 <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->