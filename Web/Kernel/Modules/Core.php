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
	Agradecimientos de aportaci�n:
	
	Funci�n: str_ireplace - "xDR" - xd-draker@hotmail.es
*/

class Core
{
	// Funci�n - Definir una sesi�n.
	// - $param: Parametro/Nombre.
	// - $value: Valor, si se deja vacio se retornara el valor actual.
	public static function theSession($param, $value = '')
	{
		// Definiendo el Alias de sesi�n.
		global $site;		
		$a = !empty($site['session_alias']) ? $site['session_alias'] : $_SESSION[ROOT]['session_alias'];
		
		// Estableciendo Sesi�n con el Alias de sesi�n.
		$_SESSION[ROOT]['session_alias'] = $a;
			
		if(!empty($value))
			$_SESSION[$a . $param] = $value;
		else
			return $_SESSION[$a . $param];
	}
	
	// Funci�n - Eliminar una sesi�n.
	// - $param: Parametro/Nombre.
	public static function delSession($param)
	{
		// Definiendo el Alias de sesi�n.
		global $site;
		$a = !empty($site['session_alias']) ? $site['session_alias'] : $_SESSION[ROOT]['session_alias'];
		
		unset($_SESSION[$a . $param]);
	}
	
	// Funci�n - Definir una cookie.
	// - $param: Parametro/Nombre.
	// - $value: Valor, si se deja vacio se retornara el valor actual.
	// - $duration: Duraci�n en segundos.
	// - $path: Ubicaci�n donde podr� ser v�lida.
	// - $domain: Dominio donde podr� ser v�lida.
	// - $secure (Bool): �Solo v�lida para HTTPS?
	// - $imgod (Bool): Si se activa, el navegador web no podr� acceder a la cookie. (Como por ejemplo en JavaScript)
	public static function theCookie($param, $value = '', $duration = '', $path = '', $domain = '', $secure = false, $imgod = false)
	{
		// Definiendo el Alias de cookie.
		global $site;
		$a = !empty($site['cookie_alias']) ? $site['cookie_alias'] : $_SESSION[ROOT]['cookie_alias'];
		
		// Estableciendo Sesi�n con el Alias de cookie.
		$_SESSION[ROOT]['cookie_alias'] = $a;
		
		// Si la duraci�n no esta establecida o no es v�lida, usar la de la configuraci�n.
		if(empty($duration) OR $duration < 10)
			$duration = self::Time($site['cookie_duration'], 3);
			
		// Si la ubicaci�n no esta establecida, usar la predeterminada.
		if(empty($path))
			$path = "/";
			
		// Si el dominio no esta establecido, usar la de la configuraci�n.
		if(empty($domain))
			$domain = $site['cookie_domain'];			
		
		if(!empty($value))
			return setcookie($a . $param, $value, $duration, $path, $domain, $secure, $imgod);
		else
			return $_COOKIE[$a . $param];
	}
	
	// Funci�n - Eliminar una cookie.
	// - $param: Parametro/Nombre.
	// - $path: Ubicaci�n donde es v�lida.
	// - $domain: Dominio donde es v�lida.
	public static function delCookie($param, $path = '', $domain = '')
	{
		// Definiendo el Alias de cookie.
		global $site;
		$a = !empty($site['cookie_alias']) ? $site['cookie_alias'] : $_SESSION[ROOT]['cookie_alias'];
		
		// Si la ubicaci�n no esta establecida, usar la predeterminada.
		if(empty($path))
			$path = "/";
			
		// Si el dominio no esta establecido, usar la de la configuraci�n.
		if(empty($domain))
			$domain = $site['cookie_domain'];
			
		// Una duraci�n anterior para eliminarla...
		$duration = self::Time(5, 3, true);
		
		setcookie($a . $param, "", $duration, $path, $domain);
		unset($_COOKIE[$a . $param]);
	}
	
	// Funci�n - Sumar/Restar tiempo Unix para obtener el tiempo Unix de una fecha especifica.
	// - $t (Int): Tiempo Unix.
	// - $a (Int): Tipo de calculo. (1 - Tiempo Unix, 2 - Minutos, 3 - Horas, 4 - D�as)
	// - $m (Bool): �Restar?
	public static function Time($t, $a = 2, $m = false)
	{
		// Informaci�n inv�lida.
		if(!is_numeric($t) OR $a < 1 OR $a > 3)
			return false;
			
		// Tiempo Unix.
		if($a == 1)
			$r = $t;
		// Minutos.
		if($a == 2)
			$r = ($t * 60);
		// Horas.
		if($a == 3)
			$r = ($t * 60 * 60);
		// D�as.
		if($a == 3)
			$r = ($t * 24 * 60 * 60);
		
		if($m)
			return (time() - $r);
		else
			return (time() + $r);
	}
	
	// Funci�n - �True o False?
	// - $i (Int): Valor n�merico de referencia.
	public static function isTrue($i)
	{
		return $i % 2 == 0 ? true : false;
	}
	
	// Funci�n - Comprimir HTML.
	// - $buffer: Buffer/HTML.
	public static function Compress($buffer)
	{
		$buffer = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $buffer);
		$buffer = preg_replace('/\<!--(.*?)\-->/is', '', $buffer);
		$buffer = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $buffer);
		$buffer = str_replace('{ ', '{', $buffer);
		$buffer = str_replace(' }', '}', $buffer);
		$buffer = str_replace('; ', ';', $buffer);
		$buffer = str_replace(' {', '{', $buffer);
		$buffer = str_replace('} ', '}', $buffer);
		$buffer = str_replace(' ,', ',', $buffer);
		$buffer = str_replace(' ;', ';', $buffer);	
		
		return $buffer;
	}
	
	// Funci�n - Comprobar si un valor es v�lido.
	// - $str: Valor a comprobar.
	// - $type (email, username, ip, credit.card, url, password): Tipo de comprobaci�n.
	public static function isValid($str, $type = 'email')
	{
		if($type == "email")
			$p = "^[^0-9][a-zA-Z0-9_-]+([.][a-zA-Z0-9_-]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,48}$/";
		if($type == "username")
			$p = "^[a-z\d_]{5,32}$/i";
		if($type == "ip")
			$p = "^(([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5]).){3}([1-9]?[0-9]|1[0-9]{2}|2[0-4][0-9]|25[0-5])$/";
		if($type == "credit.card")
			$p = "^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14}|6011[0-9]{12}|3(?:0[0-5]|[68][0-9])[0-9]{11}|3[47][0-9]{13})$/";
		if($type == "url")
			$p = "^(http|https):\/\/([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+):?(\d+)?\/?/i";
		if($type == "password")
			$p = "^[a-z+0-9]/i";
			
		if(empty($p) OR empty($str))
			return false;
			
		$valid = preg_match("/$p", $str);
		return !$valid ? false : true;
	}
	
	// Funci�n - Redireccionar a una p�gina.
	// - $url (Url): Si la url no es v�lida, se tomar� como una p�gina local.
	public static function Redirect($url)
	{
		// Nota: Si usar�s esta funci�n para redireccionar a una p�gina en tu aplicaci�n
		// en la $url escribe por ejemplo "/index" en vez de "PATH/index".
		
		// No es una url v�lida (http:// - https://), redirecionar a una p�gina local.
		if(!Core::isValid($url, "url") AND !self::Contains($url, "./"))			
			$url = PATH . $url;
			
		header("Location: $url");
		exit;
	}
	
	// Funci�n - Comprobar si una cadena tiene malas palabras.
	// - $str: Cadena a comprobar.
	public static function StrBlocked($str)
	{
		// Ejecutando consulta para ver la lista de malas palabras.
		$q = query("SELECT word FROM {DA}wordsfilter", true);
		
		// Ejecutar un bucle con las malas palabras.
		while($row = MySQL::fetch_assoc($sql))
		{
			// Se ha encontrado una mala palabra, reemplazar con un *
			$f = str_ireplace($row['word'], "*", $str);
			
			// La cadena no es la misma, �Una mala palabra!
			if($str !== $f)
				return true;
		}
		
		return false;
	}
	
	// Funci�n - Filtrar malas palabras de una cadena.
	// - $str: Cadena a filtrar.
	public static function FilterString($str)
	{
		// Es todo menos una cadena. -.-"
		if(!is_string($str))
			return $str;
			
		// Ejecutando consulta para ver la lista de malas palabras.
		$q = query("SELECT word FROM {DA}wordsfilter", true);
		
		// Ejecutar un bucle con las malas palabras y reemplazar las encontradas con ****
		while($row = MySQL::fetch_assoc($sql))
			$str = str_ireplace($row['word'], "****", $str);
			
		// Devolver cadena filtrada.
		return $str;
	}
	
	// Funci�n - Filtrar una cadena para evitar Inyecci�n SQL.
	// - $str: Cadena a filtrar.
	// - $html (Bool): �Filtrar HTML con HTML ENTITIES? (Evitar Inyecci�n XSS)
	// - $e (Charset): Codificaci�n de letras de la cadena a filtrar.
	public static function FilterText($str, $html = true, $e = "ISO-8859-15")
	{
		// Filtrar un Array.
		if(is_array($str))
		{
			$final = Array();
			
			foreach($str as $param => $value)
				$final[$param] = self::FilterText($value, $html, $e);
				
			return $final;
		}
		
		// La cadena no es v�lida o el servidor MySQL no esta preparado.
		if(!is_string($str) OR !MySQL::isReady())
			return $str;
			
		// Al parecer contiene letras UTF-8 (Funci�n en experimentaci�n)
		if(self::isUtf8($str))
			$e = "UTF-8";
		
		// �Woots! 1313
		$str = stripslashes(trim($str));
		
		// Convertir caracteres a su respectiva "HTML ENTITIE"
		if($html)
			$str = htmlentities($str, ENT_QUOTES | ENT_SUBSTITUTE, $e, false);
			
		// Filtrar la cadena por medio de la funci�n de PHP.
		$str = mysql_real_escape_string($str);
		$str = str_replace('&amp;', '&', $str);
		// Tratar de convertir la cadena a una v�lida en codificaci�n ISO-8859-15 (Y evitar caracteres raros)
		$str = iconv($e, "ISO-8859-15//TRANSLIT//IGNORE", $str);
		
		return nl2br($str);
	}
	
	// Funci�n - Filtrar una cadena para evitar Inyecci�n XSS.
	// - $str: Cadena a filtrar.
	// - $e (Charset): Codificaci�n de letras de la cadena a filtrar.
	public static function CleanText($str, $e = "ISO-8859-15")
	{
		// Filtrar un Array.
		if(is_array($str))
		{
			$final = Array();
			
			foreach($str as $param => $value)
				$final[$param] = self::CleanText($value, $e);
				
			return $final;
		}
		
		// La cadena no es v�lida. -.-"
		if(!is_string($str))
			return $str;
			
		// Al parecer contiene letras UTF-8 (Funci�n en experimentaci�n)
		if(self::isUtf8($str))
			$e = "UTF-8";
			
		// �Woots! 1313
		$str = stripslashes(trim($str));
		// Convertir caracteres a su respectiva "HTML ENTITIE"
		$str = htmlentities($str, ENT_COMPAT | ENT_SUBSTITUTE, $e, false);
			
		$str = str_replace('&amp;', '&', $str);
		// Tratar de convertir la cadena a una v�lida en codificaci�n ISO-8859-15 (Y evitar caracteres raros)
		$str = iconv($e, "ISO-8859-15//TRANSLIT//IGNORE", $str);
		
		return nl2br($str);
	}
	
	// Funci�n - Convertir una cadena UTF-8 (Caracteres raros) a ISO-8859-15 (Caracteres normales :D)
	// - $str: Cadena a convertir.
	// - $html (Bool): �Filtrar HTML con HTML ENTITIES? (Evitar Inyecci�n XSS)
	public static function FixText($str, $html = false)
	{
		// Em, aveces causaba errores, descomentar bajo su propia responsabilidad ^^
		//if(!is_string($str))
			//return $str;
			
		// �Woots! 1313
		$str = trim($str);
			
		// Convertir caracteres a su respectiva "HTML ENTITIE"
		if($html)
			$str = htmlentities($str, ENT_COMPAT | ENT_SUBSTITUTE, "UTF-8", false);
		// Tratar de convertir la cadena a una v�lida en codificaci�n ISO-8859-15 (Y evitar caracteres raros)
		else
			$str = iconv($e, "ISO-8859-15//TRANSLIT//IGNORE", $str);
			
		return nl2br($str);
	}
	
	// Funci�n - Eliminar etiquetas HTML.
	// - $str: Cadena a filtrar.
	// - $allow: Elementos permitidos...
	public static function CleanHTML($str, $allow = '')
	{
		// La cadena no es v�lida. -.-"
		if(!is_string($str))
			return $str;
			
		$find = "<[^>]+>?([^>|^<]*)<?\/[^>]*>";
	 
		while (@ereg($find, $str) == true)
			$str = @ereg_replace($find,'\\1',$str);
			
		$str = @eregi_replace("<[^>]*>", " ", $str);
		$str = @eregi_replace("</[^>]*>", " ", $str);		
		$str = @eregi_replace("&nbsp;", "", $str);		
		$str = @strip_tags($str, $allow);
		
		$str = self::CleanText($str);	 
		return nl2br($str);
	}
	
	// Funci�n - Limpiar cadena para uso especial.
	// - $str: Cadena a limpiar.
	// - $lower (Bool): �Convertir a minusculas?
	// - $spaces (Bool): �Quitar espacios?
	public static function CleanString($str, $lower = true, $spaces = true)
	{
		// La cadena no es v�lida. -.-"
		if(!is_string($str))
			return $str;
			
		$str = trim($str);
		$str = preg_replace('/\s\s+/',' ', preg_replace("/[^A-Za-z0-9-]/", " ", $str));
		
		if($lower)
			$str = strtolower($str);
			
		if($spaces)
			$str = str_replace(" ", "-", $str);
		else
			$str = str_replace(" ", "", $str);
			
		return nl2br($str);
	}
	
	// Funci�n - Eliminar "HTML ENTITIES".
	// - $str: Cadena a filtrar.
	public static function CleanENT($str)
	{
		// La cadena no es v�lida. -.-"
		if(!is_string($str))
			return $str;
			
		if(substr_count($str, '&') && substr_count($str, ';')) 
		{ 
			$amp_pos = strpos($str, '&');
			$semi_pos = strpos($str, ';'); 
			
			if($semi_pos > $amp_pos) 
			{ 
				$tmp = substr($str, 0, $amp_pos); 
				$tmp = $tmp. substr($str, $semi_pos + 1, strlen($str)); 
				$str = $tmp;
				
				if(substr_count($str, '&') && substr_count($str, ';')) 
					$str = $this->CleanEntities($tmp); 
			} 
		}
		
		return nl2br($str);
	}
	
	// Funci�n - Verificar si una cadena contiene ciertas palabras.
	// - $str: Cadena.
	// - $words: Palabra o Array de palabras a verificar.
	// - $lower (Bool): �Convertir todo a minusculas?
	public static function Contains($str, $words, $lower = false)
	{
		// La cadena no es v�lida. -.-"
		if(!is_string($str))
			return $str;
			
		// Convertir a minusculas.
		if($lower)
			$str = strtolower($str);
			
		// Al parecer solo es una palabra.
		if(!is_array($words))
			$wordss[] = $words;
			
		// Verificar...
		foreach($wordss as $w)
		{
			// Convertir a minusculas.
			if($lower)
				$w = strtolower($w);
			
			// �Hemos encontrada la palabra!
			if(is_numeric(@strpos($str, $w)))
				return true;
		}
		
		return false;
	}
	
	// Funci�n - Encontrar la palabra m�s similar de la palabra especificada.
	// - $str: Palabra original.
	// - $dic (Array): Diccionario de palabras a encontrar similitud.
	// - $debug (Bool): �Retonar Array con m�s detalles?
	public static function DoMean($str, $dic, $debug = false)
	{
		// La palabra no es v�lida o el direccionario no es v�lido.
		if(!is_string($str) OR !is_array($dic))
			return false;
			
		$l = 9999;
		$r = Array();
		
		// Ver las palabras del diccionario y aplicar la funci�n "levenshtein".
		foreach($dic as $word)
		{
			$i = levenshtein($str, $word);
			
			if($i == "0")
				return "";
			
			if($i < $l)
			{
				$l = $i;
				
				$r['word'] = $str;
				$r['mean'] = $word;
				$r['similar'] = $l;
				$r['porcent'] = (100 / strlen($str)) * $l;				
			}
		}
		
		return $debug ? $r : $r['mean'];
	}
	
	// Funci�n - Encontrar la palabra m�s similar de la palabra especificada.
	// - $str: Palabra original.
	// - $dic (Array): Diccionario de palabras a encontrar similitud.
	// - $debug (Bool): �Retonar Array con m�s detalles?
	public static function YouMean($str, $dic, $debug = false)
	{
		// La palabra no es v�lida o el direccionario no es v�lido.
		if(!is_string($str) OR !is_array($dic))
			return false;
			
		$l = 0;
		$r = Array();
		
		// Ver las palabras del diccionario y aplicar la funci�n "similar_text".
		foreach($dic as $word)
		{
			similar_text($str, $word, $i);
			
			if($i == "100")
				return "";
			
			if($i > $l)
			{
				$l = $i;
				
				$r['word'] = $str;
				$r['mean'] = $word;
				$r['porcent'] = $l;
			}
		}
		
		return $debug ? $r : $r['mean'];
	}
	
	// Funci�n - Cortar una cadena a la mitad.
	// - $str: Cadena a cortar.
	// - $w: Numero de veces a recortar.
	public static function CutText($str, $w = 2)
	{
		// La cadena no es v�lida. -.-"
		if(!is_string($str))
			return $str;
			
		// Limpiar todas las etiquetas HTML.
		$str = self::CleanHTML($str);
		// Longitud de la cadena.
		$n = strlen($str);
		
		$s = 0;
		$c = false;
		
		// Hacer un bucle hasta obtener la cadena recortada v�lida.
		while(!$c)
		{
			// Un intento m�s.
			$s++;
			// Dividir la longitud de la cadena por las veces a recortar.
			$new = round($num / $w);
			
			// Si es mayor a 5, es v�lida.
			if($new > 5)
				$c = true;
			// De otra forma, agregar una vez m�s al recorte.
			else
				$w++;
				
			// Hemos pasado los 20 intentos... Devolver cadena original.
			if($s >= 20)
				return $str;
		}
		
		return substr($str, 0, $new) . "...";
	}
	
	// Funci�n - Convertir BBCode.
	// - $str: Cadena a convertir.
	// - $smilies (Bool): �Incluir emoticones?
	public static function BBCode($str, $smilies = false)
	{
		// La cadena no es v�lida. -.-"
		if(!is_string($str))
			return $str;
			
		// Pasar por el filtro XSS.
		$str = self::CleanText($str);
		
		$simple_search = Array(
			'/\[b\](.*?)\[\/b\]/is', 
			'/\[i\](.*?)\[\/i\]/is', 
			'/\[u\](.*?)\[\/u\]/is', 
			'/\[s\](.*?)\[\/s\]/is', 
			'/\[url\=(.*?)\](.*?)\[\/url\]/is', 
			'/\[color\=(.*?)\](.*?)\[\/color\]/is', 
			'/\[size=small\](.*?)\[\/size\]/is', 
			'/\[size=large\](.*?)\[\/size\]/is', 
			'/\[size\=(.*?)\](.*?)\[\/size\]/is', 
			'/\[code\](.*?)\[\/code\]/is',
			
			'/\[youtube\=(.*?)_(.*?)\](.*?)\[\/youtube\]/is'
		);
		
		$simple_replace = Array(
			'<strong>$1</strong>', 
			'<i>$1</i>', 
			'<u>$1</u>', 
			'<s>$1</s>', 
			'<a href="$1">$2</a>', 
			'<font color="$1">$2</font>', 
			'<label style="font-size: 9px;">$1</label>', 
			'<label style="font-size: 14px;">$1</label>', 
			'<label style="font-size: $1px;">$2</label>', 
			'<pre>$1</pre>',
			
			'<iframe title="YouTube video player" width="$1" height="$2" src="http://www.youtube.com/embed/$3" frameborder="0" allowfullscreen></iframe>'
		);
		
		// Reemplazar c�digos BBC. 
		$str = preg_replace($simple_search, $simple_replace, $str);
		
		// Incluir emoticones.
		if($smilies)
			$str = self::Smilies($str);
			
		return $str;
	}
	
	// Funci�n - Convertir caritas de una cadena a emoticones visuales.
	// - $str: Cadena a convertir.
	// - $bbcode (Bool): �Incluir conversi�n de c�digos BBC?
	public static function Smilies($str, $bbcode = false)
	{
		// La cadena no es v�lida. -.-"
		if(!is_string($str))
			return $str;
			
		// Reemplazar caritas por emoticones visuales :B
		$emoticons = Array(
			':D' => 'awesomes',
			':)' => 'happy',
			'D:' => 'ohnoes',
			':0' => 'ohnoes',
			':O' => 'ohnoes',
			'OMG' => 'ohnoes',
			':3' => 'meow',
			'.___.' => 'huh',
			':S' => 'confused',
			':|' => 'blank',
			':P' => 'lick',
			'^^' => 'laugh',
			':(' => 'sad',
			';)' => 'wink',
			':B' => 'toofis',
			'jelly' => 'jelly',
			'jalea' => 'jelly'
		);
		
		foreach($emoticons as $e => $i)
			$str = str_replace($e, '<img src="data:;base64,' . Io::Read(BIT . "/Emoticons/$i.txt") . '" alt="' . $e . '" title="' . $e . '" />', $str);
		
		if($bbcode)
			$str = self::BBCode($str);
		
		return nl2br($str);
	}
	
	// Funci�n - Codificar/Encriptar una cadena.
	// - $str: Cadena a encriptar.
	// - $level: Nivel.
	public static function Encrypte($str, $level = 0)
	{
		// La cadena no es v�lida. -.-"
		if(!is_string($str))
			return $str;
		
		// Definiendo la configuraci�n de seguridad.
		global $config;
		$sec = $config['security'];
		
		if($level !== 0)
			$sec['level'] = $level;
		
		// Nivel 1: MD5
		if($sec['level'] == 1)
			$str = md5($str . $sec['hash']);
		// Nivel 2: SHA1
		if($sec['level'] == 2)
			$str = sha1($str . $sec['hash']);
		// Nivel 3: SHA256 con SHA1
		if($sec['level'] == 3)
		{
			$s = hash_init('sha256', HASH_HMAC, $sec['hash']);
			hash_update($s, sha1($str));
			hash_update($s, $sec['hash']);
			$str = hash_final($s);
		}
		// Nivel 4: SHA256 con SHA1 y MD5
		if($sec['level'] == 4)
		{
			$s = hash_init('sha256', HASH_HMAC, $sec['hash']);
			hash_update($s, sha1($str));
			hash_update($s, $sec['hash']);
			$str = hash_final($s);
			$str = md5($sec['hash'] . $str);
		}
		// Nivel 5: Codificaci�n reversible.
		if($sec['level'] == 5)
		{
			$result = "";
			
			for($i = 0; $i < strlen($str); $i++)
			{
				$char = substr($str, $i, 1);
				$keychar = substr($sec['hash'], ($i % strlen($sec['hash'])) -1, 1);
				$char = chr(ord($char) + ord($keychar));
				$result .= $char;
			}
			
			$str = base64_encode($result);
		}
		
		return $str;			
	}
	
	// Funci�n - Desencriptar una cadena encriptada con el Nivel 5.
	// - $str: Cadena a desencriptar.
	// - $force (Bool): �Forzar uso?
	public static function Decrypt($str, $force = false)
	{
		// La cadena no es v�lida. -.-"
		if(!is_string($str))
			return $str;
		
		// Definiendo la configuraci�n de seguridad.
		global $config;
		$sec = $config['security'];
		
		// El nivel de encriptaci�n no es el reversible.
		if($sec['level'] !== 5 AND $force == false)
			return "";
			
		$result = "";
		$str = base64_decode($str);
		
		for($i = 0; $i < strlen($str); $i++) 
		{
			$char = substr($str, $i, 1);
			$keychar = substr($sec['hash'], ($i % strlen($sec['hash']))-1, 1);
			$char = chr(ord($char) - ord($keychar));
			$result .= $char;
		}
		
		return $result;
	}
	
	// Funci�n - Generar una cadena al azar.
	// - $length (Int): Numero de caracteres.
	// - $letters (Bool): �Incluir letras?
	// - $numbers (Bool): �Incluir numeros?
	// - $other (Bool): �Incuir otros caracteres?
	public static function Random($length, $letters = true, $numbers = true, $other = false)
	{
		// Numero de caracteres no v�lido.
		if(!is_numeric($length))
			return;
			
		$result = "";
		$poss = "";
		$i = 0;
		
		// Queremos letras :B
		if($letters)
			$poss .= "abcdefhijklwxyz";
		
		// Queremos numeros :B		
		if($numbers)
			$poss .= "0123456789";
			
		// Queremos otros caracteres :B
		if($other)
			$poss .= "ABCDEFHIJKL@%&^*/(){}-_";
			
		// Ejecutar bucle para obtener la cadena.
		while($i < $length)
		{
			$result .= substr($poss, mt_rand(0, strlen($poss) - 1), 1);
			$i++;
		}
		
		return $result;
	}
	
	// Funci�n - Convertir el mes numerico de una fecha a mes en letras.
	// - $date: Cadena de fecha con separaci�n -, / � de
	public static function MonthNum($date)
	{
		// Identificando el tipo de separaci�n.
		if(self::Contains($date, "-"))
			$t = explode("-", $date);
		if(self::Contains($date, "/"))
			$t = explode("/", $date);
		if(self::Contains($date, "de"))
			$t = explode(" de ", $date);
			
		// Convirtiendo...
		$n = GetMonth($t[1]);		
		return "$t[0]-$n-$t[2]";
	}
	
	// Funci�n - Convertir tiempo Unix a tiempo en letras.
	// - $time (Int): Tiempo Unix.
	// - $hour (Bool): �Incluir hora?
	// - $type (1, 2, 3): Tipo de separaci�n.
	public static function TimeDate($time = '', $hour = false, $type = 1)
	{
		// Si el tiempo unix esta vacio, usar el actual.
		if(empty($time))
			$time = time();
			
		// El tipo no es v�lido.
		if(!is_numeric($type) OR $type < 1 OR $type > 3)
			$type = 1;
		
		// Devolviendo fecha convertida.
		if($type == 1)
			$date = date('d', $time) . "-" . GetMonth(date('m', $time)) . "-" . date('Y', $time);
		if($type == 2)
			$date = date('d', $time) . "/" . GetMonth(date('m', $time)) . "/" . date('Y', $time);
		if($type == 3)
			$date = date('d', $time) . " de " . GetMonth(date('m', $time)) . " de " . date('Y', $time);
		
		if($hour)
			$date .= " - " . date('H:i:s', $time);
			
		return $date;
	}
	
	// Funci�n - Calcular tiempo restante/faltante.
	// - $date: Tiempo Unix o cadena de tiempo.
	public static function CalculateTime($date, $num = false)
	{
		$int = Array("segundo", "minuto", "hora", "d�a", "semana", "mes", "a�o");
		$dur = Array(60, 60, 24, 7, 4.35, 12, 12);
		
		if(!is_numeric($date))
			$date = strtotime($date);
		
		$now = time();
		$time = $date;
		
		if($now > $time)
		{
			$dif = $now - $time;
			$str = "Hace";
		}
		else
		{
			$dif = $time - $now;
			$str = "Dentro de";
		}
		
		for($j = 0; $dif >= $dur[$j] && $j < count($dur) - 1; $j++)
			$dif /= $dur[$j];
			
		$dif = round($dif);
		
		if($dif != 1)
		{
			$int[5] .= "e";
			$int[$j] .= "s";
		}
		
		return $num ? "$dif $int[$j]" : "$str $dif $int[$j]";
	}
	
	// Funci�n - Convertir valor num�rico a un mes del a�o.
	// - $num (Int): Valor num�rico.
	// - $c (Bool): �Retornar todo el mes?
	public static function getMonth($num, $c = false)
	{
		$calendar = array(
          '01' => 'enero',
          '02' => 'febrero',
          '03' => 'marzo',
          '04' => 'abril',
          '05' => 'mayo',
          '06' => 'junio',
          '07' => 'julio',
          '08' => 'agosto',
		  '09' => 'septiembre',
          '10' => 'octubre',
          '11' => 'noviembre',
		  '12' => 'diciembre',
		  '1' => 'enero',
          '2' => 'febrero',
          '3' => 'marzo',
          '4' => 'abril',
          '5' => 'mayo',
          '6' => 'junio',
          '7' => 'julio',
          '8' => 'agosto',
		  '9' => 'septiembre'
		);
		
		foreach($calendar as $n => $month)
		{
			if(preg_match("/$n/", $num))
			{
				if($c)
					return $month;
				else
					return substr($month, 0, 3);
			}
		}
		
		return "Desconocido";
	}
	
	// Funci�n - Convertir mes de un a�o a su valor num�rico.
	// - $name: Mes de a�o.
	public static function getMonthNum($name)
	{
		$calendar = array(
          '01' => 'enero',
          '02' => 'febrero',
          '03' => 'marzo',
          '04' => 'abril',
          '05' => 'mayo',
          '06' => 'junio',
          '07' => 'julio',
          '08' => 'agosto',
		  '09' => 'septiembre',
          '10' => 'octubre',
          '11' => 'noviembre',
		  '12' => 'diciembre'
		);
		
		foreach($calendar as $n => $month)
		{
			if(preg_match("/$month/i", $name))
				return $n;
				
			$month = substr($month, 0, 3);
			
			if(preg_match("/$month/i", $name))
				return $n;
		}
	}
	
	// Funci�n - Obtener el navegador web del Agente web.
	// - $agent: Agente web.
	public static function GetBrowser($agent = '')
	{
		// Agente web vacio, usar el actual.
		if(empty($agent))
			$agent = AGENT;
			
		$navegadores = array(
		  'Opera Mini' => 'Opera Mini',
		  'Opera Mobile' => 'Opera Mobi',
		  'Mobile' => 'Mobile',
		   
          'Opera' => 'Opera',
          'Mozilla Firefox' => 'Firefox',
		  'RockMelt' => 'RockMelt',
          'Google Chrome' => 'Chrome',
		  'Maxthon' => 'Maxthon',
		  
		  'Internet Explorer 10' => 'MSIE 10',
		  'Internet Explorer 9' => 'MSIE 9',
		  'Internet Explorer' => 'MSIE',
		  
		  'Galeon' => 'Galeon',
          'MyIE' => 'MyIE',
          'Lynx' => 'Lynx',
          'Konqueror' => 'Konqueror',		  
		  'Mozilla' => 'Mozilla/5',
		  
		  'Google BOT' => 'Googlebot',
		  'Google Adsense BOT' => 'Mediapartners-Google',
		  'Google AdWords BOT' => 'Adsbot-Google',
		  'Google Images BOT' => 'Googlebot-Image',
		  'Google Site Verification BOT' => 'Google-Site-Verification',
		  
		  'Facebook BOT' => 'facebookexternalhit',
		  'Twitter BOT' => 'Twitterbot',
		  'PostRank BOT' => 'PostRank',		  
		  'InfoSmart BOT' => 'InfoBot',
		  'Nikiri BOT' => 'NikirinBOT',
		  
		  'Ezooms BOT' => 'Ezooms',
		  'Yandex BOT' => 'YandexBot',
		  'Alexa BOT' => 'alexa.com',
		  'MetaURI BOT' => 'MetaURI',
		  'Gnip.com BOT' => 'UnwindFetchor',
		  'Creative Commons BOT' => 'CC Metadata',
		  'LongURL BOT' => 'LongURL',
		  'Bit.ly BOT' => 'bitlybot',
		  'InAgist BOT' => 'InAGist',
		  'Twitmunin BOT' => 'Twitmunin',
		  'Twikle BOT' => 'Twikle',
		  'AddThis BOT' => 'AddThis.com',
		  
		  'Http Client' => 'HttpClient'
		);
		
		foreach($navegadores as $navegador => $pattern)
		{
			if(preg_match("/$pattern/i", $agent))
				return $navegador;
		}

		return 'Desconocido';
	}
	
	// Funci�n - Obtener el sistema operativo del Agente web.
	// - $agent: Agente web.
	public static function GetOS($agent = '') 
	{
		// Agente web vacio, usar el actual.
		if(empty($agent))
			$agent = AGENT;
			
		$so_s = array(
			'Android' => 'Android',
			'iPhone' => 'iPhone',
			'iPod' => 'iPod',
			'BlackBerry' => 'BlackBerry',
			
			'Windows 7' => 'Windows NT 6.1',
			'Windows Vista' => 'Windows NT 6.0',
			'Windows Server 2003' => 'Windows NT 5.2',
			'Windows XP' => 'Windows NT 5.1|Windows XP',
			'Windows 2000' => 'Windows NT 5.0|Windows 2000',
			'Windows 98' => 'Windows 98|Win98',
		  
			'Windows 95' => 'Windows 95|Win95|Windows_95',
			'Windows ME' => 'Windows 98|Win 9x 4.90|Windows ME',
			'Linux' => 'Linux|X11',
			'MacOS' => 'Mac_PowerPC|Macintosh'
		);
		
		foreach($so_s as $so=>$pattern)
		{
			if(preg_match("/$pattern/i", $agent))
				return $so;
		}
		
		return 'Desconocido';
	}
	
	// Funci�n - Identificar si el Agente web es un m�vil.
	// - $agent: Agente web.
	public static function IsMobile($agent = '')
	{
		// Agente web vacio, usar el actual.
		if(empty($agent))
			$agent = AGENT;
			
		// Definir Navegador web y sistema operativo.
		$browser = self::GetBrowser($agent);
		$os = self::GetOS($agent);
		
		// Estamos testeando la web m�vil :B
		if(defined("TEST_MOB"))
			return true;
			
		if(preg_match("/Opera Mini|Opera Mobile|Mobile/i", $browser))
			return true;
			
		if(preg_match("/Android|iPhone|iPod|BlackBerry/i", $os))
			return true;		
		
		return false;
	}
	
	// Funci�n - Identificar si el Agente web es un robot.
	// - $agent: Agente web.
	public static function IsBOT($agent = '')
	{
		// Agente web vacio, usar el actual.
		if(empty($agent))
			$agent = AGENT;
			
		// Definir Navegador web.
		$browser = self::GetBrowser($agent);
		return strpos($browser, "BOT") == false ? false : true;
	}
	
	// Funci�n - Env�ar un correo electr�nico.
	// - $data (Array): Datos de envio y configuraci�n.
	public static function sendEmail($data)
	{
		// Los datos no son v�lidos.
		if(!is_array($data))
			return false;
			
		// El metodo de envio no es v�lido.
		if($data['method'] !== "mail" AND $data['method'] !== "phpmailer")
			$data['method'] = "mail";
			
		// El remitente esta vacio, usar el predeterminado.
		if(empty($data['from']))
			$data['from'] = "noreply_beatrock@infosmart.mx";
			
		// No se especifico si es un correo HTML, especificar que si es HTML.
		if(empty($data['html']))
			$data['html'] = true;
			
		// El nombre del remitente esta vacio, usar el nombre de la aplicaci�n.
		if(empty($data['from.name']))
			$data['from.name'] = SITE_NAME;
			
		// El tipo de contenido no se especifico, usar HTML.
		if(empty($data['content']))
		{
			$data['content'] = "text/html";
			$data['html'] = true;
		}
			
		// Envio por medio de la funci�n Mail.
		if($data['method'] == "mail")
		{
			$headers = "";
			$headers .= "Return-Path: <$data[from]>\r\n";
			$headers .= "From: \"" . $data['from.name'] . "\" <$data[from]>\r\n";
			$headers .= "Reply-to: noreply <$data[from]>\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: $data[content]; charset=iso-8859-1\r\n";
			
			$data['body'] = stripslashes(wordwrap($data['body'], 70));
			$data['result'] = @mail($data['to'], $data['subject'], $data['body'], $headers);
		}
		// Envio por medio de la librer�a PHPMailer.
		else
		{
			$Mail = new PHPMailer();
			
			$Mail->From = $data['from'];
			$Mail->FromName = $data['from.name'];
			$Mail->AddAddress($data['to']);
			$Mail->Subject = $data['subject'];
			$Mail->Body = $data['body'];
			$Mail->MsgHTML($data['body']);
			$Mail->IsHTML($data['html']);
			
			if(!empty($data['host']) AND !empty($data['host.port']) AND !empty($data['host.username']))
			{
				$Mail->IsSMTP();
					
				$Mail->Host = $data['host'];
				$Mail->Port = $data['host.port'];
				$Mail->SMTPAuth = true;
				$Mail->Username = $data['host.username'];
				$Mail->Password = $data['host.password'];
				
				if(!empty($data['host.secure']))
					$Mail->SMTPSecure = $data['host.secure'];
			}
			
			$data['result'] = $Mail->Send();
		}
		
		return $data['result'];
	}
	
	// Funci�n - Enviar un correo electr�nico de Error.
	public static function sendError()
	{
		global $config;
		
		if(empty($config['errors']['email.to']) OR !self::isValid($config['errors']['email.to']))
			return false;
		
		$message = Tpl::Process(BIT . "/Templates/Error.Mail", true);
		
		// Enviar correo por medio de la funci�n mail()
		$result = Core::sendEmail(Array(
			'method' => 'mail',
			'to' => $config['errors']['email.to'],
			'subject' => 'Ha ocurrido un error en ' . SITE_NAME,
			'body' => $message
		));
			
		// No funciono, enviando por medio del servidor de InfoSmart.
		if(!$result)
		{			
			$result = Core::sendEmail(Array(
				'method' => 'phpmailer',
				'to' => $config['errors']['email.to'],
				'subject' => 'Ha ocurrido un problema en ' . SITE_NAME,
				'body' => $message,
				'host' => 'mail.infosmart.mx',
				'host.port' => 25,
				'host.username' => 'beatrock_send@infosmart.mx',
				'host.password' => 'BeatRock123'
			));
		}
		
		return $result;
	}
	
	// Funci�n - Ocultar el error.
	public static function HiddenError()
	{
		global $config;
		
		if(!$config['errors']['hidden'])
			return;
			
		if(!is_numeric($_SESSION['beatrock']['hidden']))
			$_SESSION['beatrock']['hidden'] = 0;
						
		$_SESSION['beatrock']['hidden']++;
					
		if($_SESSION['beatrock']['hidden'] < 5)
			exit("<META HTTP-EQUIV='refresh' CONTENT='0; URL=$PHP_SELF'>");
		else if($_SESSION['beatrock']['hidden'] < 10)
			self::Redirect(PATH);
		else
			unset($_SESSION['beatrock']['hidden']);
	}
	
	// Funci�n - Selecionar un dato al azar de los especificados.
	// - $options (Array): Datos.
	public static function SelectRandom($options)
	{
		// Los datos no son v�lidos.
		if(!is_array($options))
			return false;
			
		$i = 0;
		$m = rand(2, 9);
		
		while($i <= $m)
		{
			foreach($options as $option)
			{
				$i++;
				
				if($i == $m)
				{
					if(!empty($option))
						return $option;
					else
						$i--;
				}
			}
		}
		
		return false;
	}
	
	// Funci�n - Obtener el dominio de una direcci�n web.
	// - $url: Direcci�n web.
	public static function GetDomain($url)
	{
		$bits = explode('/', $url);
		
		if ($bits[0]=='http:' || $bits[0]=='https:')
			$url= $bits[2]; 
		else
			$url= $bits[0]; 
			
		unset($bits);
		
		$bits = explode('.', $url); 		
		$idz = count($bits); 
		$idz -= 3; 
		
		if (strlen($bits[($idz+2)])==2)
			$url = $bits[$idz] . '.' . $bits[($idz+1)] . '.' . $bits[($idz+2)]; 
		else if (strlen($bits[($idz+2)])==0) 
			$url=$bits[($idz)] . '.' . $bits[($idz+1)]; 
		else
			$url=$bits[($idz+1)] . '.' . $bits[($idz+2)];
			
		return $url; 
	}
	
	// Funci�n - Obtener el host de una direcci�n web.
	// - $url: Direcci�n web.
	public static function GetHost($url)
	{
		$parseUrl = parse_url(trim($url));		
		return trim($parseUrl[host] ? $parseUrl[host] : array_shift(explode('/', $parseUrl[path], 2))); 
	}
	
	// Funci�n - Obtener la p�gina de una direcci�n web.
	// - $url: Direcci�n web.
	public static function GetPage($url)
	{
		$r  = "^(?:(?P<scheme>\w+)://)?";
        $r .= "(?:(?P<login>\w+):(?P<pass>\w+)@)?";
        $r .= "(?P<host>(?:(?P<subdomain>[-\w\.]+)\.)?" . "(?P<domain>[-\w]+\.(?P<extension>\w+)))";
        $r .= "(?::(?P<port>\d+))?";
        $r .= "(?P<path>[\w/]*/(?P<file>\w+(?:\.\w+)?)?)?";
        $r .= "(?:\?(?P<arg>[\w=&]+))?";
        $r .= "(?:#(?P<anchor>\w+))?";
        $r = "!$r!";
       
        preg_match ($r, $url, $out);
		
		if(!empty($out['file']))
			return $out['file'];
		else if(!empty($out['path']) AND $out['path'] !== "/")
			return $out['path'];
		else
			return "";
	}

	// Funci�n - Traducir una cadena.
	// - $str: Cadena.
	// - $from: Lenguaje original.
	// - $to: Lenguaje a traducir.
	// - $id: ID de aplicaci�n de desarrolladores "Microsoft".
	public static function Translate($str, $from = "en", $to = "", $id = C9A399184CB7790D220EF5E812D7BFF636488705)
	{
		global $site;

		// ID no v�lida.
		if(empty($id) OR empty($str))
			return $str;

		if(empty($to))
			$to = $site['site_language'];

		$sstr = md5($str);

		if(!empty($_SESSION['translate'][$sstr]))
			return $_SESSION['translate'][$sstr];

		// Preparando la cadena y direcci�n.
		$str = rawurlencode(CleanText($str));
		$url = "http://api.microsofttranslator.com/v2/Http.svc/Translate?appId=$id&text=$str&from=$from&to=$to";

		// Recibir, filtrar y devolver resultado.
		$data = self::CleanHTML(Io::Read($url));
		$data = ucfirst($data);

		$_SESSION['translate'][$sstr] = $data;
		return $data;
	}
	
	// Funci�n - Transforma las direcciones en links encontradas en la cadena.
	// - $str: Cadena.
	public static function ToURL($str)
	{
		$str = html_entity_decode($str);
		
		$str = preg_replace('/(http:\/\/|https:\/\/|www.)([A-Z0-9][A-Z0-9_-]*(?:\.[A-Z0-9][A-Z0-9_-]*)+)?(\d+)?\/?/is', '<a href="${1}${2}" target="_blank">${2}</a>', $str);
		$str = str_ireplace('href="www.', 'href="http://www.', $str);
		
		return $str;
	}
	
	public static function AllowCross($domain, $max_age = 3628800, $methods = "PUT, DELETE, POST")
	{
		header("Access-Control-Allow-Origin: $domain");
		header("Access-Control-Max-Age: $max_age");
		header("Access-Control-Allow-Methods: $methods");
	}
	
	public static function Protect($frame = "SAMEORIGIN")
	{
		header("X-Frame-Options: $frame");
		header("X-XSS-Protection: 1; mode=block");
	}
	
	// Funci�n - Obtiene el uso de memoria en Bytes por el proceso de Apache. "httpd"
	public static function memory_usage() 
    {
		// Usar t�cnica para Windows.
        if (substr(PHP_OS, 0, 3) == 'WIN') 
        { 
            $output = array(); 
            exec('tasklist /FI "PID eq ' . getmypid() . '" /FO LIST', $output);
        
            return preg_replace('/[\D]/', '', $output[5]) * 1024;
        }
		// Usar t�cnica para Linux.
		else 
        { 
            $pid = getmypid(); 
            exec("ps -eo%mem,rss,pid | grep $pid", $output); 
            $output = explode("  ", $output[0]); 

            return $output[1] * 1024; 
        } 
    }
	
	// Funci�n - Obtiene el uso de la carga media del sistema.
	public static function sys_load()
	{
		// Usar t�cnica para Windows.
        if (substr(PHP_OS, 0, 3) == 'WIN') 
        {
			$wmi = new COM("WinMgmts:\\\\.");
			$cpus = $wmi->InstancesOf("Win32_Processor");
			$load = 0;
			
			foreach($cpus as $c)
				$load += $c->LoadPercentage;
			
			return $load;
		}
		// Usar t�cnica para Linux.
		else 
        {
			$load = sys_getloadavg();
			return $load[0];
		}
	}
	
	// Funci�n - Convertir una cadena a un dato bool (true o false).
	// - $str: Cadena.
	public static function Bool($str)
	{
		if(is_bool($var))
			return $var;
		else if($var === NULL || $var === 'NULL' || $var === 'null')
			return false;
		else if(is_string($var))
		{
			$var = trim($var);
			
			if($var == 'false')
				return false;
			else if($var == 'true')
				return true;
			else if($var == 'no')
				return false;
			else if($var == 'yes')
				return true;
			else if($var == 'off')
				return false;
			else if($var == 'on')
				return true;
			else if($var == '')
				return false;
			else if(ctype_digit($var))
			{
				if((int) $var)
					return true;
				else
					return false;
			} 
			else
				return true;
		}
		else if(ctype_digit((string) $var))
		{
			if((int) $var)
				return true;
			else
			return false;
		} 
		else if(is_array($var))
		{
			if(count($var))
				return true;
			else
				return false;
		}
		else if(is_object($var))
			return true;
		else
			return true;
	}
	
	// Funci�n - Identificar si la cadena es de codificaci�n UTF-8.
	// - $str: Cadena.
	public static function isUtf8($str) 
	{ 
		$len = strlen($str); 
		
		for($i = 0; $i < $len; $i++)
		{ 
			$c = ord($str[$i]);
			
			if ($c > 128) 
			{ 
				if(($c > 247)) 
					return false; 
				else if($c > 239) 
					$bytes = 4; 
				else if($c > 223) 
					$bytes = 3; 
				else if($c > 191)
					$bytes = 2; 
				else 
					return false; 
            
				if(($i + $bytes) > $len) 
					return false; 
					
				while ($bytes > 1) 
				{ 
					$i++; 
					$b = ord($str[$i]); 
					
					if($b < 128 || $b > 191) 
						return false;
						
					$bytes--; 
				} 
			} 
		}
		
		return true; 
	}
}
?>