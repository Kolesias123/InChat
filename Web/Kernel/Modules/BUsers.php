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

// Acción ilegal.
if(!defined("BEATROCK"))
	exit;	

class BUsers
{
	// Función - Obtener la edad de un usuario por medio del año especificado.
	// - $year: Año.
	public static function Age($year)
	{
		// El año es inválido.
		if(!is_numeric($year) || $year < 1990 || $year > date('Y'))
			return $year;
			
		return (date('Y') - $year);
	}
	
	// Función - Contar los usuarios o usuarios online.
	// - $online (Bool): ¿Usuarios online?
	public static function Count($online = false)
	{
		if($online)
		{
			global $date;
			return query_rows("SELECT null FROM {DA}users_browser WHERE lastonline > '$date[f]'");
		}
		else
			return query_rows("SELECT null FROM {DA}users_browser");
	}
	
	// Función - Obtener los usuarios online.
	// - $limit (Int): Limite de usuarios.
	public static function OnlineUsers($limit = 0)
	{
		global $date;
		
		$q = "SELECT * FROM {DA}users_browser WHERE lastonline > '$date[f]'";
		
		if($limit > 0)
			$q .= " ORDER BY RAND() LIMIT $limit";
			
		return query($q);
	}
	
	// Función - Verificar si un dato ya existe.
	// - $str: Dato a verificar.
	// - $type (email, username): Tipo de verificación.
	public static function Exist($str, $type = 'email')
	{			
		$q = query_rows("SELECT null FROM {DA}users_browser WHERE $type = '$str' LIMIT 1");	
		return $q > 0 ? true : false;
	}
	
	// Función - Iniciar sesión.
	// - $sessionId: ID de sesión de InfoSmart Cuentas.
	public static function Login($sessionId)
	{
		Core::theCookie("login_sessionId", Core::Encrypte($sessionId));
		self::Enter($sessionId);
	}
	
	// Función - Desconectarse.
	public static function Logout()
	{		
		Core::delCookie("login_sessionId");
		self::Out();
	}
	
	// Función - Actualizar datos de conexión.
	// - $id: ID/Nombre de usuario/Correo electrónico del usuario.
	public static function Enter($id)
	{
		self::Update(Array(
			'lastaccess' => time(),
			'lastonline' => time(),
			'ip_address' => IP
		), $id, "sessionId");
	}
	
	// Función - Actualizar datos de desconexión.
	// - $id: ID/Nombre de usuario/Correo electrónico del usuario.
	public static function Out($id)
	{
		self::Update(Array(
			'lastonline' => '0',
			'ip_address' => IP
		), $id, "sessionId");
	}
	
	// Función - Agregar un nuevo usuario.
	// - $sId: ID de sesión de InfoSmart Cuentas.
	// - $uId: Id del usuario en InfoSmart Cuentas.
	// - $username: Nombre de usuario.
	// - $name: Nombre real.
	// - $email: Correo electrónico.
	// - $auto (Bool): ¿Auto conectarse?
	// - $o (Array): Otros valores...
	public static function NewUser($sId, $username, $name, $email, $auto = true, $o = '')
	{
		// Datos predeterminados.
		$data = Array(
			'sessionId' => $sId,
			'username' => $username,
			'name' => $name,
			'email' => $email,
			'birthday' => $birthday,
			'account_birthday' => time(),
			'ip_address' => IP,
			'browser' => BROWSER,
			'agent' => AGENT,
			'os' => OS
		);
		
		// Hay otros datos.
		if(is_array($o))
		{
			foreach($o as $param => $value)
				$data[$param] = $value;
		}
		
		// Insertar en la base de datos.
		query_insert('users_browser', $data);
		$id = mysql_insert_id();
		
		// Auto conectarse.
		if($auto)
			self::Login($sId);
			
		return $id;
	}
	
	// Función - ¿Existe el usuario?
	// - $id: ID/Nombre de usuario/Correo electrónico del usuario.
	// - $row: Parametro a verificar existencia.
	public static function UserExist($id, $row = 'id')
	{
		$q = query_rows("SELECT null FROM {DA}users_browser WHERE id = '$id' OR username = '$id' OR email = '$id' OR $row = '$id' LIMIT 1");
		
		return $q > 0 ? true : false;
	}
	
	// Función - Actualizar varios datos de un usuario.
	// - $data (Array): Datos a actualizar.
	// - $id: ID/Nombre de usuario/Correo electrónico del usuario.
	// - $row: Parametro.
	public static function Update($data, $id = '', $row = 'id')
	{
		if(empty($id))
			$id = MY_ID;
			
		if(!is_numeric($id))
			$id = self::Data("id", $id, $row);
			
		query_update('users_browser', $data, Array(
			"id = '$id'"
		), 1);
	}
	
	// Función - Actualizar dato de un usuario.
	// - $data: Parametro a actualizar.
	// - $new: Valor nuevo.
	// - $id: ID/Nombre de usuario/Correo electrónico del usuario.
	// - $row: Parametro.
	public static function UpdateData($data, $new, $id = '', $row = 'id')
	{
		if(empty($id))
			$id = MY_ID;
			
		if(!is_numeric($id))
			$id = self::Data("id", $id, $row);
			
		query_update('users_browser', Array(
			$data => $new
		), Array(
			"id = '$id'"
		), 1);
	}
	
	// Función - Obtener el dato de un usuario.
	// - $data: Parametro a obtener.
	// - $id: ID/Nombre de usuario/Correo electrónico del usuario.
	public static function Data($data, $id = '', $row = 'id')
	{
		if(empty($id))
			$id = MY_ID;
			
		return query_get("SELECT $data FROM {DA}users_browser WHERE id = '$id' OR username = '$id' OR email = '$id' OR $row = '$id' LIMIT 1", $data);
	}
	
	
	// Función - Obtener el dato de un usuario con solo una condición.
	// - $data: Parametro a obtener.
	// - $id: Valor del usuario a cumplir la condición.
	// - $row: Parametro de condición.
	public static function Only($data, $id = '', $row = 'id')
	{
		if(empty($id))
			$id = MY_ID;
			
		return query_get("SELECT $data FROM {DA}users_browser WHERE $row = '$id' LIMIT 1", $data);
	}
	
	// Función - Obtener todos los datos de un usuario.
	// - $id: ID/Nombre de usuario/Correo electrónico del usuario.
	// - $row: Parametro.
	public static function User($id = '', $row = 'id')
	{
		if(empty($id))
			$id = MY_ID;
			
		$q = query("SELECT * FROM {DA}users_browser WHERE id = '$id' OR username = '$id' OR email = '$id' OR $row = '$id' LIMIT 1");
		return MySQL::num_rows() > 0 ? MySQL::fetch_assoc() : false;
	}
	
	// Función - Checar sesión actual.
	public static function CheckSession()
	{
		// ID de la sesión establecida.
		$sId = FilterText(Core::Decrypt(Core::theCookie("login_sessionId")));
		
		// Si la ID esta vacia o no existe un usuario con ella, no hemos iniciado sesión.
		if(empty($sId) OR !self::UserExist($sId, "sessionId"))
			goto nosession;
		
		global $my;
			
		// Estableciendo datos del usuario.
		$my = self::User($sId, "sessionId");
		
		foreach($my as $param => $value)
			Tpl::Set("my_$param", $value);
		
		// Definiendo datos importantes.
		define("MY_ID", $my['id']);
		define("MY_SESSIONID", $my['sessionId']);
		define("MY_RANK", $my['rank']);
		define("MY_USERNAME", $my['username']);
		define("MY_NAME", $my['name']);
		define("LOG_IN", true);
		
		// Actualizar datos requeridos.
		self::Update(Array(
			'lastonline' => time(),
			'ip_address' => IP,
			'browser' => BROWSER,
			'agent' => AGENT,
			'lasthost' => HOST,
			'os' => OS
		));
		
		return true;
		
		// No hemos iniciado sesión.
		nosession: {
		
			$names = Array(
				'UsuaritoFeliz',
				'GingerCloud',
				'DJChat',
				'InYellow',
				'HelloMe',
				'KittyCloud'
			);
			
			$username = Core::SelectRandom($names)  . rand(1, 50);
			$sessionId = Core::Random(50);
			
			self::NewUser($sessionId,  $username, "", "", true, Array(
				"hash_secret" => Core::Random(80)
			));
			Core::Redirect(PATH_NOW);
			
			/*
			define("MY_ID", "0");
			define("MY_SESSIONID", "0");
			define("MY_RANK", "0");
			define("MY_USERNAME", "");
			define("MY_NAME", "");
			define("LOG_IN", false);
			*/
			
			return false;
		}
	}
	
	// Función - Verificar si un usuario se encuentra online.
	// - $id: ID/Nombre de usuario/Correo electrónico del usuario.
	// - $t (Bool): ¿Devolver en texto?
	public static function IsOnline($id = '', $t = false)
	{
		global $date;
		
		if(empty($id))
			$id = MY_ID;
		
		$online = self::Data("lastonline", $id);
		
		if($online >= $date['f'])
		{
			if($t)
				return "Online";
			else
				return true;
		}
		
		if($t)
			return "Offline";
		else
			return false;
	}
	
	/*####################################################
	##	FUNCIONES PERSONALIZADAS						##
	####################################################*/
}
?>