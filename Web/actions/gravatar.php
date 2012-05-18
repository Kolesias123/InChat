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

if(empty($P['email']))
	$P['email'] = $my['email'];
	
//$default = RESOURCES_SYS . "/images/photo.default";
$default = "mm";
	
$photo40 = Io::Read(Users::GetGravatar($P['email'], "", 40, $default));
$photo80 = Io::Read(Users::GetGravatar($P['email'], "", 80, $default));
$photo150 = Io::Read(Users::GetGravatar($P['email'], "", 150, $default));

$files_path = "../$site[files_path]/$my[id]";
@mkdir($files_path);

$name = md5($photo80);

Io::Write("$files_path/$name.png", $photo80);
Io::Write("$files_path/" . $name . "_small.png", $photo40);
Io::Write("$files_path/" . $name . "_big.png", $photo150);

BUsers::Update(Array(
	"photo" => $name,
	"photo_time" => mktime()
));

echo Users::GetGravatar($P['email'], "", 80, $default);
?>