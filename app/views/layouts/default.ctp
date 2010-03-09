<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title><?php echo $title_for_layout; ?></title>
	<link href="/css/reset.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/css/text.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/css/960.css" rel="stylesheet" type="text/css" media="all" />
	<link href="/css/green.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" type="text/css" href="/ui/css/sleek/style.css"/>
	<link href="/css/custom.css" rel="stylesheet" type="text/css" media="all" />
	<script src="/ui/jquery-1.3.2.min.js" type="text/javascript"></script>
	<script src="/ui/jquery-ui-1.7.1.custom.js" type="text/javascript"></script>
	<script src="/js/components.js" type="text/javascript"></script>
	<script src="/js/effects.js" type="text/javascript"></script>
	<!--[if IE 6]>
	<style type="text/css" >
	p.error span, p.info span, p.notice span, p.success span { 
		postion:static;
	    margin-right:15px;
	}
	p.todoitem a.close {
		margin-right:10px;
	}
	button.green, button.brown {
		padding:0px !important;
	}
	</style>
	<![endif]-->
</head>

<body>
<!-- start .grid_12 - the container -->
<div class="container_12">
<div class="grid_5">
	<img alt="image" src="/images/loogo.jpg" width="380" height="100" border="0" /></div>
	<!-- end .grid_5 -->
	<div class="grid_7" id="login_data">
  <p>
    <strong>¡Bienvenido!</strong><br />
	    <!-- <a href="#"><strike><strong>Perfil</strong></strike></a><strong>  -->| <a href="/users/logout">Salir</a></strong></p>
</div>
	<!-- end .grid_7 - HEADER -->
	<div class="clear"></div>
  <div class="grid_12">
    <ul id="menu">	
   	    <li><a href="/locations" class="active">Ubicaciones</a></li>
          <!-- <li><a href="#"><strike>Configuraciones</strike></a></li>
          <li><a href="#"><strike>Usuarios</strike></a></li> -->
    </ul>
    
  </div>
	<div style="margin-bottom:70px;"></div>
  <div class="clear"></div>

	<?php echo $content_for_layout ?>

  <div class="clear"></div>
  <!--FOOTER START-->
  <div class="grid_12 cnt" id="footer">Esta es una versión BETA. Copyright <a href="http://adaptivertc.com">AdaptiveRTC</a> 2009.</div>
  <!--FOOTER END-->
  <div class="clear"></div>
</div>
</body>
</html>