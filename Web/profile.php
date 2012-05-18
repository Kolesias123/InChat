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

$rooms = Users::GetRooms();

$message = Core::theSession("profile_error");
$ok = Core::theSession("profile_ok");

if(!empty($message))
{
	Tpl::JavaAction('Kernel.ShowBox("error"); ');
	Core::delSession("profile_error");
}

if($ok == "true")
{
	Tpl::JavaAction('Kernel.ShowBox("correct"); ');
	Core::delSession("profile_ok");
}

if(empty($G['to']))
	$G['to'] = "info";
	
Tpl::JavaAction('showSection("' . $G['to'] . '"); ');

$page['id'] = "profile";
?>