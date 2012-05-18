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

if(!BUsers::UserExist($G['id'], "sessionId"))
{
	$image = RESOURCES_SYS . "/images/photo.default";
	goto ShowImage;
}

$photo = BUsers::Data("photo", $G['id'], "sessionId");
$photo_time = BUsers::Data("photo_time", $G['id'], "sessionId");

if(!empty($photo_time) AND is_numeric($photo_time) AND isset($_SERVER['HTTP_IF_MODIFIED_SINCE']))
{	
	if(strtotime($_SERVER['HTTP_IF_MODIFIED_SINCE']) == $photo_time)
	{
		header("Last-Modified: " . gmdate('D, d M Y H:i:s', $photo_time). " GMT", true, 304);
		exit;
	}
}

$id = BUsers::Data("id", $G['id'], "sessionId");

if($photo == "photo.default")
{
	$image = RESOURCES_SYS . "/images/photo.default";
	goto ShowImage;
}

$image = RESOURCES . "/files/$id/$photo";

if($G['size'] == "small" OR $G['size'] == "big")
	$image .= "_$G[size]";

ShowImage: {		
	header("Content-type: image/png", true);
	header("Cache-Control: public, max-age=10800, pre-check=10800", true);
	header("Pragma: public", true);
	header("Expires: " . date(DATE_RFC822, strtotime("2 day")));
	header("Last-Modified: " . gmdate('D, d M Y H:i:s', $photo_time). " GMT", true);
	
	echo Io::Read("$image.png");
}
?>