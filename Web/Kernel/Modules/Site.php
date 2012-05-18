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

class Site
{
	// Funci�n - Obtener la configuraci�n del sitio.
	public static function getConfiguration()
	{
		// Ejecutando consulta para la configuraci�n.
		$sql = query("SELECT * FROM {DA}site_config");
		
		while($row = MySQL::fetch_assoc())
		{
			$i = 0;
			
			foreach($row as $param => $value)
			{
				$i++;
				
				if($i == 1)
					$p = $value;
				else
					$v = $value;
			}
			
			$site[$p] = $v;
		}
		
		return $site;
	}
	
	// Funci�n - Actualizar configuraci�n del sitio.
	// - $var: Variable.
	// - $value: Nuevo valor.
	public static function updateConf($var, $value)
	{
		global $site;
		
		query_update('site_config', Array(
			'result' => $value
		), Array(
			"var = '$var'"
		));
		
		$site[$var] = $value;
	}
	
	// Funci�n - Agregar una nueva visita.
	public static function addVisit()
	{
		// Obteniendo el host del usuario y ejecutando consulta de verificaci�n.
		$h = Client::Get("host");
		$n = query_rows("SELECT null FROM {DA}site_visits WHERE ip = '" . IP . "' OR host = '" . $h . "' OR phpid = '" . session_id() . "' LIMIT 1");
		
		// Este usuario ya nos ha visitado.
		if($n !== 0 OR Core::theSession("visit_me") == "true")
			return;
			
		// Navegador web: Normal/Escritorio.
		$type = "desktop";
			
		// Navegador web: M�vil.
		if(Core::IsMobile())
			$type = "mobile";
			
		// Navegador web: BOT/Robot.
		if(Core::IsBOT())
			$type = "bot";
		
		// Insertar en las visitas.
		query_insert('site_visits', Array(
			'ip' => IP,
			'host' => $h,
			'agent' => FilterText(AGENT),
			'browser' => Client::Get("browser"),
			'referer' => FilterText(FROM),
			'phpid' => session_id(),
			'type' => $type,
			'date' => time()
		));
		
		// Ya nos ha visitado y agregar una visita a la tabla de configuraci�n del sitio.
		Core::theSession("visit_me", "true");
		query("UPDATE {DA}site_config SET result = result + 1 WHERE var = 'site_visits' LIMIT 1");
	}
	
	// Funci�n - Checar cronometros.
	public static function checkTimers()
	{
		// Ejecutar consulta para obtener los cronometros.
		$q = query("SELECT * FROM {DA}site_timers");
		
		while($row = MySQL::fetch_assoc())
		{
			// Algo aqu� anda mal, continuar con el pr�ximo...
			if($row['time'] == "0")
				continue;
			// A�n no le toca ejecutarse, continuar con el pr�ximo...
			if($row['nexttime'] >= time())
				continue;
				
			// Ejecutar cronometro.
			self::doTimer($row['action']);
			// Definiendo pr�xima ejecuci�n.
			$next = Core::Time($row['time']);
			
			// Actualizar cronometro.
			query_update('site_timers', Array(
				'nexttime' => $next,
			), Array(
				"id = '$row[id]'"
			));
		}
	}
	
	// Funci�n - Ejecutar cronometro.
	// - $a: Cronometro.
	public static function doTimer($a)
	{
		if(empty($a))
			return;
			
		switch($a)
		{
			case "optimize_db":
				MySQL::Optimize();
			break;
			
			case "maintenance_db":
				query("TRUNCATE TABLE {DA}site_visits");
				query("TRUNCATE TABLE {DA}site_errors");
				query("TRUNCATE TABLE {DA}site_logs");
			break;
			
			case "backup_db":
				MySQL::Backup();
			break;
			
			case "backup_app":
				BitRock::Backup();
			break;
			
			case "backup_total":
				BitRock::Backup(true);
			break;
			
			case "maintenance":
				Io::EmptyDir(Array(BIT . 'Logs', BIT . 'Backups', BIT . 'Temp', BIT . 'Cache'));
			break;
		}
		
		BitRock::log("Se ha ejecutado el cronometro '$a' con �xito.");
	}
	
	// Funci�n - Obtener datos.
	// - $a (countrys, maps, news): Tipo de datos a obtener.
	// - $limit (Int): Limite de valores a obtener.
	public static function Get($a = 'countrys', $limit = 0)
	{
		// Tipo inv�lido.
		if($a !== 'countrys' AND $a !== 'maps' AND $a !== 'news')
			return false;	
			
		// Estructurar y ejecutar consulta.
		$q = "SELECT * FROM {DA}site_$a ORDER BY ";
		
		if($a == 'countrys')
			$q .= 'name ASC';
		else
			$q .= 'id DESC';
			
		if($limit !== 0)
			$q .= " LIMIT $limit";
			
		return query($q);
	}
	
	// Funci�n - Obtener noticia.
	// - $id (Int): ID de la noticia.
	public static function getNew($id)
	{
		$q = query("SELECT * FROM {DA}site_news WHERE id = '$id' LIMIT 1");		
		return MySQL::num_rows() > 0 ? $q : false;
	}
	
	// Funci�n - Guardar logs actuales.
	public static function saveLog()
	{
		// Obteniendo los logs.
		$logs = BitRock::$logs['all']['text'];
		
		// No hay logs que guardar.
		if(empty($logs))
			return;
			
		query_insert('site_logs', Array(
			'logs' => FilterText($logs, false),
			'phpid' => session_id(),
			'path' => FilterText(PATH),
			'date' => time()
		));
	}
	
	// Funci�n - Obtener traducciones.
	// - $lang: C�digo de lenguaje.
	public static function getTranslations($lang = "")
	{		
		if(empty($lang))
			$lang = LANG;
			
		echo $lang;
			
		$q = query("SELECT * FROM {DA}site_translate WHERE language = '$lang'");
		return MySQL::num_rows() > 0 ? $q : false;
	}
	
	// Funci�n - Obtener traducciones.
	// - $lang: C�digo de lenguaje.
	public static function getTranslation($lang = "")
	{		
		if(empty($lang))
			$lang = LANG;
			
		$q = query("SELECT * FROM {DA}site_translate WHERE language = '$lang'");
		$result = Array();
		
		if(MySQL::num_rows() > 0)
		{
			while($row = mysql_fetch_assoc($q))
				$result[$row['var']] = $row['translated'];
		}
		
		return $result;
	}
	
	
	public static function getCache($page)
	{
		$q = query("SELECT * FROM {DA}site_cache WHERE page = '$page' LIMIT 1");
		return MySQL::num_rows() > 0 ? mysql_fetch_assoc($q) : false;
	}
	
	// Funci�n - Obtener p�gina de la petici�n.
	// - $request: P�gina solicitada.
	public static function getPage($request)
	{
		// Separando de parametros externos.
		$srequest = explode("?", $request);
		// P�gina a solicitar.
		$page = $srequest[0];

		if(empty($page))
			$page = "index";
		
		// Ejecutar consulta.
		$q = query("SELECT * FROM {DA}site_pages WHERE request = '$page' LIMIT 1");
		
		// P�gina encontrada.
		if(MySQL::num_rows() > 0)
		{
			// Obteniendo los datos de la p�gina.
			$result = mysql_fetch_assoc($q);
			
			// Al parecer hay parametros externos.
			if(!empty($srequest[1]))
			{
				$params = explode("&", $srequest[1]);
				
				foreach($params as $p)
				{
					$val = explode("=", $p);
					$result['params'][$val[0]] = $val[1];
				}
			}
		}
		else
			return false;
		
		return $result;
	}
	
	
	/*####################################################
	##	FUNCIONES PERSONALIZADAS						##
	####################################################*/
}
?>