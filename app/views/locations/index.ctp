<?php $this->pageTitle = "Silos Carretera a Guadalajara - AdaptiveRTC"; ?>

<?php $session->flash(); ?>

<!-- START .grid_9 - LEFT CONTENT -->  
<div class="grid_9 cnt" id="left">
	<h1>Ubicaciones</h1>
	<div id="lipsum">
      
	<?php if (!empty($locations)): ?>
	<!--QUALITY TABLE-->
	      <table width="100%" border="0" cellpadding="0" cellspacing="0" id="data">
	        <tr>
	          <th width="200" scope="col">Nombre</th>
	          <th scope="col">Dirección</th>
	          <th scope="col">Silos</th>
			  <?php if ($username == "admin"): ?>
	          <th width="40" scope="col">Acciones</th>
			  <?php endif ?>
	        </tr>
			<?php foreach ($locations as $location): ?>
				<tr>
					<td><a href="/locations/view/<?php echo $location["Location"]["id"]; ?>"><?php echo $location["Location"]["name"]; ?></a></td>
					<td><?php echo $location["Location"]["address"]; ?></td>
					<td><?php echo count($location["Silo"]); ?></td>
					<?php if ($username == "admin"): ?>
					<td width="40" align="center">
						<?php echo $html->link($html->image("/images/icon_edit.gif"), "/locations/edit/{$location["Location"]["id"]}", array("escape" => false, "title" => "Editar Ubicación")); ?>
						<?php echo $html->link($html->image("/images/icon_delete.gif"), "/locations/delete/{$location["Location"]["id"]}", array("escape" => false, "title" => "Borrar Ubicación"), "¿Estás seguro de querer borrar esta ubicación?"); ?>
					</td>
					<?php endif ?>
				</tr>
			<?php endforeach; ?>
	      </table>
	<!--END QUALITY TABLE-->
	<?php endif; ?>

    </div>
<!--END FORM ELEMENTS EXAMPLE-->     
    
  </div>
<!-- END LEFT CONTENT-->  

<!-- START RIGHT CONTENT - Widget menu -->    
  <div class="grid_3">
    <!-- TODO WIDGET -->
	<?php if ($username == "admin"): ?>
	<?php echo $this->element("todos", array("section" => "locations/index")); ?>
    <br />
	<?php endif ?>
    <!-- ACTIVITY WIDGET -->
    <!-- <div class="widget">
    	<h3>Actividad Reciente</h3>
  		 <a href="/locations" class="view_all">Silos Carretera a Guadalajara</a>
    </div>
    <br /> -->
  </div>
  <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->