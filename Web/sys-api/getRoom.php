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

$room = Users::GetRoom($P['roomId']);

if($room == false OR !is_numeric($P['roomId']))
	exit("ERROR");
	
$room = mysql_fetch_assoc($room);
echo json_encode($room);
?>