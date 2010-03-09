<?php $this->pageTitle = "AdaptiveRTC"; ?>

<div id="container">
	<div class="login_form">
		<h1>Area restringida</h1>
		<?php if ( isset($error_login) ): ?>
			<p class="error">¡Usuario o contraseña incorrecta!</p>
		<?php endif; ?>
		
		<?php echo $form->create('User', array("action" => "login")); ?>
			<?php echo $form->input('username', array("label" => "Usuario", "class" => "inputText")); ?>
			<label>Contraseña</label>
			<?php echo $form->password('password', array("class" => "inputText")); ?>
			<br clear="all" />
			<button type="submit" class="green">Entrar</button>
			<p><a href="#">¿Olvidaste tu usuario o tu contraseña?</a></p>
		</form>
	</div>
</div>