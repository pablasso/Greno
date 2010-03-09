<?php $this->pageTitle = "{$this->data["Silo"]["name"]} - AdaptiveRTC"; ?>

<?php $session->flash(); ?>

  <!-- START .grid_9 - LEFT CONTENT -->  
  <div class="grid_9 cnt" id="left">
    <h1>Silo: <?php echo $this->data["Silo"]["name"]; ?></h1>
    <div id="lipsum">

	<p>
		<strong>Marca:</strong> <?php echo $this->data["Silo"]["brand"]; ?><br />
		<strong>Modelo:</strong> <?php echo $this->data["Silo"]["model"]; ?><br />
		<strong>Motores:</strong> <?php echo $this->data["Silo"]["motors"]; ?>
	</p>

<!--TEMPERATURE GRAPH-->
	<div align="center" style="margin:15px;">
		<?php echo $this->element("silo_graph", array("silo_id" => $this->data["Silo"]["id"])); ?>
	</div>
      
	<p><?php echo $this->data["Silo"]["description"]; ?></p>

<!--LOCATION IMAGE-->
	<!-- <div align="center" style="margin:15px;">
		<?php echo $html->image("silos/silo_example.png"); ?>
	</div> -->
 
<?php if (!empty($this->data["Quality"])): ?>
<!--QUALITY TABLE-->
      <h3 style="margin-bottom:0px;">Evaluaciones de Calidad</h3>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" id="data">
        <tr>
          <th width="80" scope="col"><a href="#">Fecha</a></th>
          <th width="100" scope="col"><a href="#">Persona</a></th>
          <th scope="col"><a href="#">Observaciones</a></th>
		  <?php if ($username == "admin"): ?>
          <th width="40" scope="col"><a href="#">Acciones</a></th>
		  <?php endif ?>
        </tr>
		<?php foreach ($this->data["Quality"] as $quality): ?>
			<tr>
				<?php $date_custom = explode(" ", $quality["date_custom"]); ?>
				<td width="80"><a href="/qualities/view/<?php echo $quality["id"]; ?>"><?php echo $date_custom[0]; ?></a></td>
				<td><?php echo $quality["person"]; ?></td>
				<td><?php echo $quality["comments"]; ?></td>
				<?php if ($username == "admin"): ?>
				<td width="40" align="center">
					<?php echo $html->link($html->image("/images/icon_edit.gif"), "/qualities/edit/{$quality["id"]}", array("escape" => false, "title" => "Editar Evaluación de Calidad")); ?>
					<?php echo $html->link($html->image("/images/icon_delete.gif"), "/qualities/delete/{$quality["id"]}", array("escape" => false, "title" => "Borrar Evaluación de Calidad"), "¿Estás seguro de querer borrar esta Evaluación de Calidad?"); ?>
				</td>
		  		<?php endif ?>
			</tr>
		<?php endforeach; ?>
      </table>
<!--END QUALITY TABLE-->
<?php endif; ?>

<?php if (!empty($this->data["Plague"])): ?>
<!--PLAGUE TABLE-->
      <h3 style="margin-bottom:0px;">Evaluaciones de Plaga</h3>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" id="data">
        <tr>
          <th width="80" scope="col"><a href="#">Fecha</a></th>
          <th width="100" scope="col"><a href="#">Persona</a></th>
          <th scope="col"><a href="#">Observaciones</a></th>
		  <?php if ($username == "admin"): ?>
          <th width="40" scope="col"><a href="#">Acciones</a></th>
		  <?php endif ?>
        </tr>
		<?php foreach ($this->data["Plague"] as $plague): ?>
			<tr>
				<?php $date_custom = explode(" ", $plague["date_custom"]); ?>
				<td width="80"><a href="/plagues/view/<?php echo $plague["id"]; ?>"><?php echo $date_custom[0]; ?></a></td>
				<td><?php echo $plague["person"]; ?></td>
				<td><?php echo $plague["comments"]; ?></td>
				<?php if ($username == "admin"): ?>
				<td width="40" align="center">
					<?php echo $html->link($html->image("/images/icon_edit.gif"), "/plagues/edit/{$plague["id"]}", array("escape" => false, "title" => "Editar Evaluación de Plaga")); ?>
					<?php echo $html->link($html->image("/images/icon_delete.gif"), "/plagues/delete/{$plague["id"]}", array("escape" => false, "title" => "Borrar Evaluación de Plaga"), "¿Estás seguro de querer borrar esta Evaluación de Plaga?"); ?>
				</td>
				<?php endif ?>
			</tr>
		<?php endforeach; ?>
      </table>
<!--END PLAGUE TABLE-->
<?php endif; ?>

<?php if (!empty($this->data["Event"])): ?>
<!--EVENT TABLE-->
      <h3 style="margin-bottom:0px;">Eventos</h3>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" id="data">
        <tr>
          <th width="80" scope="col"><a href="#">Fecha</a></th>
          <th width="100" scope="col"><a href="#">Persona</a></th>
          <th scope="col"><a href="#">Tipo de Evento</a></th>
		  <?php if ($username == "admin"): ?>
          <th width="40" scope="col"><a href="#">Acciones</a></th>
		  <?php endif ?>
        </tr>
		<?php foreach ($this->data["Event"] as $event): ?>
			<tr>
				<?php $date_custom = explode(" ", $event["date_custom"]); ?>
				<td width="80"><a href="/events/view/<?php echo $event["id"]; ?>"><?php echo $date_custom[0]; ?></a></td>
				<td><?php echo $event["person"]; ?></td>
				<td><?php echo $event_types[$event["type"]]; ?></td>
				<?php if ($username == "admin"): ?>
				<td width="40" align="center">
					<?php echo $html->link($html->image("/images/icon_edit.gif"), "/events/edit/{$event["id"]}", array("escape" => false, "title" => "Editar Evento")); ?>
					<?php echo $html->link($html->image("/images/icon_delete.gif"), "/events/delete/{$event["id"]}", array("escape" => false, "title" => "Borrar Evento"), "¿Estás seguro de querer borrar este Evento?"); ?>
				</td>
				<?php endif ?>
			</tr>
		<?php endforeach; ?>
      </table>
<!--END EVENT TABLE-->
<?php endif; ?>


    </div>
<!--END FORM ELEMENTS EXAMPLE-->     
    
  </div>
<!-- END LEFT CONTENT-->  

<!-- START RIGHT CONTENT - Widget menu -->    
  <div class="grid_3">
    <!-- ONLINE WIDGET -->
	<?php echo $this->element("silo_status", array("silo_status", $silo_status)); ?>
    <br />
    <!-- TODO WIDGET -->
	<?php if ($username == "admin"): ?>
	<?php echo $this->element("todos", array("section" => "silos/index", "silo_id" => $this->data["Silo"]["id"])); ?>
    <br />
	<?php endif ?>
    <!-- ACTIVITY WIDGET -->
    <!-- PHOTOS WIDGET -->
    <!-- <div class="widget" id="photos">
      <h3 class="photos">Fotos del Silo</h3>
      <p>
		<img alt="image" src="/img/silos/thumb1.jpg" width="50" height="50" />
		<img alt="image" src="/img/silos/thumb2.jpg" width="50" height="50" />
		<img alt="image" src="/img/silos/thumb3.jpg" width="50" height="50" />
		<img alt="image" src="/img/silos/thumb4.jpg" width="50" height="50" />
		<img alt="image" src="/img/silos/thumb5.jpg" width="50" height="50" />		
	  </p>
      <div class="clear"></div>
    </div>
    <br /> -->
  </div>
  <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->