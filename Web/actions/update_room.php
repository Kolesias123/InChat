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

$room = Users::GetRoom($P['roomId']);

if($room == false)
	Core::Redirect("/");
	
$room = mysql_fetch_assoc($room);

if($room['ownerId'] !== MY_ID)
	Core::Redirect("/room/$room[id]");

if(empty($P['name']) OR strlen($P['name']) > 100)
	$error[] = "El nombre de la sala no es válido.";
	
if(!empty($P['radio']) AND !Core::isValid($P['radio'], "url"))
	$error[] = "La dirección de la radio no es válida.";
	
if(!empty($P['web']) AND !Core::isValid($P['web'], "url"))
	$error[] = "La dirección web no es válida.";

/*	
if($style['box_trans'] < 0 OR $style['box_trans'] > 100 OR !is_numeric($style['box_trans']))
	$error[] = "La transparencia de los cuadros no es válida.";
*/

	
if(empty($error))
{	
	$settings = mysql_real_escape_string(json_encode($_POST));
	$style = mysql_real_escape_string($room['style']);
	
	Users::UpdateRoom($P['roomId'], Array(
		"name" => $P['name'],
		"description" => $P['desc'],
		"in_list" => $P['visible'],
		"options" => $settings,
		"style" => $style
	));
}
else
{
	$message = "";
	
	foreach($error as $e)
		$message .= "<li>$e</li>";
		
	Core::theSession("chat_error", $message);
}

Core::Redirect("/room/$room[id]");
?>