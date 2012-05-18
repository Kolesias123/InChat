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

require('../Init.php');

if(empty($P['sessionId']) OR strlen($P['sessionId']) < 40)
	exit("ERROR");
	
$names = Array(
	'UsuaritoFeliz',
	'GingerCloud',
	'DJChat',
	'InYellow',
	'HelloMe',
	'KittyCloud'
);
	
$username = Core::SelectRandom($names)  . rand(1, 9);
BUsers::NewUser($P['sessionId'],  $username, "", "");

echo $username;
?>