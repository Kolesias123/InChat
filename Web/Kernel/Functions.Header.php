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
	
/*####################################################
##	INICIALIZACIÓN RECOMENDADA						##
####################################################*/

// Agregando jQuery
Tpl::addjQuery();

// Agregando recursos predeterminados dependiendo del visitante.
if($page['id'] !== "chat")
{
	if(Core::IsMobile() AND $site['site_mobile'] == "true")
	{
		Tpl::myStyle('style.mobile', true);
		Tpl::myScript('functions.kernel.mobile', true);
		
		Tpl::addMeta("viewport", "initial-scale=1,maximum-scale=1,user-scalable=no");
	}
	else
	{
		Tpl::myStyle('style', true);
		Tpl::myScript('functions.kernel', true);
	}
}

// Si queremos RSS...
if($site['site_rss'] == "true")
	Tpl::addStuff('<link rel="alternate" type="application/rss+xml" title="' . SITE_NAME . ': RSS" href="' . PATH . '/rss" />');

/*####################################################
##	AGREGANDO ESTILOS SEGÚN PÁGINA					##
####################################################*/

if($page['admin'])
{
	Tpl::myStyle('style.admin', true);

	if($page['id'] == "index")
	{
		Tpl::addScript('http://localhost:8001/socket.io/socket.io.js');
		Tpl::addVar("Server_Host", "localhost:8001");
	}
	
	Tpl::myScript('functions.admin', true);

	
}
else
{
	Tpl::addVar("NoTranslate", "true");
	
	if($page['id'] == "chat")
	{
		Tpl::myStyle("style.chat");
		Tpl::myStyle("style.chat.alerts");
		
		Tpl::addScript("$site[server_host]/socket.io/socket.io.js");
		Tpl::myScript("functions.alerts");
		Tpl::myScript("functions.chat");
	}
	else
	{
		Tpl::myStyle('style.forms');
		
		if($page['frame'] == true OR $page['id'] == "no_room")
		{
			Tpl::myStyle('style.frame');
		}
		else
		{		
			if($page['id'] == "new")
			{
				Tpl::myStyle('external/colorpicker');
				Tpl::myScript('external/colorpicker');
			}
				
			Tpl::myStyle('style.page');
			
			Tpl::myScript('functions.page');
		}
		
	}
}
?>