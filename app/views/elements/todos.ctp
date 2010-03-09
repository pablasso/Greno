<?php

switch ($section) {
	case "locations/index":
	case "locations/edit":
		$todos["/locations/add"] = "Agregar una Ubicación";
		break;
	case "locations/view":
	case "silos/edit":
		$todos["/silos/add/{$location_id}"] = "Agregar un Silo";
		break;
	case "silos/index":
	case "qualities/view":
	case "plagues/view":
	case "events/view":
	case "qualities/edit":
	case "plagues/edit":
	case "events/edit":
		$todos["/configurations/edit/{$silo_id}"] = "Modificar Configuración";
		$todos["/qualities/add/{$silo_id}"] = "Agregar Evaluación de Calidad";
		$todos["/plagues/add/{$silo_id}"] = "Agregar Evaluacíón de Plaga";
		$todos["/events/add/{$silo_id}"] = "Agregar Evento";
		break;
	case "configurations/edit":
		$todos["/qualities/add/{$silo_id}"] = "Agregar Evaluación de Calidad";
		$todos["/plagues/add/{$silo_id}"] = "Agregar Evaluacíón de Plaga";
		$todos["/events/add/{$silo_id}"] = "Agregar Evento";
		break;
	case "qualities/add":
		$todos["/configurations/edit/{$silo_id}"] = "Modificar Configuración";
		$todos["/plagues/add/{$silo_id}"] = "Agregar Evaluacíón de Plaga";
		$todos["/events/add/{$silo_id}"] = "Agregar Evento";
		break;
	case "plagues/add":
		$todos["/configurations/edit/{$silo_id}"] = "Modificar Configuración";
		$todos["/qualities/add/{$silo_id}"] = "Agregar Evaluación de Calidad";
		$todos["/events/add/{$silo_id}"] = "Agregar Evento";
		break;
	case "events/add":
		$todos["/configurations/edit/{$silo_id}"] = "Modificar Configuración";
		$todos["/qualities/add/{$silo_id}"] = "Agregar Evaluación de Calidad";
		$todos["/plagues/add/{$silo_id}"] = "Agregar Evaluacíón de Plaga";
		break;
	default:
		$todos = array();
		break;
}

?>
<div class="widget">
	<h3>Tareas</h3>
	<?php foreach ($todos as $url => $todo): ?>
		<a href="<?php echo $url; ?>" class="view_all"><?php echo $todo; ?></a>
	<?php endforeach ?>
</div>