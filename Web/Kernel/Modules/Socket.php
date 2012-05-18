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

class Socket
{
	private static $c = null;
	
	public static $server = false;
	public static $actions = Array();
	
	// Funci�n privada - Lanzar error.
	// - $code: C�digo de error.
	// - $function: Funci�n causante.
	// - $msg: Mensaje del error.
	private static function Error($code, $function, $msg = '')
	{		
		// Si esta vaci� el mensaje, usar el �ltimo error MySQL.
		if(empty($msg) AND is_resource(self::$c))
			$msg = socket_strerror(socket_last_error(self::$c));
		
		BitRock::setStatus($msg, __FILE__, Array('function' => $function));
		BitRock::launchError($code);
		
		return false;
	}
	
	// Funci�n privada - �Hay alguna conexi�n activa?
	private static function isReady()
	{
		if(self::$c == null OR !is_resource(self::$c))
			return false;
			
		return true;
	}
	
	// Funci�n - Destruir conexi�n activa.
	public static function Crash()
	{
		// Si no hay una conexi�n activa, cancelar.
		if(!self::isReady())
			return;
		
		// Cerrando socket.
		@socket_close(self::$c);
		BitRock::log("Se ha desconectado del servidor Socket correctamente.");
		
		// Restaurando variables.
		self::$c = null;
		self::$server = false;
		self::$actions = Array();
	}
	
	// Funci�n - Conectarse y preparar un servidor Socket.
	// - $host: Host de conexi�n.
	// - $port (Int): Puerto del servidor.
	// - $timeout (Int): Tiempo de ejecuci�n limite.
	// - $e (Bool): �Mostrar error en caso de que el servidor se encuentre apagado?
	public static function Connect($host, $port = 80, $timeout = 0, $e = false)
	{
		// Destruir conexi�n activa.
		self::Crash();		
		// Establecer tiempo limite del Script.
		set_time_limit($timeout);
		
		// Creando socket y conectandose al servidor.
		$s = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or self::Error("01s", __FUNCTION__);		
		$r = socket_connect($s, $host, $port);
		
		// No hubo conexi�n, mostrar error...
		if($r == false AND $e == true)
			self::Error("02s", __FUNCTION__);

		BitRock::log("Se ha establecido una conexi�n al servidor Socket en '$host:$port' correctamente.");		
		self::$c = $s;
		
		return $r;
	}
	
	// Funci�n - Preparar un servidor interno.
	// - $local: Direcci�n para la conexi�n.
	// - $port (Int): Puerto de escucha.
	// - $timeout (Int): Tiempo de ejecuci�n limite.
	public static function Listen($local = '127.0.0.1', $port = 1212, $timeout = 0, $ctimeout = 5)
	{
		return new Server($local, $port, $timeout);
	}
	
	// Funci�n - Enviar datos al servidor.
	// - $data: Datos a enviar.
	// - $response (Bool): �Queremos esperar una respuesta?
	public static function Send($data, $response = false)
	{
		// Si no hay una conexi�n activa, lanzar error.
		if(!self::isReady())
			self::Error("03s", __FUNCTION__);
			
		// Definiendo peso de los datos.
		$len = strlen($data);
		$off = 0;
		
		// Enviando datos por partes de forma correcta.
		while($off < $len)
		{
			// Enviando datos al servidor.
			$send = socket_write(self::$c, substr($data, $off), $len - $off);
			
			// Hubo un error...
			if($send == false)
				break;
			
			// Datos enviados.
			$off += $send;
		}
		
		// Los datos se enviaron de manera incorrecta/incompleta.
		if($off < $len)
			self::Error("04s", __FUNCTION__, "Ha ocurrido un error al mandar '$data' al servidor.");
		
		// No queremos una respuesta, devolver �xito.	
		if(!$response)
			return true;
		
		// Esperar una respuesta.	
		$bytes = @socket_recv(self::$c, $data, 2048, 0);
		return $data;
	}
	
	// Funci�n - Agregar un evento/acci�n.
	// - $from: Dato a recibir para activar evento.
	// - $action: Acci�n a realizar.
	public static function Add($from, $action = "")
	{
		// Queremos registrar varios eventos.
		if(is_array($from))
		{
			foreach($from as $param => $value)
				self::$actions[$param] = $value;
		}
		else
			self::$actions[$from] = $action;
	}
}

class Server
{
	private static $c = null;
	private static $rsock = Array();
	private static $asock = Array();
	private static $u = 0;
	private static $t = 0;
	private static $to = 5;

	// Funci�n privada - Lanzar error.
	// - $code: C�digo de error.
	// - $function: Funci�n causante.
	// - $msg: Mensaje del error.
	private static function Error($code, $function, $msg = '')
	{		
		// Si esta vaci� el mensaje, usar el �ltimo error MySQL.
		if(empty($msg) AND is_resource(self::$c))
			$msg = socket_strerror(socket_last_error(self::$c));
		
		BitRock::setStatus($msg, __FILE__, Array('function' => $function));
		BitRock::launchError($code);
		
		return false;
	}
	
	// Funci�n privada - �Hay alguna conexi�n activa?
	private static function isReady()
	{
		if(self::$c == null OR !is_resource(self::$c))
			return false;
			
		return true;
	}
	
	// Funci�n - Destruir conexi�n activa.
	public static function Crash()
	{
		// Si no hay una conexi�n activa, cancelar.
		if(!self::isReady())
			return;
		
		// Cerrando y liberando socket.
		@socket_shutdown(self::$c);
		@socket_close(self::$c);
		
		BitRock::log("Se ha apagado el servidor correctamente.");
		self::WriteLog("SERVIDOR APAGADO CORRECTAMENTE");
		
		// Restaurando variables.
		self::$c = null;
		self::$rsock = Array();
		self::$asoc = Array();
		self::$u = 0;
		self::$t = 0;
		self:: $to = 5;
	}
	
	// Funci�n - Imprimir un log.
	// - $mesage: Mensaje.
	public static function WriteLog($message)
	{
		$message = iconv("ISO-8859-1", "ASCII//TRANSLIT//IGNORE", $message);;
		echo "[" . date('Y-m-d H:i:s') . "] - $message\n\r";
	}
	
	// Funci�n - Preparar un servidor interno.
	// - $local: Direcci�n para la conexi�n.
	// - $port (Int): Puerto de escucha.
	// - $timeout (Int): Tiempo de ejecuci�n limite.
	// - $ctimeout (Int): Tiempo de inactividad limite para las conexiones entrantes.
	public function __construct($local = '127.0.0.1', $port = 1212, $timeout = 0, $ctimeout = 5)
	{
			// Destruir conexi�n activa.
		self::Crash();		
		// Establecer tiempo limite del Script.
		set_time_limit($timeout);
		
		self::WriteLog("Preparando conexi�n...");
		
		// Creando y ajustando socket.
		$s = socket_create(AF_INET, SOCK_STREAM, SOL_TCP) or self::Error("01s", __FUNCTION__);		
		socket_set_option($s, SOL_SOCKET, SO_REUSEADDR, 1);
		socket_bind($s, $local, $port) or self::Error("01s", __FUNCTION__);
		
		self::WriteLog("Conexi�n creada.");
		
		// Estableciendo servidor en el Socket.
		$r = socket_listen($s) or self::Error("02s", __FUNCTION__);		
		BitRock::log("Se ha establecido una conexi�n de escucha en '$host:$port' correctamente.");		
		
		// Ajustando datos necesarios.
		self::$c = $s;
		Socket::$server = true;
		self::$asock = Array($s);
		
		self::WriteLog("Escuchando conexiones entrantes desde el puerto $port.");
		self::WriteLog("SERVIDOR INICIADO.");

		if(!is_numeric($ctimeout) OR $ctimeout < 0)
			$ctimeout = 5;
		
		self::$to = $ctimeout;
		self::$t = time();
		
		// Empezar a recibir conexiones.
		self::Process();
	}
	
	// Funci�n privada - Recibir conexiones.
	private static function Process()
	{
		// Si no hay una conexi�n activa, lanzar error.
		if(!self::isReady())
			self::Error("03s", __FUNCTION__);
		
		// Bucle infinito de chequeos.
		while(true)
			self::Check();
	}
	
	// Funci�n privada - Checar sockets y conexiones.
	private static function Check()
	{
		// Si no hay una conexi�n activa, lanzar error.
		if(!self::isReady())
			self::Error("03s", __FUNCTION__);
		
		// Definiendo sockets activos.
		$csocks = self::$asock;
		// Viendo cambios en los sockets.
		socket_select($csocks, $write = NULL, $except = NULL, NULL);
		
		foreach($csocks as $sock)
		{
			// Verificando...
			self::Check_Statistics();
			
			// Socket a revisar: Maestro.
			if($sock == self::$c)
			{
				// �Nueva conexi�n?
				$newcon = socket_accept(self::$c);
				
				// No hay ninguna nueva conexi�n, continuar con el siguiente Socket...
				if($newcon < 0)
					continue;
				else
				{
					// Crear nueva instancia conexi�n entrante.
					$con = new Connection($newcon, self::$u);
					
					// Definiendo socket.
					self::$rsock[self::$u] = $con;
					array_push(self::$asock, $newcon);
										
					self::WriteLog("NUEVA CONEXI�N ENTRANTE #" . self::$u);
					self::$u++;
				}
			}
			// Socket a revisar: Usuario.
			else
			{
				// �Actividad?
				$bytes = @socket_recv($sock, $data, 2048, 0);
				
				// No hay actividad, continuar con el siguiente Socket...
				if(empty($data) OR !is_numeric($bytes))
					continue;
					
				// Buscando instancia de conexi�n entrante.
				$i = array_search($sock, self::$asock);
				
				// No ha sido encontrada o.O
				if($i == false)
					continue;
				
				// Definiendo acciones.	
				$i = $i - 1;
				$a = Socket::$actions;
				$con = self::$rsock[$i];
				
				self::WriteLog("RECIBIENDO DATOS ($data)");
				
				// Acci�n encontrada especifica del dato recibido.
				if(isset($a[$data]))
				{
					// Ejecutar acci�n.
					$e = $a[$data];
					$e($con);
				}
				
				// Acci�n encontrada para ejecutarse con cualquier dato recibido.
				if(isset($a["*"]))
				{
					// Ejecutar acci
					$e = $a["*"];
					$e($con, $data);
				}
				
				$con->last = time();
			}
		}
	}
	
	// Funci�n privada - Chequeo de conexiones.
	private static function Check_Statistics()
	{
		// Si no hay una conexi�n activa, lanzar error.
		if(!self::isReady())
			self::Error("03s", __FUNCTION__);

		// Checar cambios...
		if(self::$t <= (time() - 5))
		{
			// Realizar ping a los sockets y devolver el numero de conexiones activas.
			$count = self::Check_Ping();
			
			//self::WriteLog("Actualmente hay $count conexiones activas con un uso de " . round(memory_get_usage() / 1024,1) . " KB de Memoria.");
			
			self::$t = time();
		}
	}
	
	// Funci�n - Ping de conexiones.
	private static function Check_Ping()
	{
		// Si no hay una conexi�n activa, lanzar error.
		if(!self::isReady())
			self::Error("03s", __FUNCTION__);
				
		foreach(self::$rsock as $con)
		{
			$sock = $con->c;
			
			// El Socket es nulo, hubo una desconexi�n rara.
			if($sock == null)
			{
				Server::WriteLog("DESCONEXI�N #" . $con->id);
				unset(self::$rsock[$con->id]);
				
				continue;
			}
			
			// El Socket ha estado inactivo durante el tiempo asignado, desconectarlo.
			if($con->last <= (time() - (self::$to * 60)))
			{
				unset(self::$rsock[$con->id]);
				$con->Crash();				
				
				continue;
			}
		}
		
		// Devolver conexiones activas.
		return count(self::$rsock);
	}
	
	// Funci�n - Enviar datos a todas las conexiones.
	public static function SendAll($data)
	{		
		foreach(self::$rsock as $con)
			$con->Send($data, false);
	}
}

class Connection
{
	public $c = null;
	public $last = 0;
	
	public $id = 0;
	
	public function __construct($socket, $id)
	{
		$this->c = $socket;
		$this->id = $id;
		$this->last = time();
	}

	// Funci�n privada - �Hay alguna conexi�n activa?
	private function isReady()
	{
		if($this->c == null OR !is_resource($this->c))
			return false;
			
		return true;
	}
	
	// Funci�n - Destruir conexi�n activa.
	public function Crash()
	{
		// Si no hay una conexi�n activa, cancelar.
		if(!$this->isReady())
			return;
		
		// Cerrando y liberando socket.
		@socket_shutdown($this->c);
		@socket_close($this->c);
		
		Server::WriteLog("CONEXI�N #" . $this->id . " CERRADA.");
		$this->c = null;
	}

	// Funci�n - Liberar conexi�n activa.
	public function Clean()
	{
		// Si no hay una conexi�n activa, cancelar.
		if(!$this->isReady())
			return;
		
		// Liberando socket.
		@socket_close($this->c);		
		Server::WriteLog("CONEXI�N #" . $this->id . " LIBERADA.");
	}
	
	// Funci�n - Enviar datos.
	// - $data: Datos a enviar.
	// - $response (Bool): �Queremos esperar una respuesta?
	public function Send($data, $response = false)
	{
		// Si no hay una conexi�n activa, lanzar error.
		if(!$this->isReady())
			return false;
			
		// Definiendo peso de los datos.
		$len = strlen($data);
		$off = 0;		
		
		// Enviando datos por partes de forma correcta.
		while($off < $len)
		{
			// Enviando datos al servidor.
			$send = socket_write($this->c, substr($data, $off), $len - $off);
			
			// Hubo un error...
			if($send == false)
				break;
			
			// Datos enviados.
			$off += $send;
		}
		
		// Los datos se enviaron de manera incorrecta/incompleta.
		if($off < $len)
		{
			Server::WriteLog("Ha ocurrido un error al intentar enviar los datos '$data'.");
			return false;
		}			

		Server::WriteLog("Se ha enviado '$data' a la conexi�n #" . $this->id . ".");
			
		// No queremos una respuesta, devolver �xito.
		if(!$response)
		{
			$this->Clean();
			return true;
		}
		
		// Esperar una respuesta.
		$bytes = @socket_recv($this->c, $data, 2048, 0);
		$this->Clean();

		return $data;
	}
}
?>