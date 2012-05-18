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

$message = $PC['message'];

if($P['wordsfilter'] == "true")
	$message = Core::FilterString($message);
	
if($P['bbc'] == "true")
	$message = Core::BBCode($message);

$message = Core::ToURL($message);
	
if($P['smilies'] == "true")
	$message = Core::Smilies($message);
	
echo $message;
?>