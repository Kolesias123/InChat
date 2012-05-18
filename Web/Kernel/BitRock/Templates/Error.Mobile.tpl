<?php
#####################################################
## 					 BeatRock				   	   ##
#####################################################
## Framework avanzado de procesamiento para PHP.   ##
#####################################################
## InfoSmart � 2011 Todos los derechos reservados. ##
## http://www.infosmart.mx/						   ##
#####################################################
## http://beatrock.infosmart.mx/				   ##
#####################################################

// Acci�n ilegal.
if(!defined("BEATROCK"))
	exit;
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html>
<head>
	<title>�Uy! Algo aqu� anda mal...</title>
	
	<meta http-equiv="content-type" content="text/html; charset=iso-8859-15" />
	<meta http-equiv="content-language" content="es" />
	
	<meta name="generator" content="" />
	<meta name="robots" content="noodp, nofollow" />
	
	<meta name="publisher" content="InfoSmart." />
	<meta name="copyright" content="� 2011 InfoSmart. Desarrollado con BeatRock">

	<!--<link href="//resources.infosmart.mx/system/css/style.mobile.css" rel="stylesheet" />-->
	<link href="//infosmart.zapto.org/resources/system/css/style.mobile.css" rel="stylesheet" />
	<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no" />
	
	<style>
	body {
		font-size: 13px;
	}
	
	header {
		padding: 5px 15px;
		background: #6E6E6E;
		
		border: 1px solid #A4A4A4;
		border-top: 0;
		
		border-radius: 0 0 5px 5px;
		margin-bottom: 10px;
		
		text-align: center;
	}
	
	header h1 {
		font-size: 25px;
		line-height: 30px;
		
		font-weight: normal;
		color: #8A0808;
		
		text-shadow: 0 1px 1px white;
	}

	.box .c1 {
		float: left;
		width: 550px;
	}
	
	.box .c2 {
		float: right;
		width: 300px;
	}
	
	.box section {
		margin: 30px 0;
	}
	
	.box section h2 {
		color: #666;
		font-size: 21px;
		
		border-bottom: 2px solid #A4A4A4;
		padding-bottom: 10px;
		
		font-weight: normal;
		text-shadow: 0 1px 1px rgba(255, 255, 255, .3);
	}
	
	.box section h3 {
		font-size: 20px;
		color: #298A08;
		
		font-weight: normal;
		text-shadow: 0 1px 1px white;
	}
	
	.box section figure {
		float: right;
	}
	
	.box .console {
		color: black;
		font-family: "Consolas", Segoe UI, Arial, sans-serif;
	}
	
	.box .more b {
		font-size: 14px;
		display: block;
	}
	
	.box .about b {
		font-size: 16px;
		display: block;
		
		text-shadow: 0 1px 1px rgba(255, 255, 255, .4);
	}
	
	footer {
		font-size: 12px;
		border-top: 1px solid #F2F2F2;
		
		padding: 10px 0;
		color: gray;
	}
	</style>
</head>
<body>
	<div class="page">
		<div class="wrapper">
			<header class="bx">
				<h1>
					Houston, tenemos un problema...
				</h1>
			</header>
			
			<div class="box">
				<figure class="center">
					<img src="//resources.infosmart.mx/system/images/error/Sad.png" title="�Oops!" alt="�Oops!" />
				</figure>
					
				<p>
					�OMG! Lo sentimos pero ha ocurrido un problema interno que no hemos podido solucionar automaticamente y no es posible continuar.
				</p>
					
				</p>
					Puedes volver a intentarlo m�s tarde o tratar de avisar del problema a uno de nuestros ingenieros.
				</p>
					
				<section>						
					<h2>�Qu� ha pasado?</h2>
						
					<p class="about">
						<b>%title%. (<?php echo $code; ?>)</b>%details%
					</p>
				</section>
					
				<section>
					<h2>M�s informaci�n</h2>
						
					<p class="more">
						<?php
						if(is_array($res))
						{
							foreach($res as $param => $value)
							{
								if($param == "response")
									$param = "Respuesta";
								if($param == "file")
									$param = "Archivo / Directorio";
								if($param == "function")
									$param = "Funci�n";
								if($param == "line")
									$param = "L�nea";
								if($param == "out_file")
									$param = "Archivo de salida";
								if($param == "query")
									$param = "�ltima consulta MySQL";
						?>
						<b><?php echo $param; ?>:</b> <?php echo $value; ?><br />
						<?php } } ?>
						
						<b>Navegador web:</b> <?php echo Core::GetBrowser(); ?><br />
						<b>Sistema operativo:</b> <?php echo Core::GetOS(); ?><br />
							
						<b>Versi�n del Kernel:</b> <?php echo $Info['version.full']; ?>
					</p>
						
					<p>
						Si hay m�s informaci�n disponible proporcionesela a un ingeniero o sitio de reporte de errores para solucionar el problema m�s f�cilmente.
					</p>
				</section>

				<section>
					<h2>Anuncios</h2>
					
					<div class="center">
					<script type="text/javascript">
					  // XHTML should not attempt to parse these strings, declare them CDATA.
					  /* <![CDATA[ */
					  window.googleAfmcRequest = {
						client: 'ca-mb-pub-9402920437660061',
						format: '320x50_mb',
						output: 'html',
						slotname: '7791490277',
					  };
					  /* ]]> */
					</script>
					<script type="text/javascript"    src="http://pagead2.googlesyndication.com/pagead/show_afmc_ads.js"></script>
					</div>
				</section>
					
				<?php if($mail_result) { ?>
				<section>
					<h3>�Ayuda en camino!</h3>
					<p>
						El problema ha sido reportado por correo electr�nico y trataremos de resolverlo este problema lo m�s pronto posible.
					</p>
						
					<p>Para m�s informaci�n y reporte de otros problemas por favor envie un correo electr�nico a: <a href="mailto:<?php echo $config['errors']['email.to']; ?>"><?php echo $config['errors']['email.to']; ?></a></p>
				</section>
				<?php } ?>
					
				<section>
					<p>Por favor vuelva a la <a onclick="history.back()">p�gina anterior</a> o a la <a href="<?php echo PATH; ?>">p�gina de inicio</a>.</p>
				</section>
			</div>
			
			<footer>
				<label class="left">
					<a href="http://www.infosmart.mx/" target="_blank">InfoSmart</a>. Todos los derechos reservados.
				</label>
				
				<label class="right">
					<a href="http://beatrock.infosmart.mx/" target="_blank">BeatRock</a>
				</label>
			</footer>
		</div>
	</div>
</body>
</html>