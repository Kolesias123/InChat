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

$userId = BUsers::Only("id", $P['userHash'], "hash_secret");
$room = Users::GetRoom($P['roomId']);

if(!is_numeric($userId) OR $room == false)
	exit("ERROR");
	
$room = mysql_fetch_assoc($room);

if($userId !== $room['ownerId'])
	exit("ERROR");
	
echo "OK";
?>