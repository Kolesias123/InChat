<?php
#####################################################
## 					 BeatRock				   	   ##
#####################################################
## Framework avanzado de procesamiento para PHP.   ##
#####################################################
## InfoSmart � 2012 Todos los derechos reservados. ##
## http://www.infosmart.mx/						   ##
#####################################################
## http://beatrock.infosmart.mx/				   ##
#####################################################

require('../Init.php');

// Direcci�n a visitar codificada en Base64.
$url = base64_decode($RC['toUrl']);

// �No hay direcci�n?	
if(empty($url))
	exit;

// Informaci�n a enviar.
$post = $_REQUEST;

// Visitando sitio y devolviendo respuesta.
Curl::Init($url);
echo Curl::Post($post);
?>