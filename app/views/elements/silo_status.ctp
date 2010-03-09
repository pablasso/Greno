<?php if ($silo_status["is_online"]): ?>
	<div class="silo_online">
		Silo en Línea
	</div>
<?php else: ?>
	<?php $message = ""; ?>
	
	<?php if ($silo_status["last_request"]): ?>
		<?php $difference = round((time() - strtotime($silo_status["last_request"]))/60); ?>
		<?php $message = "desde hace {$difference} minutos"; ?>
	<?php endif ?>
	
	<div class="silo_offline">
		Silo fuera de Línea <?php echo $message ?>
	</div>
<?php endif ?>