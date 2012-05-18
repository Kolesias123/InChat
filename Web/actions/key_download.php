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

$hash = Core::Encrypte(MY_SESSIONID);
$hash = Core::Encrypte($hash);
$hash = base64_encode($hash);

header("Content-Type: text/plain");
header("Content-Disposition: attachment;filename=\"InChat_Key.ikey\"\n");
header("Accept-Ranges: bytes");

echo $hash;
?>