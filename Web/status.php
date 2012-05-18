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

require('Init.php');

$page['id'] = "status";
$page['name'] = "Estado del servicio";

Tpl::addScript("$site[server_host]/socket.io/socket.io.js");
Tpl::addVar("Host", $site['server_host']);
?>