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

$key = $_FILES['file'];

if(empty($key))
	Core::Redirect("/profile");
	
if($key['type'] !== "application/octet-stream")
{
	Core::theSession("profile_error", "El archivo de la clave no es válido.");
	Core::Redirect("/profile");
}
	
$hash = Io::Read($key['tmp_name']);
$hash = base64_decode($hash);
$hash = Core::Decrypt($hash);
$hash = Core::Decrypt($hash);

if(strlen($hash) !== 50)
{
	Core::theSession("profile_error", "El archivo de la clave no es válido.");
	Core::Redirect("/profile");
}

Core::theCookie("login_sessionId", Core::Encrypte($hash));
Core::Redirect("/profile");
?>