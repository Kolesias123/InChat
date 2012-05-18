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

if($G['userId'] == MY_SESSIONID)
	Core::Redirect("/actions/edit_profile.php");
	
$verify = BUsers::Only("username", $G['userId'], "sessionId");
$room = Users::GetRoom($G['roomId']);
	
if(empty($G['userId']) OR empty($verify))
	exit('<script>parent.Alert.Close();</script>');
	
$user = BUsers::User($G['userId'], "sessionId");

foreach($user as $param => $value)
	Tpl::Set("user_$param", $value);
	
if($room !== false)
	$room = mysql_fetch_assoc($room);
	
if($_SESSION['owner'][$G['roomId']] == true OR $room['ownerId'] == MY_ID)
	$owner = true;

$page['id'] = "view_profile";
$page['subheader'] = "none";
$page['footer'] = false;
$page['frame'] = true;
?>