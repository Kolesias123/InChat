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

class Setup
{
	// Funci�n privada - Restaurar el archivo de configuraci�n.
	private static function restoreBackup()
	{
		BitRock::log("Se ha detectado que el archivo de configuraci�n no existe, se intentar� restaurar autom�ticamente.", "warning");
		
		// El Backup del archivo de configuraci�n existe, restaurarlo desde este.
		if(file_exists(KERNEL . 'Configuration.Backup.php'))
			return Io::Copy(KERNEL . 'Configuration.Backup.php', KERNEL . 'Configuration.php');
		
		// Obtener la copia de configuraci�n.
		$ab = Core::theSession("backup_config");
			
		// Esta vacia.
		if(empty($ab))
			return false;
			
		// Restaurar archivo de configuraci�n.
		BitRock::log("El archivo de configuraci�n de recuperaci�n no existe, pero se ha restaurado desde la informaci�n de recuperaci�n del usuario.");
		return Io::Write(KERNEL . 'Configuration.php', $ab);
	}
	
	// Funci�n - Inicializar.
	public static function Init()
	{	
		// El archivo de configuraci�n no existe.
		if(!file_exists(KERNEL . 'Configuration.php'))
		{
			// Intentando restaurarlo.
			$result = self::restoreBackup();
			
			// Ha fallado la restauraci�n.
			if(!$result)
			{
				// La instalaci�n existe, redireccionar a la instalaci�n.
				// Si no, lanzar error.
				if(file_exists('./Setup' . DS . 'index.php'))
					Core::Redirect("./Setup/");
				else if(file_exists('../Setup' . DS . 'index.php'))
					Core::Redirect("../Setup/");
				else
					BitRock::launchError('03x');
			}
		}
		
		// Verificar los permisos de las carpetas de Backups, Logs, Temporal y Cache.
		// Solo si no estamos en Windows.
		if(PHP_OS !== "WINNT")
		{
			if(!is_writable(BIT . 'Backups'))
				@chmod(BIT . 'Backups', 0777);
				
			if(!is_writable(BIT . 'Logs'))
				@chmod(BIT . 'Logs', 0777);
				
			if(!is_writable(BIT . 'Temp'))
				@chmod(BIT . 'Temp', 0777);
				
			if(!is_writable(BIT . 'Cache'))
				@chmod(BIT . 'Temp', 0777);
		}
		
		// Implementando el archivo de configuraci�n.
		require_once(KERNEL . 'Configuration.php');		
		
		// Verificando y aplicando la configuraci�n.
		self::verifyConfig($config);		
		self::applyConfig($config);
		
		// Devolver los datos de la configuraci�n.
		return $config;
	}
	
	// Funci�n privada - �Soportamos GZIP?
	private static function supportGzip()
	{
		global $Kernel;
		
		// El servidor no soporta la compresi�n.
		if(empty($_SERVER['HTTP_ACCEPT_ENCODING']))
			return false;
		// Ya hay un m�dulo de compresi�n activado.
		else if(ini_get('zlib.output_compression') == 'On' OR ini_get('zlib.output_compression_level') > 0 OR ini_get('output_handler') == 'ob_gzhandler')
			return false;
		// �Si aceptamos GZIP!
		else if(extension_loaded('zlib') AND (strpos($_SERVER['HTTP_ACCEPT_ENCODING'], 'gzip') !== FALSE) AND $Kernel['gzip'] !== false)
			return true;
		else
			return false;
	}
	
	// Funci�n privada - Aplicar configuraci�n.
	// - $config: Configuraci�n.
	private static function applyConfig($config)
	{
		// Configuraci�n del sitio.
		$site = $config['site'];
		
		// Estamos usando el protocolo de conexi�n segura.
		if(SSL == "on")
		{
			// Para evitar errores fatales del navegador...
			error_reporting(E_CORE_ERROR & E_RECOVERABLE_ERROR);
			
			// Forzar el NO uso del protocolo seguro.
			if($config['server']['ssl'] == false AND $config['server']['ssl'] !== null)
			{
				// Guardar datos "POST" para restaurarlos en la pr�xima ejecuci�n.
				Client::SavePost();
				// Redireccionar al procolo normal.
				Core::Redirect("http://" . URL);
			}
			
			// Definir el protocolo.
			$protocol = "https://";
			BitRock::log('Se esta usando el procolo de conexi�n segura.');
		}
		else
		{
			// Forzar el uso del protocolo seguro.
			if($config['server']['ssl'] == true)
			{
				// Guardar datos "POST" para restaurarlos en la pr�xima ejecuci�n.
				Client::SavePost();				
				// Redireccionar al procolo seguro.
				Core::Redirect("https://" . URL);
			}
			
			// Definir el protocolo.
			$protocol = "http://";
			BitRock::log('Se esta usando el procolo de conexi�n normal.');
		}
		
		// Queremos compresi�n GZIP.
		if($config['server']['gzip'] AND $page['gzip'] !== false OR $page['gzip'] == true)
		{
			// Si el servidor soporta la compresi�n GZIP, activarlo.
			// De otra manera activar la compresi�n ZLIB y comprimir HTML.
			if(self::supportGzip())
			{
				ob_start('ob_gzhandler');
				BitRock::log("Se esta usando la compresi�n GZIP �Perfecto!");
			}
			else
			{
				ini_set('zlib.output_compression', 'On');
				ob_start('Core::Compress');
			}
		}
		// De otra forma capturar buffer de salida.
		else		
			ob_start();
		
		// Definiendo el reporte de errores.
		if(is_integer($config['errors']['report']))
			error_reporting($config['errors']['report']);
		
		// Definiendo la zona horaria del servidor.
		if(!empty($site['country']))
			date_default_timezone_set($site['country']);
		
		// Definiendo ubicaciones web.
		define("PATH", $protocol . $site['path']);
		define("PATH_NS", "http://$site[path]");
		define("PATH_SSL", "https://$site[path]");
		
		define("ACCOUNTS", $protocol . $site['accounts']);
		
		define("RESOURCES", $protocol . $site['resources']);
		define("RESOURCES_SYS", $protocol . $site['resources.sys']);
		
		define("ADMIN", $protocol . $site['admin']);
		define("DB_ALIAS", $config['mysql']['alias']);
		
		// Definiendo protocolo usado.
		define("PROTOCOL", $protocol);
		define("PATH_NOW", PROTOCOL . URL);
		BitRock::log('Se han aplicado las condiciones del archivo de configuraci�n con �xito.');
	}
	
	// Funci�n privada - Verificar configuraci�n.
	// - $config: Configuraci�n.
	private static function verifyConfig($config)
	{
		// Estableciendo estado.
		BitRock::$status = Array();
		$file = KERNEL . 'Configuration.php';
		
		// Definiendo secciones de la configuraci�n.
		$mysql = $config['mysql'];
		$site = $config['site'];
		$security = $config['security'];
		
		// Configuraci�n para la conexi�n MySQL inv�lida.
		if(empty($mysql['host']) OR empty($mysql['user']) OR empty($mysql['pass']) OR empty($mysql['name']))
			BitRock::setStatus('Los datos para la conexi�n al servidor MySQL no estan completos.', $file);
		// Configuraci�n de ubicaci�n web inv�lida.
		else if(empty($site['path']) OR empty($site['resources']))
			BitRock::setStatus('Los datos de ubicaci�n de la aplicaci�n no estan completos.', $file);
		// Configuraci�n de encriptaci�n inv�lida.
		else if($security['level'] < 0 OR $security['level'] > 5)
			BitRock::setStatus('El nivel de codificaci�n es inv�lido.', $file);
		
		// No es recomendable... >.<
		if($mysql['user'] == "root" OR $mysql['user'] == "admin")
			BitRock::log('Por seguridad es recomendable que cambie el usuario para la conexi�n al servidor MySQL.', 'warning');
		// �Sin palabra de encriptaci�n? >.>
		if(empty($security['hash']))
			BitRock::log('No se ha definido una cadena de seguridad para la codificaci�n, por favor defina alguna para aumentar el nivel de seguridad.', 'warning');
			
		// Lanzar error en caso de haber.
		if(!empty(BitRock::$status['response']))
			BitRock::launchError('03x');
	}
}
?>