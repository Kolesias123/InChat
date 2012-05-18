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

$photo = $_FILES['photo'];

if(!Core::isValid($P['username'], "username"))
	$error[] = "El nombre de usuario no es válido.";
	
if(empty($error))
{
	$P['photo'] = Users::SavePhoto($photo);
	
	if($P['photo'] == false)
		$P['photo'] = $my['photo'];
	
	BUsers::Update(Array(
		'username' => $P['username'],
		'photo' => $P['photo'],
		'photo_time' => mktime()
	));
	
	exit('<script>parent.ApplyProfile(\'' . json_encode($P) . '\');</script>');
}

Core::Redirect("/actions/edit_profile.php");
?>