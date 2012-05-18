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

class Users
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
			return query_rows("SELECT null FROM {DA}users WHERE lastonline > '$date[f]'");
		}
		else
			return query_rows("SELECT null FROM {DA}users");
	}
	
	// Función - Obtener los usuarios online.
	// - $limit (Int): Limite de usuarios.
	public static function OnlineUsers($limit = 0)
	{
		global $date;
		
		$q = "SELECT * FROM {DA}users WHERE lastonline > '$date[f]'";
		
		if($limit > 0)
			$q .= " ORDER BY RAND() LIMIT $limit";
			
		return query($q);
	}
	
	// Función - Verificar si un dato ya existe.
	// - $str: Dato a verificar.
	// - $type (email, username): Tipo de verificación.
	public static function Exist($str, $type = 'email')
	{			
		$q = query_rows("SELECT null FROM {DA}users WHERE $type = '$str' LIMIT 1");	
		return $q > 0 ? true : false;
	}
	
	// Función - Iniciar sesión.
	// - $sessionId: ID de sesión de InfoSmart Cuentas.
	public static function Login($sessionId)
	{
		Core::theSession("login_sessionId", $sessionId);
		self::Enter($sessionId);
	}
	
	// Función - Desconectarse.
	public static function Logout()
	{
		global $Acc;
		
		Core::delSession("login_sessionId");
		//$Acc::LogOut();
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
	// - $birthday: Fecha de nacimiento.
	// - $photo (Dirección, Array): Foto de perfil.
	// - $auto (Bool): ¿Auto conectarse?
	// - $o (Array): Otros valores...
	public static function NewUser($sId, $uId, $username, $name, $email, $birthday = "", $photo = "", $auto = true, $o = '')
	{
		// Foto de Gravatar.
		if(is_array($photo))
		{
			if(!is_numeric($photo['size']))
				$photo['size'] = 80;
			
			if(empty($photo['rating']))
				$photo['rating'] = "g";
				
			$photo = self::GetGravatar($email, "", $photo['size'], $photo['default'], $photo['rating']);
		}
		
		// Datos predeterminados.
		$data = Array(
			'sessionId' => $sId,
			'userId' => $uId,
			'username' => $username,
			'name' => $name,
			'email' => $email,
			'photo' => $photo,
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
		query_insert('users', $data);
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
		$q = query_rows("SELECT null FROM {DA}users WHERE id = '$id' OR username = '$id' OR email = '$id' OR $row = '$id' LIMIT 1");
		
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
			
		query_update('users', $data, Array(
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
			
		query_update('users', Array(
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
			
		return query_get("SELECT $data FROM {DA}users WHERE id = '$id' OR username = '$id' OR email = '$id' OR $row = '$id' LIMIT 1", $data);
	}
	
	
	// Función - Obtener el dato de un usuario con solo una condición.
	// - $data: Parametro a obtener.
	// - $id: Valor del usuario a cumplir la condición.
	// - $row: Parametro de condición.
	public static function Only($data, $id = '', $row = 'id')
	{
		if(empty($id))
			$id = MY_ID;
			
		return query_get("SELECT $data FROM {DA}users WHERE $row = '$id' LIMIT 1", $data);
	}
	
	// Función - Obtener todos los datos de un usuario.
	// - $id: ID/Nombre de usuario/Correo electrónico del usuario.
	// - $row: Parametro.
	public static function User($id = '', $row = 'id')
	{
		if(empty($id))
			$id = MY_ID;
			
		$q = query("SELECT * FROM {DA}users WHERE id = '$id' OR username = '$id' OR email = '$id' OR $row = '$id' LIMIT 1");
		return MySQL::num_rows() > 0 ? MySQL::fetch_assoc() : false;
	}
	
	// Función - Checar sesión actual.
	public static function CheckSession()
	{
		// ID de la sesión establecida.
		$sId = FilterText(Core::theSession("login_sessionId"));
		
		// Si la ID esta vacia o no existe un usuario con ella, no hemos iniciado sesión.
		if(empty($sId) OR !self::UserExist($sId, "sessionId"))
			goto nosession;
		
		global $my, $ma;
			
		// Estableciendo datos del usuario.
		$my = self::User($sId, "sessionId");
		$ma = Core::theSession("info-accounts");
		
		foreach($my as $param => $value)
			Tpl::Set("my_$param", $value);
		foreach($ma as $param => $value)
			Tpl::Set("ma_$param", $value);
		
		// Definiendo datos importantes.
		define("MY_ID", $my['id']);
		define("MY_SESSIONID", $ma['session']);
		define("MY_USERID", $ma['id']);
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
			define("MY_ID", "0");
			define("MY_SESSIONID", "0");
			define("MY_USERID", "0");
			define("MY_RANK", "0");
			define("MY_USERNAME", "");
			define("MY_NAME", "");
			define("LOG_IN", false);
			
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
	
	// Función - Obtener el "Gravatar" de un usuario.
	// - $email: Correo electrónico.
	// - $to: Ruta del archivo de destino.
	// - $size (Int): Tamaño de ancho y altura.
	// - $default (Ruta, mm, identicon, monsterid, wavatar, retro): Imagen predeterminada en caso de que el usuario no use el servicio de Gravatar.
	// - $rating (g, pg, r, x): Clasificación máxima de las imagenes.
	public static function GetGravatar($email, $to = "", $size = 40, $default = "mm", $rating = "g")
	{
		$email = md5(strtolower(trim($email)));
		$default = urlencode($default);
		
		$gravatar = "http://www.gravatar.com/avatar/$email?s=$size&d=$default&r=$rating";
		
		if(!empty($to))
			Io::Write($to, $gravatar);
			
		return $gravatar;
	}
	
	/*####################################################
	##	FUNCIONES PERSONALIZADAS						##
	####################################################*/
	
	public static function SavePhoto($photo, $userId = "")
	{
		if(empty($userId))
			$userId = MY_ID;
			
		if(empty($photo) OR $userId <= 0)
			return false;
			
		global $site;
			
		$files_path = "../$site[files_path]/$userId";
		@mkdir($files_path);
		
		if($photo['type'] !== "image/png" AND $photo['type'] !== "image/jpeg" AND $photo['type'] !== "image/gif")
			return false;
			
		$name = md5_file($photo['tmp_name']);
		
		Io::Copy($photo['tmp_name'], "$files_path/$name.png");
		Gd::Resize("$files_path/$name.png", "$files_path/" . $name . "_small.png", 40, 30, false, 9, true);
		Gd::Resize("$files_path/$name.png", "$files_path/" . $name . "_big.png", 160, 150, false, 9, true);
		
		return $name;
	}
	
	public static function UrlPhoto($photo, $userId = "")
	{
		if(empty($userId))
			$userId = MY_ID;
			
		if(!Core::isValid($photo, "url") OR $userId <= 0)
			return false;	
			
		global $site;
			
		$files_path = "../$site[files_path]/$userId";
		@mkdir($files_path);
			
		$data = Io::Read($photo);
		$name = md5($data);
		
		Io::Write("$files_path/$name.png", $data);
		Gd::Resize("$files_path/$name.png", "$files_path/" . $name . "_small.png", 40, 30, false, 9, true);
		Gd::Resize("$files_path/$name.png", "$files_path/" . $name . "_big.png", 160, 150, false, 9, true);
		
		return $name;
	}
	
	public static function AddRoom($name, $description, $in_list, $options, $style, $ownerId = "")
	{
		if(empty($ownerId))
			$ownerId = MY_ID;
			
		query_insert("users_rooms", Array(
			"ownerId" => $ownerId,
			"name" => $name,
			"description" => $description,
			"in_list" => $in_list,
			"options" => $options,
			"style" => $style,
			"date" => time()
		));
		
		return mysql_insert_id();
	}
	
	public static function GetRoom($id)
	{
		$q = query("SELECT * FROM {DA}users_rooms WHERE id = '$id' LIMIT 1");
		return MySQL::num_rows() > 0 ? $q : false;
	}
	
	public static function GetRooms($userId = "")
	{
		if(empty($userId))
			$userId = MY_ID;
			
		$q = query("SELECT * FROM {DA}users_rooms WHERE ownerId = '$userId' ORDER BY id DESC");
		return MySQL::num_rows() > 0 ? $q : false;
	}

	public static function GetPublicRooms($limit = 20)
	{
		$q = query("SELECT * FROM {DA}users_rooms WHERE in_list = 'true' ORDER BY id DESC LIMIT $limit");
		return MySQL::num_rows() > 0 ? $q : false;
	}
	
	public static function UpdateRoom($roomId, $data)
	{
		query_update("users_rooms", $data, Array("id = '$roomId'"));
	}
	
	public static function CountRooms()
	{
		return query_rows("SELECT null FROM {DA}users_rooms");
	}
}
?>