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
	
if(!Core::isValid($P['email']))
	$error[] = "El correo electrónico no es válido.";
	
if(empty($error))
{
	$P['photo'] = Users::SavePhoto($photo);
	
	if(is_numeric($P['facebookId']))
		$P['photo'] = Users::UrlPhoto("http://graph.facebook.com/$P[facebookId]/picture?type=large");
	
	if($P['photo'] == false)
		$P['photo'] = $my['photo'];
	
	BUsers::Update(Array(
		'username' => $P['username'],
		'name' => $P['name'],
		'email' => $P['email'],
		'photo' => $P['photo'],
		'photo_time' => mktime()
	));
	
	Core::theSession("profile_ok", "true");
}
else
{
	$message = "";
	
	foreach($error as $e)
		$message .= "<li>$e</li>";
		
	Core::theSession("profile_error", $message);
}

Core::Redirect("/profile");
?>