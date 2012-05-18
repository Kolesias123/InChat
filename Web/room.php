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

$room = Users::GetRoom($G['id']);

if($room == false OR !is_numeric($G['id']))
	Core::Redirect("/");
	
$info = mysql_fetch_assoc($room);

foreach($info as $param => $value)
	Tpl::Set("room_$param", $value);
	
$options = json_decode($info['options'], true);
$style = json_decode($info['style'], true);

$error = Core::theSession("chat_error");

if(!empty($error))
{
	Tpl::JavaAction('K.ShowBox("error"); ');
	Core::delSession("chat_error");
}

Tpl::addMeta("og:type", "infosmart_inchat:room", "property");
	
$page['name'] = "Sala: $info[name]";
$page['id'] = "room";
?>