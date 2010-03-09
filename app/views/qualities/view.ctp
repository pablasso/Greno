<?php $this->pageTitle = "Viendo Evaluación de Calidad del Silo 100 - AdaptiveRTC"; ?>

  <!-- START .grid_9 - LEFT CONTENT -->  
  <div class="grid_9 cnt" id="left">
    <h1>Silo 100</h1>
    <div id="lipsum">

		<?php $date_custom = explode(" ", $this->data["Quality"]["date_custom"]); ?>

    	<h2>Evaluación de Calidad: <?php echo $date_custom[0]; ?></h2>

		<p>
			<strong>Persona Responsable:</strong> <?php echo $this->data["Quality"]["person"]; ?><br />
			<strong>Observaciones:</strong> <?php echo $this->data["Quality"]["comments"]; ?><br />
		</p>

		<p><strong>Evaluación:</strong></p>

		<ul>
			<li><strong>Humedad:</strong> <?php echo $this->data["Quality"]["humidity"]; ?></li>
			<li><strong>Impureza:</strong> <?php echo $this->data["Quality"]["impurity"]; ?></li>
			<li><strong>Daño por Hongos %:</strong> <?php echo $this->data["Quality"]["damage_fungus"]; ?></li>
			<li><strong>Daño por Calor %:</strong> <?php echo $this->data["Quality"]["damage_heat"]; ?></li>
			<li><strong>Daño por Insectos %:</strong> <?php echo $this->data["Quality"]["damage_insects"]; ?></li>
			<li><strong>Podridos %:</strong> <?php echo $this->data["Quality"]["damage_rot"]; ?></li>
			<li><strong>Manchados %:</strong> <?php echo $this->data["Quality"]["damage_stain"]; ?></li>
			<li><strong>Otros Daños %:</strong> <?php echo $this->data["Quality"]["damage_other"]; ?></li>
			<li><strong>Quebrados %:</strong> <?php echo $this->data["Quality"]["broken"]; ?></li>
			<li><strong>Peso Específico:</strong> <?php echo $this->data["Quality"]["weight_specific"]; ?></li>
		</ul>
    </div>
<!--END FORM ELEMENTS EXAMPLE-->

  </div>
<!-- END LEFT CONTENT-->

<!-- START RIGHT CONTENT - Widget menu -->    
  <div class="grid_3">
    <!-- TODO WIDGET -->
	<?php if ($username == "admin"): ?>
	<?php echo $this->element("todos", array("section" => "qualities/view", "silo_id" => $this->data["Quality"]["silo_id"])); ?>
    <br />
	<?php endif ?>
    <!-- ACTIVITY WIDGET -->
    <br />
  </div>
  <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->