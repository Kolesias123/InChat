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

$page['id'] = "new";

$roomId = Core::Random(80);
Tpl::addVar("roomId", $roomId);

$_SESSION['owner'][$roomId] = true;
$bgs = Array("wallpaper-1460086", "wallpaper-1468366", "wallpaper-1492672", "wallpaper-1561361");
?>