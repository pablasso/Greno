<?php $this->pageTitle = "{$this->data['Location']['name']} - AdaptiveRTC"; ?>

<?php $session->flash(); ?>

  <!-- START .grid_9 - LEFT CONTENT -->  
  <div class="grid_9 cnt" id="left">
    <h1>Ubicación: <?php echo $this->data['Location']['name']; ?></h1>
    <div id="lipsum">
      
	<p><strong>Dirección:</strong> <?php echo $this->data['Location']['address']; ?></p>
	<p><?php echo $this->data['Location']['description']; ?></p>

	<?php if (!empty($this->data['Silo'])): ?>
	<!--SILO TABLE-->
      <h3 style="margin-bottom:0px;">Silos en esta ubicación</h3>
      <table width="100%" border="0" cellpadding="0" cellspacing="0" id="data">
        <tr>
          <th width="100" scope="col">Nombre</th>
          <th scope="col">Marca</th>
          <th scope="col">Modelo</th>
		  <?php if ($username == "admin"): ?>
          <th width="40" scope="col">Acciones</th>
		  <?php endif ?>
        </tr>
		<?php foreach ($this->data['Silo'] as $silo): ?>
			<tr>
				<td><a href="/silos/view/<?php echo $silo["id"]; ?>"><?php echo $silo["name"]; ?></a></td>
				<td><?php echo $silo["brand"]; ?></td>
				<td><?php echo $silo["model"]; ?></td>
				<?php if ($username == "admin"): ?>
				<td width="40" align="center">
					<?php echo $html->link($html->image("/images/icon_edit.gif"), "/silos/edit/{$silo["id"]}", array("escape" => false, "title" => "Editar Silo")); ?>
					<?php echo $html->link($html->image("/images/icon_delete.gif"), "/silos/delete/{$silo["id"]}", array("escape" => false, "title" => "Borrar Silo"), "¿Estás seguro de querer borrar este silo?"); ?>
				</td>
				<?php endif ?>
			</tr>
		<?php endforeach; ?>
      </table>
	<!--END SILO TABLE-->
	<?php endif; ?>

    </div>
<!--END FORM ELEMENTS EXAMPLE-->     
    
  </div>
<!-- END LEFT CONTENT-->  

<!-- START RIGHT CONTENT - Widget menu -->    
  <div class="grid_3">
	<?php if ($username == "admin"): ?>
    <!-- TODO WIDGET -->
	<?php echo $this->element("todos", array("section" => "locations/view", "location_id" => $this->data['Location']['id'])); ?>
    <br />
	<?php endif ?>
    <!-- MAP WIDGET -->
    <div class="widget">
    	<h3>Mapa</h3>
		<?php echo $this->data['Location']['map']; ?>
    </div>
    <br />
  </div>
  <!-- end .grid_13 - RIGHT CONTENT - Widget menu  -->