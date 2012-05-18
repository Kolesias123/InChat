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

$page['system'] = true;
require('../Init.php');

$get = BUsers::User($P['userId'], "sessionId");

if($get == false)
	exit("NOT_FOUND");
	
echo json_encode($get);
?>