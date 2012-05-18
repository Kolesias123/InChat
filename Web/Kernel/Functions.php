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

// Si estamos o queremos visitar la administración.
if($page['admin'])
{
	/*
	if(!LOG_IN OR $my['rank'] < 7)
	{
		header("Location: " . PATH);
		exit;
	}
	*/
	
	$page['folder'] = "admin";
	$page['subheader'] = "Admin.SubHeader";
	$page['compress'] = false;

	$count = Array(
		Array(
			'Visitas totales' => Array("site_visits", ""),
			'Visitas (Escritorio)' => Array("site_visits", "WHERE type = 'desktop'"),
			'Visitas (Móvil)' => Array("site_visits", "WHERE type = 'mobile'"),
			'Visitas (BOT)' => Array("site_visits", "WHERE type = 'bot'")
		), 
		Array(
			'Errores' => Array("site_errors"),
			'Noticias' => Array("site_news"),
			'Cronometros' => Array("site_timers"),
			'Logs' => Array("site_logs")
		),
		Array(
			'Usuarios' => Array("users"),
			'Usuarios recientes' => Array("users", "WHERE account_birthday > '" . Core::Time(15, 4, true) . "'"),
			'Usuarios últimas 24 hrs' => Array("users", "WHERE account_birthday > '" . Core::Time(1, 4, true) . "'"),
			'Usuarios online' => Array("users", "WHERE lastonline > '$date[f]'")
		)
	);

	/*
	$new_skip = Array(
		"users" => Array("account_birthday", "lastaccess", "lastonline", "ip_address")
	);
	*/
}

// Descomente la siguiente línea para finjir ser un navegador movil.
//define("TEST_MOB", true);

if($page['system'] == true AND $P['password'] !== "InfoChat179179146")
	exit;
	
Social::Prepare(Array(
	"facebook" => Array(
		"appId" => "269469863119288",
		"secret" => "964a5407ea87afd33e577bbba0be7ee1"
	)
));

/*####################################################
##	INCLUYENDO MODULO PARA LA API					##
####################################################*/
?>