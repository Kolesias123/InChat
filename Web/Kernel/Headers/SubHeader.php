<?php
#####################################################
## 					 BeatRock				   	   ##
#####################################################
## Framework avanzado de procesamiento para PHP.   ##
#####################################################
## InfoSmart © 2011 Todos los derechos reservados. ##
## http://www.infosmart.mx/						   ##
#####################################################
## http://beatrock.infosmart.mx/				   ##
#####################################################

// Acción ilegal.
if(!defined("BEATROCK"))
	exit;
	
echo Social::PrepareFacebook();
?>

<script src="https://apis.google.com/js/plusone.js">
  {lang: 'es-419'}
</script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

<div class="wrapper">
	<header>
		<figure>
			<img src="%LOGO%" />
		</figure>
		
		<section class="right">
			<span>
				<b>Alpha III</b> - <label id="users_count"><?php echo $site['users_online']; ?></label> usuarios conectados - <label id="rooms_count"><?php echo Users::CountRooms(); ?></label> salas creadas - Bienvenido <a href="%PATH%/profile" title="Editar mi perfil">%my_username%</a>.
			</span>
			
			<div class="ads">			
				<script>
				google_ad_client = "ca-pub-9402920437660061";
				google_ad_slot = "3238019541";
				google_ad_width = 468;
				google_ad_height = 60;
				</script>
				<script src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
			</div>
		</section>
		
		<div class="clear"></div>
		
		<nav>
			<a href="%PATH%">Inicio</a>
			<a href="%PATH%/new">Crea tu sala de chat</a>
			<a href="%PATH%/visit">Visita una sala de chat</a>
			<a href="%PATH%/status">Estado del servicio</a>
			<!--<a href="%PATH%/shop">Tienda</a>-->
			
			<div class="right">
				<div class="g-plusone" data-size="medium" data-href="%PATH%"></div>
				<a href="https://twitter.com/share" class="twitter-share-button" data-url="%PATH%" data-lang="es" data-related="Kolesias123" data-hashtags="InChat">Twittear</a>
			</div>
		</nav>
	</header>