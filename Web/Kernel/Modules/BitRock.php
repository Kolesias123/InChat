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
	
/*
	BeatRock tiene soporte de logs por medio de ChromePHP.
	Si tienes ChromePHP (http://www.chromephp.com/) puedes descomentar
	la l�nea que define "DEBUG" en Init.php
*/

class BitRock
{
	public static $status = Array();
	public static $logs = Array();
	private static $files = Array();
	private static $dirs = Array();
	private static $inerror = false;
	public static $ignore = false;
	public static $details = Array();
	public static $modules = 0;
	
	// Funci�n - Constructor.
	public function __construct()
	{
		// Verificando versi�n del PHP.
		if(PHP_MAJOR_VERSION >= 5)
		{
			if(PHP_MINOR_VERSION < 3)
				exit('BeatRock no soporta esta versi�n de PHP (' . phpversion() . '). Por favor actualiza tu plataforma de PHP a la 5.3 o superior.');
		}
		
		// Registrar m�dulos cuando sea necesario.
		spl_autoload_register(Array(self, 'loadMod'));		
		self::log("BeatRock ha comenzado.");
		
		// Capturar errores para mostrarlas en la p�gina de error.
		set_exception_handler(Array($this, "haveException"));
		
		if(defined("DEBUG"))
			set_error_handler(Array($this, "haveError"), E_ALL & ~E_NOTICE);
		else
			set_error_handler(Array($this, "haveError"), E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED);
		
		// Registrar la funci�n de apagado.
		register_shutdown_function("BitRock::ShutDown");
		
		// Registrando archivos necesarios.
		self::registerReq(KERNEL . 'Functions.Header.php');
		self::registerReq(KERNEL . 'Functions.php');
		self::registerReq(BIT_TEMP . 'Error.tpl');
		self::registerReq(BIT_TEMP . 'Error.Mobile.tpl');
		self::registerReq(BIT_TEMP . 'Maintenance.tpl');
		self::registerReq(BIT_TEMP . 'Overload.tpl');
		self::registerReq(HEADERS . 'Header.php');
		self::registerReq(HEADERS . 'Header.Mobile.php');
		self::registerReq(HEADERS . 'Footer.php');
		
		// Registrando directorios necesarios.
		self::registerReq(KERNEL . 'BitRock', true);
		self::registerReq(BIT . 'Backups', true);
		self::registerReq(BIT . 'Logs', true);
		self::registerReq(BIT . 'Temp', true);
		self::registerReq(BIT_TEMP, true);
		self::registerReq(HEADERS, true);
		self::registerReq(TEMPLATES, true);
		
		// Verificaci�n de inicio.
		self::verifyBoot();
	}
	
	// Funci�n - Registrar archivo/directorio requerido.
	// - $file: Ruta del archivo/directorio.
	// - $dir (Bool): �Es un directorio?
	public static function registerReq($file, $dir = false)
	{
		$dir ? self::$dirs[] = $file : self::$files[] = $file;
	}
	
	// Funci�n - Verificaci�n de inicio.
	public static function verifyBoot()
	{	
		self::$status = Array();
		
		// Comprobaci�n de archivos necesarios.
		foreach(self::$files as $f)
		{			
			if(!file_exists($f))
				self::setStatus('El archivo necesario especificado no existe.', $f);
		}
		
		// Comprobaci�n de directorios necesarios.
		foreach(self::$dirs as $d)
		{
			if(!is_dir($d))
				self::setStatus('El directorio especificado no existe.', $d);
		}
		
		// Comprobaci�n de la librer�a cURL.
		if(!function_exists("curl_init"))
			self::setStatus('Se ha detectado que la librer�a de cURL esta desactivada en PHP, esta es necesaria para BeatRock, por favor activela para continuar.', "", Array("function" => "curl_init"));
		
		// Comprobaci�n de la librer�a JSON.
		if(!function_exists("json_decode"))
			self::setStatus('Se ha detectado que la librer�a de JSON esta desactivada en PHP, esta es necesaria para BeatRock, por favor activela para continuar.', "", Array("function" => "json_decode"));
		
		// Al parecer hubo errores de inicializaci�n.
		if(!empty(self::$status['response']))
			self::launchError('02x');
		
		self::log("La verificaci�n de inicio se ha completado.");
	}
	
	// Funci�n - Guardar log.
	// - $msg: Mensaje a guardar.
	// - $type (info, warning, error, mysql): Tipo del log.
	public static function log($msg, $type = 'info')
	{
		global $config;
		
		// No es una cadena de texto. -.-"
		if(!is_string($msg))
			return;
			
		// No queremos guardar Logs.
		if(isset($config['logs']['capture']) AND $config['logs']['capture'] == false)
			return;
		
		// Tipo de alerta inv�lida.
		if($type !== 'info' AND $type !== 'warning' AND $type !== 'error' AND $type !== 'mysql')
			return;
		
		// Tipo: Normal.
		if($type == 'info')
		{
			$status = "INFO";
			$color = "#045FB4";
			
			if(defined("DEBUG"))
				ChromePhp::log("[$status] - $msg");
		}
		
		// Tipo: Alerta.
		if($type == "warning")
		{
			$status = "ALERTA";
			$color = "#8A4B08";
			
			if(defined("DEBUG"))
				ChromePhp::warn("[$status] - $msg");
		}
		
		// Tipo: Error.
		if($type == "error")
		{
			$status = "ERROR";
			$color = "red";
			
			if(defined("DEBUG"))
				ChromePhp::error("[$status] - $msg");
		}
		
		// Tipo: Acci�n MySQL.
		if($type == "mysql")
		{
			$status = "MYSQL";
			$color = "#21610B";			
			
			if(defined("DEBUG"))
				ChromePhp::log("[$status] - $msg");
		}
		
		$html = "<label title='" . date('h:i:s') . "'><b style='color: $color'>[$status]</b> - $msg</label><br />";
		$text = "[$status] (" . date('h:i:s') . ") - $msg\r\n";
		
		// Estableciendo nuevo log.
		self::$logs['all']['html'] .= $html;
		self::$logs['all']['text'] .= $text;
		
		self::$logs[$type]['html'] .= $html;
		self::$logs[$type]['text'] .= $text;
	}
	
	// Funci�n - Guardar logs.
	public static function saveLog()
	{
		global $config;
		$save = $config['logs']['save'];
		
		// No queremos guardar Logs.
		if($save == false OR empty($save))
			return;
		
		// Solo guardar Logs especificos.
		if($save !== "onerror" AND empty(self::$logs[$save]))	
			return;
		
		// Guardar logs solo si se ocacionan errores.
		if($save == "onerror")
		{
			// No hubo errores, de otra forma, guardar logs.
			if(empty(self::$logs["error"]))
				return;
			else
				$save = "all";
		}		
		
		// Guardando archivo de texto del Log.
		$name = 'Logs-' . date('d_m_Y') . '-' . time() . '.txt';
		Io::SaveLog($name, self::$logs[$save]['text']);
	}
	
	// Funci�n - Imprimir Logs.
	// - $html (Bool): �Imprimir en formato de HTML? (M�s bonito)
	public static function printLog($html = true, $type = "all")
	{
		// Tipo inv�lido, usar "mostrar todos".
		if(empty($type))
			$type = "all";
			
		// Estableciendo mensaje de estadisticas de BeatRock.
		$finish = (microtime(true) - START);
		self::log('BeatRock tardo ' . substr($finish, 0, 5) . ' segundos en ejecutarse con un uso de ' . round(memory_get_usage() / 1024,1) . ' KB de Memoria.');
		
		// Imprimiendo Logs.
		echo $html ? self::$logs[$type]['html'] : self::$logs[$type]['text'];
	}
	
	// Funci�n privada - Cargar un m�dulo.
	// - $name: Nombre del modulo.
	private function loadMod($name)
	{
		// Nombre del modulo.
		$mod = "$name.php";
		
		// Si el archivo del modulo existe, cargarlo.
		// De otra manera lanzar un error.
		if(file_exists(MODS . $mod))
			require_once(MODS . $mod);
		else if(file_exists(MODS . 'External' . DS . $mod))
			require_once(MODS . 'External' . DS . $mod);
		else
		{
			self::setStatus("No se ha podido cargar el m�dulo '$name'.", $name);
			self::launchError('04x');
		}
		
		// Se requiere ejecutar una funci�n/proceso para funcionar.
		if($name == "Codes")
		{
			// Cargar los c�digos de error de BeatRock.
			Codes::loadCodes();
		}
			
		self::$modules++;
		self::log("Se ha cargado el m�dulo $name correctamente.");
	}
	
	// Funci�n - Ha ocurrido un error.
	// Variables de respuesta especificadas por el Callback.
	public static function haveError($num, $msg, $file, $line)
	{
		self::setStatus($msg, $file, Array('line' => $line));
		self::launchError('01x');
		
		return true;
	}
	
	// Funci�n - Ha ocurrido una excepci�n.
	// Variable de respuesta especificada por el callback.
	public static function haveException($e)
	{
		self::setStatus($e->getMessage(), $e->getfile(), Array('line' => $e->getline()));
		self::launchError('01e');
		
		return true;
	}
	
	// Funci�n - Establecer estado/informaci�n de un error.
	// - $response: Mensaje de respuesta.
	// - $file: Archivo responsable.
	// - $data (Array): M�s informaci�n...
	public static function setStatus($response, $file, $data = Array())
	{
		self::$status['response'] = $response;
		self::$status['file'] = $file;
		
		foreach($data as $param => $value)
			self::$status[$param] = $value;
	}
	
	// Funci�n - Lanzar un error.
	// - $code: C�digo del error.
	public static function launchError($code)
	{
		// Ignorar el error...
		if(self::$ignore)
		{
			self::$ignore = false;
			return;
		}
		
		// Ya estamos en un error...
		if(self::$inerror)
			return;
		
		// Estamos en un error.
		self::$inerror = true;
		
		// Extraer todas las variables para su uso.
		extract($GLOBALS);
		
		// Obtener la informaci�n del c�digo de error.
		$info = Codes::getInfo($code);
		// M�s informaci�n...
		$res = self::$status;
		
		// �ltimo error recibido.
		$last = error_get_last();
		$res['last'] = "$last[message] en '$last[file]' l�nea $last[line].";
		
		// Guardar datos "POST" para restaurarlos en la pr�xima ejecuci�n.
		Client::SavePost();
		
		// El servidor MySQL ya ha sido preparado y no es un error de PHP.
		if(MySQL::isReady() AND $code !== "01x")
		{
			// Al parecer es un error del servidor MySQL.
			// Si no es as�, insertar error en la base de datos.
			if($code == "03m")
			{				
				// Optimizar la base de datos.
				if($config['mysql']['optimize.error'] OR $config['errors']['hidden'])
					MySQL::Optimize();
					
				// Reparar la base de datos.
				if($config['mysql']['repair.error'] OR $config['errors']['hidden'])
					MySQL::Repair();
					
				// Modo "Error escondido".
				Core::HiddenError();
			}
			else
			{
				MySQL::query_insert('site_errors', Array(
					'code' => $code,
					'title' => $info['title'],
					'response' => FilterText($res['response']),
					'file' => FilterText($res['file']),
					'function' => $res['function'],
					'line' => $res['line'],
					'out_file' => FilterText($res['out_file']),
					'more' => FilterText(json_encode($res)),
					'date' => time()
				));
			}
		}
		
		// Nombre del archivo de error.
		$e = "Error";

		if(Core::IsMobile())
			$e .= ".Mobile";
			
		// Definir detalles del error.
		self::$details = Array(
			'code' => $code,
			'info' => $info,
			'res' => $res
		);
		
		// Notificar al correo electr�nico especificado que ha ocurrido un error.
		$mail_result = Core::sendError();
		
		// Guardar log del error.
		self::log("Ha ocurrido un error: $code - $info[title] - $info[details]", "error");
		
		// P�gina web no disponible.
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Cache-Control: no-cache');

		header('HTTP/1.1 503 Service Temporarily Unavailable');
		header('Status: 503 Service Temporarily Unavailable');
		
		// Limpiar el buffer de salida actual.
		ob_clean();
		
		// Requiriendo el archivo de Error.
		$page = Tpl::Process(BIT_TEMP . DS . $e);
		
		foreach($info as $param => $value)
			$page = str_ireplace("%$param%", $value, $page);
		
		// Mostrar error y salir.
		exit($page);
	}
	
	// Funci�n - Verificar la carga media del CPU y Memoria.
	public static function CheckLoad()
	{
		global $config;
		
		// Memoria limite para el Script.
		$memory_limit = ini_get("memory_limit");
		
		// Datos inv�lidos, no queremos verificaci�n de carga.
		if(empty($memory_limit) OR $config['server']['limit'] < 52428800 OR $config['server']['limit_load'] < 30)
			return;
		
		// Definiendo carga de memoria del script y proceso apache actuales.
		$memory_load = memory_get_usage() + 500000;
		$mem_load = Core::memory_usage() + 500000;
		
		// Defininiendo carga del CPU actual.
		$cpu_load = Core::sys_load() + 10;
	
		// La memoria limite del Script esta en MegaBytes, convertir a Bytes.
		if(Contains(ini_get("memory_limit"), "M"))
			$memory_limit = str_replace("M", "", $memory_limit) * 1048576;
		
		// Al parecer el servidor saturado, mostrar p�gina de sobrecarga y salir.
		if($memory_load > $memory_limit OR $mem_load > $config['server']['limit'] OR $cpu_load > $config['server']['limit_load'])
		{
			header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
			header('Cache-Control: no-cache');

			header('HTTP/1.1 503 Service Temporarily Unavailable');
			header('Status: 503 Service Temporarily Unavailable');
			
			// Liberar todas las variables.
			foreach($GLOBALS as $g => $v)	
				unset($g, $v);
				
			echo Tpl::Process(BIT_TEMP . "Overload");
			exit(1);
		}
	}
	
	// Funci�n - Apagado.
	public static function ShutDown()
	{
		// Tiempo que tardo en ejecutarse BeatRock.
		$finish = (microtime(true) - START);
		
		// Enviar estadisticas.	
		self::log('BeatRock tardo ' . substr($finish, 0, 5) . ' segundos en ejecutarse con un uso de ' . round(memory_get_usage() / 1024,1) . ' KB de Memoria.');
		self::log('Se realizaron ' . MySQL::$q . ' consultas durante la sesi�n actual.', 'mysql');
		self::log('Se cargaron ' . self::$modules . ' m�dulos durante la sesi�n actual.');
		
		global $page;
		
		// Queremos preparar una plantilla.
		if(!empty($page['id']) AND empty(Tpl::$html) AND Socket::$server == false)
			Tpl::Load();
			
		// Hay buffer guardado, mostrarlo.
		if(ob_get_length() !== false AND self::$inerror == false)
		{
			if(!empty(Tpl::$html))
				echo Tpl::$html;
			else
				ob_end_flush();
		}
		
		// Guardar cach�.
		Tpl::SaveCache();
		
		// Desconectarse del servidor FTP (Si hay).
		Ftp::Crash();
		Socket::Crash();
		
		// Si el servidor MySQL esta listo.
		// Ejecutar cronometros y desconectarse del servidor.
		if(MySQL::isReady())
		{
			if(defined("DEBUG"))
				Site::saveLog();
				
			Site::checkTimers();			
			MySQL::Crash();
		}
		
		// Se han creado archivos temporales, eliminarlos.
		if(!empty(Io::$temp))
		{
			foreach(Io::$temp as $t)
				@unlink($t);
		}		
		
		// Cerrar sesi�n actual.
		session_write_close();
		
		// Guardar log.
		self::saveLog();
		
		// Descomente la siguiente linea para ver los �ltimos logs...
		//self::printLog(true);
	}
	
	// Funci�n - Guardar un Backup de toda la aplicaci�n.
	// - $db (Bool) - �Incluir un backup de la base de datos?
	public static function Backup($db = false)
	{
		// Nombre del backup.
		$name = BIT . 'Backups' . DS . 'Backup-' . date('d_m_Y') . '-' . time() . '.zip';
		
		// Iniciar el modulo PclZip.
		$a = new PclZip($name);
		// Crear un nuevo archivo ZIP con la aplicaci�n.
		$e = $a->create(ROOT);
		
		// Ha ocurrido un error... :(
		if($e == 0)
			return false;
		
		// Todo bien, ahora incluimos un backup de la base de datos.
		if($db)
		{
			// Ejecutar backup de la DB.
			$b = MySQL::Backup();
			// Ubicaci�n del backup.
			$b = BIT . 'Backups' . DS . $b;
			
			// Agregar la base de datos al backup general.
			Zip::Add($name, $b);
			@unlink($b);
		}
		
		self::log("Se ha creado un Backup total correctamente.");
		return $name;
	}
	
	public static function Statistics()
	{
		// Tiempo que tardo en ejecutarse BeatRock.
		$finish = (microtime(true) - START);
		
		$return = 'BeatRock tardo ' . substr($finish, 0, 5) . ' segundos en ejecutarse con un uso de ' . round(memory_get_usage() / 1024,1) . ' KB de Memoria.<br />';
		$return .= 'Se realizaron ' . MySQL::$q . ' consultas durante la sesi�n actual.<br />';
		$return .= 'Se cargaron ' . self::$modules . ' m�dulos durante la sesi�n actual.<br />';
		
		return $return;
	}
}
?>