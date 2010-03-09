<?php $this->pageTitle = "Viendo Evaluación de Plaga del Silo 100 - AdaptiveRTC"; ?>
<?php $session->flash(); ?>

<script type="text/javascript" src="/js/jquery.lightbox-0.5.js"></script>
<link rel="stylesheet" href="/css/jquery.lightbox-0.5.css" type="text/css" media="screen" />

  <!-- START .grid_9 - LEFT CONTENT -->
  <div class="grid_9 cnt" id="left">
    <h1>Silo 100</h1>
    <div id="lipsum">

		<?php $date_custom = explode(" ", $this->data["Plague"]["date_custom"]); ?>

    	<h2>Evaluación de Plaga: <?php echo $date_custom[0]; ?></h2>

		<p>
			<strong>Persona Responsable:</strong> <?php echo $this->data["Plague"]["person"]; ?><br />
			<strong>Observaciones:</strong> <?php echo $this->data["Plague"]["comments"]; ?><br />
		</p>

		<fieldset>
			<legend>Plaga Viva Primaria</legend>
			<strong>Nombre:</strong> <?php echo $this->data["Plague"]["primary_alive_name"]; ?><br />
			<strong>En 1KG de Muestra:</strong> <?php echo $this->data["Plague"]["primary_alive_sample"]; ?><br />
			<strong>En El Total de la Muestra:</strong> <?php echo $this->data["Plague"]["primary_alive_total"]; ?><br />
		</fieldset>

		<fieldset>
			<legend>Plaga Viva Secundaria</legend>
			<strong>Nombre:</strong> <?php echo $this->data["Plague"]["secondary_alive_name"]; ?><br />
			<strong>En 1KG de Muestra:</strong> <?php echo $this->data["Plague"]["secondary_alive_sample"]; ?><br />
			<strong>En El Total de la Muestra:</strong> <?php echo $this->data["Plague"]["secondary_alive_total"]; ?><br />
		</fieldset>

		<fieldset>
			<legend>Plaga Muerta Primaria</legend>
			<strong>Nombre:</strong> <?php echo $this->data["Plague"]["primary_dead_name"]; ?><br />
			<strong>En 1KG de Muestra:</strong> <?php echo $this->data["Plague"]["primary_dead_sample"]; ?><br />
			<strong>En El Total de la Muestra:</strong> <?php echo $this->data["Plague"]["primary_dead_total"]; ?><br />
		</fieldset>
		
		<fieldset>
			<legend>Plaga Muerta Secundaria</legend>
			<strong>Nombre:</strong> <?php echo $this->data["Plague"]["secondary_dead_name"]; ?><br />
			<strong>En 1KG de Muestra:</strong> <?php echo $this->data["Plague"]["secondary_dead_sample"]; ?><br />
			<strong>En El Total de la Muestra:</strong> <?php echo $this->data["Plague"]["secondary_dead_total"]; ?><br />
		</fieldset>

	</div>
<!--END FORM ELEMENTS EXAMPLE-->

  </div>
<!-- END LEFT CONTENT-->  

<!-- START RIGHT CONTENT - Widget menu -->    
  <div class="grid_3">
    <!-- TODO WIDGET -->
	<?php if ($username == "admin"): ?>
	<?php echo $this->element("todos", array("section" => "plagues/view", "silo_id" => $this->data["Plague"]["silo_id"])); ?>
    <br />
	<?php endif ?>
    <!-- ACTIVITY WIDGET -->
    <br />
  </div>
  <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->