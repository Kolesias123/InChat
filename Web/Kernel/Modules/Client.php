<?php
#####################################################
## 					 BeatRock				   	   ##
#####################################################
## Framework avanzado de procesamiento para PHP.   ##
#####################################################
## InfoSmart � 2011 Todos los derechos reservados. ##
## http://www.infosmart.mx/						   ##
#####################################################
## http://beatrock.infosmart.mx/				   ##
#####################################################

// Acci�n ilegal.
if(!defined("BEATROCK"))
	exit;	

class Client
{
	// Funci�n - Guardar parametros "POST".
	public static function SavePost()
	{
		global $site;		
		$a = !empty($site['session_alias']) ? $site['session_alias'] : ROOT;
		
		foreach($_POST as $param => $value)
			$_SESSION[$a . "POST"][$param] = $value;
	}
	
	// Funci�n - Obtener parametros "POST" guardados.
	public static function GetPost()
	{
		global $site;		
		$a = !empty($site['session_alias']) ? $site['session_alias'] : ROOT;
		
		if(empty($_SESSION[$a . "POST"]))
			return;
		
		foreach($_SESSION[$a . "POST"] as $param => $value)
		{
			if(empty($value))
				continue;
				
			$_POST[$param] = $value;
		}
	}
	
	// Funci�n - Obtener un dato del usuario.
	// - $i (ip, agent, browser, os, host, from): Dato a obtener.
	public static function Get($i)
	{
		global $config;
		$i = strtolower($i);
		
		switch($i)
		{
			case "ip":
				return IP;
			break;
			
			case "agent":
				return AGENT;
			break;
			
			case "browser":
				return Core::GetBrowser();
			break;
			
			case "os":
				return Core::GetOS();
			break;
			
			case "host":
				if($config['server']['host'])
					return @gethostbyaddr(IP);
				else
					return IP;
			break;
			
			case "from":
				return FROM;
			break;
		}
	}
}
?>