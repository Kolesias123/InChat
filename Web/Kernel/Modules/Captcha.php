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

// Acci�n ilegal.
if(!defined("BEATROCK"))
	exit;	

class Captcha
{
	// Funci�n - Mostrar un reCaptcha.
	// - $key: Clave p�blica.
	public static function Show($key = '')
	{
		if(empty($key))
			$key = "6Ldow8ISAAAAAAtIlIoKPe-qBlizmygWH2ASb4Pv";
			
		echo "<script src=\"//www.google.com/recaptcha/api/challenge?k=$key\"></script>";
		BitRock::log("Se ha mostrado un c�digo de seguridad (Captcha).");
	}
	
	// Funci�n - Verificar si es correcta la respuesta reCaptcha.
	// - $key: Clave privada.
	public static function Verify($key = '')
	{
		require_once(MODS . 'External' . DS . 'recaptchalib.php');
		
		if(empty($key))
			$key = "6Ldow8ISAAAAAGAev8nhH4hEgpxY2WDflwRiVpnw";
		
		$r = recaptcha_check_answer($key, IP, $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
		return $r->is_valid;
	}
}
?>