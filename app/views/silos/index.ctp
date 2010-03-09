<?php $this->pageTitle = "Silo 100 - AdaptiveRTC"; ?>

<?php $session->flash(); ?>

  <!-- START .grid_9 - LEFT CONTENT -->  
  <div class="grid_9 cnt" id="left">
    <h1>Silo: Silo 100</h1>
    <div id="lipsum">

	<p>
		<strong>Marca:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />
		<strong>Modelo:</strong> Lorem ipsum dolor sit amet.<br />
		<strong>Motores:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.<br />
		<strong>Variadores:</strong> Lorem ipsum dolor sit amet.
	</p>

<!--TEMPERATURE GRAPH-->
	<div align="center" style="margin:15px;">
		<?php echo $this->element("silo_graph", array("floats" => $floats)); ?>
	</div>
      
	<p>
		El silo de torre es una estructura de generalmente 4 a 8 m de diámetro y 10 a 25 m de altura. Puede construirse de materiales tales como vigas de madera, hormigón, vigas de hormigón, y chapa galvanizada ondulada. Estos materiales tienen diferencias en su precio, durabilidad y la hermeticidad resultante.
	</p>

<!--LOCATION IMAGE-->
	<div align="center" style="margin:15px;">
		<?php echo $html->image("silos/silo_example.png"); ?>
	</div>
 
<?php if (!empty($qualities)): ?>
<!--QUALITY TABLE-->
      <h3 style="margin-bottom:0px;">Evaluaciones de Calidad</h3>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" id="data">
        <tr>
          <th width="80" scope="col"><a href="#">Fecha</a></th>
          <th width="100" scope="col"><a href="#">Persona</a></th>
          <th scope="col"><a href="#">Observaciones</a></th>
          <th width="40" scope="col"><a href="#">Acciones</a></th>
        </tr>
		<?php foreach ($qualities as $quality): ?>
			<tr>
				<?php $date_custom = explode(" ", $quality["Quality"]["date_custom"]); ?>
				<td width="80"><a href="/qualities/view/<?php echo $quality["Quality"]["id"]; ?>"><?php echo $date_custom[0]; ?></a></td>
				<td><?php echo $quality["Quality"]["person"]; ?></td>
				<td><?php echo $quality["Quality"]["comments"]; ?></td>
				<td width="40" align="center">
					<?php echo $html->link($html->image("/images/icon_edit.gif"), "/qualities/edit/{$quality["Quality"]["id"]}", array("escape" => false, "title" => "Editar Evaluación de Calidad")); ?>
					<?php echo $html->link($html->image("/images/icon_delete.gif"), "/qualities/delete/{$quality["Quality"]["id"]}", array("escape" => false, "title" => "Borrar Evaluación de Calidad"), "¿Estás seguro de querer borrar esta Evaluación de Calidad?"); ?>
				</td>
			</tr>
		<?php endforeach; ?>
      </table>
<!--END QUALITY TABLE-->
<?php endif; ?>

<?php if (!empty($plagues)): ?>
<!--PLAGUE TABLE-->
      <h3 style="margin-bottom:0px;">Evaluaciones de Plaga</h3>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" id="data">
        <tr>
          <th width="80" scope="col"><a href="#">Fecha</a></th>
          <th width="100" scope="col"><a href="#">Persona</a></th>
          <th scope="col"><a href="#">Observaciones</a></th>
          <th width="40" scope="col"><a href="#">Acciones</a></th>
        </tr>
		<?php foreach ($plagues as $plague): ?>
			<tr>
				<?php $date_custom = explode(" ", $plague["Plague"]["date_custom"]); ?>
				<td width="80"><a href="/plagues/view/<?php echo $plague["Plague"]["id"]; ?>"><?php echo $date_custom[0]; ?></a></td>
				<td><?php echo $plague["Plague"]["person"]; ?></td>
				<td><?php echo $plague["Plague"]["comments"]; ?></td>
				<td width="40" align="center">
					<?php echo $html->link($html->image("/images/icon_edit.gif"), "/plagues/edit/{$plague["Plague"]["id"]}", array("escape" => false, "title" => "Editar Evaluación de Plaga")); ?>
					<?php echo $html->link($html->image("/images/icon_delete.gif"), "/plagues/delete/{$plague["Plague"]["id"]}", array("escape" => false, "title" => "Borrar Evaluación de Plaga"), "¿Estás seguro de querer borrar esta Evaluación de Plaga?"); ?>
				</td>
			</tr>
		<?php endforeach; ?>
      </table>
<!--END PLAGUE TABLE-->
<?php endif; ?>

<?php if (!empty($events)): ?>
<!--EVENT TABLE-->
      <h3 style="margin-bottom:0px;">Eventos</h3>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" id="data">
        <tr>
          <th width="80" scope="col"><a href="#">Fecha</a></th>
          <th width="100" scope="col"><a href="#">Persona</a></th>
          <th scope="col"><a href="#">Tipo de Evento</a></th>
          <th width="40" scope="col"><a href="#">Acciones</a></th>
        </tr>
		<?php foreach ($events as $event): ?>
			<tr>
				<?php $date_custom = explode(" ", $event["Event"]["date_custom"]); ?>
				<td width="80"><a href="/events/view/<?php echo $event["Event"]["id"]; ?>"><?php echo $date_custom[0]; ?></a></td>
				<td><?php echo $event["Event"]["person"]; ?></td>
				<td><?php echo $event_types[$event["Event"]["type"]]; ?></td>
				<td width="40" align="center">
					<?php echo $html->link($html->image("/images/icon_edit.gif"), "/events/edit/{$event["Event"]["id"]}", array("escape" => false, "title" => "Editar Evento")); ?>
					<?php echo $html->link($html->image("/images/icon_delete.gif"), "/events/delete/{$event["Event"]["id"]}", array("escape" => false, "title" => "Borrar Evento"), "¿Estás seguro de querer borrar este Evento?"); ?>
				</td>
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
	<?php echo $this->element("todos", array("section" => "silos/index")); ?>
    <br />
    <!-- ACTIVITY WIDGET -->
    <!-- PHOTOS WIDGET -->
    <div class="widget" id="photos">
      <h3 class="photos">Fotos del Silo</h3>
      <p>
		<img alt="image" src="/img/silos/thumb1.jpg" width="50" height="50" />
		<img alt="image" src="/img/silos/thumb2.jpg" width="50" height="50" />
		<img alt="image" src="/img/silos/thumb3.jpg" width="50" height="50" />
		<img alt="image" src="/img/silos/thumb4.jpg" width="50" height="50" />
		<img alt="image" src="/img/silos/thumb5.jpg" width="50" height="50" />		
	  </p>
      <div class="clear"></div>
      <!-- <a href="#" class="view_all"><strike>Ver todas las fotos</strike></a> -->
    </div>
    <br />
  </div>
  <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->