<?php
##############################################################
## 						  BeatRock				  	   		##
##############################################################
## Framework avanzado de procesamiento para PHP.   			##
##############################################################
## InfoSmart � 2012 Todos los derechos reservados. 			##
## Iv�n Bravo Bravo - Kolesias123			  	   			##
## http://www.infosmart.mx/									##
##############################################################
## BeatRock se encuentra bajo la licencia de	   			##
## Creative Commons "Atribuci�n-Licenciamiento Rec�proco"	##
## http://creativecommons.org/licenses/by-sa/2.5/mx/		##
##############################################################
## http://beatrock.infosmart.mx/				  			##
##############################################################

// ######################################################## //
// 		   Inicializaci�n (Initialization - Init)			//
// ######################################################## //
// Archivo de procesamiento principal interno, encargado    //
// de iniciar y administrar los procesos y modulos de carga //
// del Kernel y sus respectivos sistemas.					//
// ######################################################## //

/*####################################################
##	PREPARACI�N DE CONSTANTES Y OPCIONES INTERNAS	##
####################################################*/

// Permitir acciones internas.
define('BEATROCK', true);
define('START', microtime(true));
//define('DEBUG', true);

// Informaci�n esencial del cliente.
define('IP', $_SERVER['REMOTE_ADDR']);
define('AGENT', @$_SERVER['HTTP_USER_AGENT']);
define('FROM', @$_SERVER['HTTP_REFERER']);
define('LANG', @substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2));

// Direcci�n actual y uso del protocolo seguro.
define('URL', $_SERVER['SERVER_NAME'] . $_SERVER["REQUEST_URI"]);
define('SSL', @$_SERVER['HTTPS']);

// Parametros de ubicaci�n interna.
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(__FILE__) . DS);

// Subparametros de ubicaci�n interna.
define('KERNEL', ROOT . 'Kernel' . DS);
define('TEMPLATES', KERNEL . 'Templates' . DS);
define('HEADERS', KERNEL . 'Headers' . DS);
define('BIT', KERNEL . 'BitRock' . DS);
define('BIT_TEMP', KERNEL . 'BitRock' . DS . 'Templates' . DS);
define('MODS', KERNEL . 'Modules' . DS);

// Ajustando configuraci�n de PHP recomendada.
ini_set('safe_mode', 'Off');
ini_set('register_globals', 'Off');
ini_set('default_charset', 'iso-8859-15');
ini_set('zlib.output_compression', 'Off');
error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

// Empezar sesi�n.
session_start();

/*########################################################
##	INICIANDO BitRock: Administrador total del sistema	##
########################################################*/

// Informaci�n del Kernel.
require(KERNEL . 'Info.php');

// Enviando cabeceras predeterminadas.
header("Server: X", true);
header("X-Powered-By: BeatRock v$Info[version]: http://beatrock.infosmart.mx/");

// Modulo: BitRock.
require(MODS . 'BitRock.php');
new BitRock();

/*####################################################
##	INICIANDO INSTANCIAS DEL SISTEMA				##
####################################################*/

// Preparando y obteniendo variables del archivo de Configuraci�n.
$config = Setup::Init();
// Realizando conexi�n al servidor MySQL.
MySQL::Connect();	
	
// Agregando una nueva visita a la base de datos.
Site::addVisit();
// Obteniendo la configuraci�n del sitio web.
$site = Site::getConfiguration();
// Obteniendo datos "POST" perdidos en una sesi�n anterior.
Client::GetPost();
// Obteniendo traducci�n actual.
$lang = Site::getTranslation();

/*####################################################
##	RECUPERACI�N AVANZADA							##
####################################################*/

// Definiendo la recuperaci�n avanzada.
$back = Core::theSession("backup_time");

// Si la configuraci�n avanzada esta activada, guardar en variables de sesi�n
// la informaci�n perteneciente al archivo de configuraci�n y una copia
// de seguridad de la base de datos.
if($config['server']['backup'] AND (empty($back) OR time() > $back))
{
	Core::theSession("backup_config", Io::Read(KERNEL . 'Configuration.php'));
	Core::theSession("backup_db", MySQL::Backup('', true));
	Core::theSession("backup_time", Core::Time(30, 2));
}
// De otra forma, borrar todo dato.
else if(!$config['server']['backup'])
{
	Core::delSession("backup_config");
	Core::delSession("backup_db");
	Core::delSession("backup_time");
}
	
/*####################################################
##	FUNCIONES DE ACCESO DIRECTO						##
####################################################*/

// Funci�n - Ajustar accesos directos.
// - $str: 	Cadena de texto a ajustar.
function ShortCuts($str)
{
	
	$str = str_ireplace('{DA}', DB_ALIAS, $str);
	$str = str_ireplace('{SITE_NAME}', SITE_NAME, $str);
	$str = str_ireplace('{PATH}', PATH, $str);
	$str = str_ireplace('{PATH_SSL}', PATH_SSL, $str);
	$str = str_ireplace('{PATH_NS}', PATH_NS, $str);
	$str = str_ireplace('{ADMIN}', ADMIN, $str);
	$str = str_ireplace('{PROTOCOL}', PROTOCOL, $str);
	$str = str_ireplace('{RESOURCES}', RESOURCES, $str);
	$str = str_ireplace('{RESOURCES_SYS}', RESOURCES_SYS, $str);
	$str = str_ireplace('{IP}', IP, $str);
	$str = str_ireplace('{AGENT}', AGENT, $str);
	$str = str_ireplace('{BROWSER}', BROWSER, $str);
	$str = str_ireplace('{OS}', OS, $str);
	$str = str_ireplace('{HOST}', HOST, $str);
	$str = str_ireplace('{DOMAIN}', DOMAIN, $str);

	return $str;
}

// Funci�n - Ejecutar consulta en el servidor MySQL.
// - $q: Consulta a ejecutar.
// - $cache: �Guardar resultados en cach�?
function query($q, $cache = false)
{
	return MySQL::query($q, $cache);
}

// Funci�n - Insertar datos en la base de datos.
// - $table: Tabla a insertar los datos.
// - $data (Array): Datos a insertar.
function query_insert($table, $data)
{
	return MySQL::query_insert($table, $data);
}

// Funci�n - Actualizar datos en la base de datos.
// - $table: Tabla a insertar los datos.
// - $updates (Array): Datos a actualizar.
// - $where (Array): Condiciones a cumplir.
// - $limt (Int): Limite de columnas a actualizar.
function query_update($table, $updates, $where = '', $limit = 1)
{
	return MySQL::query_update($table, $updates, $where, $limit);
}

// Funci�n - Obtener numero de valores de una consulta MySQL.
// - $q: Consulta a ejecutar.
function query_rows($q)
{
	return MySQL::query_rows($q);
}

// Funci�n - Obtener un dato especifico de una consulta MySQL.
// - $q: Consulta a ejecutar.
// - $row: Dato a obtener.
function query_get($q, $row)
{
	return MySQL::query_get($q, $row);
}

// Funci�n - Filtrar una cadena para evitar Inyecci�n SQL.
// - $str: Cadena a filtrar.
// - $html (Bool): �Filtrar HTML con HTML ENTITIES? (Evitar Inyecci�n XSS)
// - $e (Charset): Codificaci�n de letras de la cadena a filtrar.
function FilterText($str, $html = true, $e = "ISO-8859-15")
{
	return Core::FilterText($str, $html, $e);
}

// Funci�n - Filtrar una cadena para evitar Inyecci�n XSS.
// - $str: Cadena a filtrar.
// - $e (Charset): Codificaci�n de letras de la cadena a filtrar.
function CleanText($str, $e = "ISO-8859-15")
{
	return Core::CleanText($str, $e);
}

// Funci�n - B�squeda de un t�rmino en una cadena.
// - $str: Cadena donde buscar.
// - $words (Cadena/Array): T�rmino(s) a buscar.
// - $lower (Bool): �Convertir todo a minusculas?
function Contains($str, $words, $lower = false)
{
	return Core::Contains($str, $words, $lower);
}

// Funci�n - Obtener la fecha actual en caracteres.
// - $hour (Bool): �Incluir hora?
// - $type (1, 2, 3): Modo de respuesta.
function NormalDate($hour = true, $type = 1)
{
	if(!is_numeric($type) OR $type < 1 OR $type > 3)
		$type = 1;
		
	if($type == 1)
		$date = date('d') . "-" . GetMonth(date('m')) . "-" . date('Y');
	if($type == 2)
		$date = date('d') . "/" . GetMonth(date('m')) . "/" . date('Y');
	if($type == 3)
		$date = date('d') . " de " . GetMonth(date('m')) . " de " . date('Y');
	
	if($hour)
		$date .= " " . date('H:i:s');
	
	return $date;
}

// Funci�n - Obtener el mes en caracteres de un mes numerico.
// - $num (Int): Mes numerico.
// - $c (Bool): �Obtener solo las tres primeras letras?
function GetMonth($num, $c = false)
{
	return Core::getMonth($num, $c);
}

/*####################################################
##	DEFINICI�N DE VARIABLES GLOBALES				##
####################################################*/

// Variables de fecha y tiempo.
$date['f'] = (time() - (8 * 60));
$date['d'] = date('d');
$date['G'] = date('G');
$date['i'] = date('i');
$date['s'] = date('s');
$date['N'] = date('N');
$date['n'] = date('n');
$date['j'] = date('j');
$date['Y'] = date('Y');

// Definici�n - Nombre de la aplicaci�n.
define("SITE_NAME", $site['site_name']);

// Definici�n - Direcci�n local del Logo.
if(!empty($site['site_logo']))
	define("LOGO", RESOURCES . "/images/$site[site_logo]");
else
	define("LOGO", "");

// Definici�n - Navegador web del usuario.
define("BROWSER", Client::Get("browser"));
// Definici�n - Sistema operativo del usuario.
define("OS", Client::Get("os"));
// Definici�n - Host/DNS del usuario.
define("HOST", Client::Get("host"));
// Definici�n - Dominio actual.
define("DOMAIN", Core::GetHost(PATH));

// Definir variables predeterminadas para la plantilla.
Tpl::Set(Array(
	"DB_ALIAS" => DB_ALIAS,
	"SITE_NAME" => SITE_NAME,
	"LOGO" => LOGO,
	"PATH" => PATH,
	"PATH_SSL" => PATH_SSL,
	"PATH_NS" => PATH_NS,
	"PATH_NOW" => PATH_NOW,
	"ADMIN" => ADMIN,
	"PROTOCOL" => PROTOCOL,
	"RESOURCES" => RESOURCES,
	"RESOURCES_SYS" => RESOURCES_SYS,
	"IP" => IP,
	"AGENT" => AGENT,
	"BROWSER" => BROWSER,
	"OS" => OS,
	"HOST" => HOST,
	"DOMAIN" => DOMAIN
));

// Definir variables de configuraci�n de sitio.
Tpl::Set($site);

/*####################################################
##	VERIFICACI�N DE CARGA MEDIA						##
####################################################*/

BitRock::CheckLoad();

/*####################################################
##	�EN MANTENIMIENTO!								##
####################################################*/

if($site['site_state'] !== "open")
{
	header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
	header('Cache-Control: no-cache');

	header('HTTP/1.1 503 Service Temporarily Unavailable');
	header('Status: 503 Service Temporarily Unavailable');
	
	echo Tpl::Process(BIT_TEMP . "Maintenance");
	exit;
}

/*####################################################
##	MODO SEGURO										##
####################################################*/

// Almacenar informaci�n filtrada en variables cortas.
$G = FilterText($_GET);
$GC = CleanText($_GET);

$P = FilterText($_POST);
$PC = CleanText($_POST);

$R = FilterText($_REQUEST);
$RC = CleanText($_REQUEST);

$PA = $_POST;
$GA = $_GET;

// Si el modo seguro esta activado filtrar toda
// informaci�n proviniente del usuario y sesiones.
// Adem�s de eliminar informaci�n delicada.
if($config['security']['enabled'] OR $Kernel['secure'] == true AND $Kernel['secure'] !== false)
{
	$_POST = $P;
	$_GET = $G;
	$_SESSION = FilterText($_SESSION);
		
	unset($config['mysql'], $config['security']['hash']);
	BitRock::log("Se ha pasado por los filtros de seguridad correctamente.");
}

/*####################################################
##	VERIFICACI�N DE CONEXI�N ACTIVA					##
####################################################*/

$my = null;
$ma = null;
$ms = null;

//Users::CheckSession();

if(AGENT !== "node.js")
	BUsers::CheckSession();

/*####################################################
##	HEMOS TERMINADO									##
####################################################*/

require_once(KERNEL . 'Functions.php');
BitRock::log("BeatRock se ha cargado correctamente.");
?>