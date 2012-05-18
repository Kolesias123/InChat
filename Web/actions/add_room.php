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

$sett = json_decode($_POST['settings'], true);
$style = json_decode($_POST['style'], true);

unset($sett['undefined'], $style['undefined'], $style['apply']);

if(empty($sett['name']) OR strlen($sett['name']) > 100)
	$error[] = "El nombre de la sala no es válido.";
	
if(!empty($sett['radio']) AND !Core::isValid($sett['radio'], "url"))
	$error[] = "La dirección de la radio no es válida.";
	
if(!empty($sett['web']) AND !Core::isValid($sett['web'], "url"))
	$error[] = "La dirección web no es válida.";
	
if($style['box_trans'] < 0 OR $style['box_trans'] > 100 OR !is_numeric($style['box_trans']))
	$error[] = "La transparencia de los cuadros no es válida.";
	
$_POST["recaptcha_challenge_field"] = $style['recaptcha_challenge_field'];
$_POST["recaptcha_response_field"] = $style['recaptcha_response_field'];

$captcha = Captcha::Verify();

if(!$captcha)
	$error[] = "El código de seguridad no es válido.";
	
if(empty($error))
{
	unset($style['recaptcha_challenge_field'], $style['recaptcha_response_field']);
	
	$sett = FilterText($sett);
	$style = FilterText($style);
	
	$settings = mysql_real_escape_string(json_encode($sett));
	$style2 = mysql_real_escape_string(json_encode($style));
	
	$result = Users::AddRoom($sett['name'], $sett['desc'], $sett['visible'], $settings, $style2);
	$status = "OK";
	
	Curl::Init("https://graph.facebook.com/me/infosmart_inchat:create");
	 Curl::Post(Array(
	"access_token" => "AAAD1FNd4CbgBAPtkFZCGYkNyCXzITGVOY7f8OXOUWmtEUPZACGe89v1MnpvizmJQuUpD1CQTgaBGC4Ix9iHxZBZCF1W7ZBrQJtZAt7hVSgNkjPvRJBw7II",
	"sala_de_chat" => PATH . "/room/$result",
	));
}
else
{
	$result = "";
	
	foreach($error as $e)
		$result .= utf8_encode("<li>$e</li>");
		
	$status = "ERROR";
}

$final = Array(
	"status" => $status,
	"result" => $result
);

echo json_encode($final);
?>