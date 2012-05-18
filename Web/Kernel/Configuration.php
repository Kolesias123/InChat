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
	
/*####################################################
##	CONEXI�N AL SERVIDOR [MYSQL]					##
####################################################*/

// MySQL - Host de conexi�n.
$config['mysql']['host'] = 'localhost';
// MySQL - Nombre de usuario.
$config['mysql']['user'] = 'root';
// MySQL - Contrase�a.
$config['mysql']['pass'] = '';
// MySQL - Nombre de la base de datos.
$config['mysql']['name'] = 'inchat';
// MySQL - Alias de la base de datos.
$config['mysql']['alias'] = '';

// MySQL - Optimizaci�n de la base de datos al iniciar.
$config['mysql']['optimize'] = false;
// MySQL - Reparaci�n de la base de datos al iniciar.
$config['mysql']['repair'] = false;

// MySQL - Optimizaci�n de la base de datos en caso de alg�n error.
$config['mysql']['optimize.error'] = true;
// MySQL - Reparaci�n de la base de datos en caso de alg�n error.
$config['mysql']['repair.error'] = true;

/*####################################################
##	UBICACI�N DEL SITIO WEB							##
####################################################*/

// Sitio - Ubicaci�n de la aplicaci�n.
// Ubicaciones: http://www.php.net/manual/es/timezones.php
$config['site']['country'] = 'America/Mexico_City';

// Sitio - Direcci�n de entrada a la aplicaci�n.
// Sin "/" al final ni "http://" al principio.
$config['site']['path'] = 'localhost/inchat';
// Sitio - Direcci�n de la administraci�n.
// Sin "/" al final ni "http://" al principio.
$config['site']['admin'] = 'localhost/inchat/imgod';

// Sitio - Direcci�n de InfoSmart Cuentas.
$config['site']['accounts'] = 'accounts.infosmart.mx';

// Sitio - Direcci�n de los recursos de la aplicaci�n.
$config['site']['resources'] = 'localhost/resources/inchat';
// Sitio - Direcci�n de los recursos globales.
$config['site']['resources.sys'] = 'localhost/resources/system';

/*####################################################
##	SEGURIDAD										##
####################################################*/

// Seguridad - Modo seguro.
$config['security']['enabled'] = false;
// Seguridad - Nivel de codificaci�n.
$config['security']['level'] = 5;
// Seguridad - Cadena de seguridad.
$config['security']['hash'] = '3Kl5I3&8ijJ_K05jl9A3@4ByJLJd';

/*####################################################
##	ERRORES	& CONSOLA								##
####################################################*/

// Errores - Reparaci�n automatica de la DB.
$config['errors']['hidden'] = false;
// Errores - Reporte de errores PHP.
$config['errors']['report'] = E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED;
// Errores - Correo electr�nico en caso de alg�n error.
$config['errors']['email.to'] = '';

// Logs - Activar la captura.
$config['logs']['capture'] = true;
// Logs - Guardar logs.
$config['logs']['save'] = 'error';

/*####################################################
##	PARAMETROS EXTRA DE SERVIDOR					##
####################################################*/

// Servidor - Compresi�n GZIP.
$config['server']['gzip'] = false;
// Servidor - Compresi�n de HTML.
$config['server']['compression'] = false;
// Servidor - Solicitud de Host/DNS del cliente.
$config['server']['host'] = true;
// Servidor - Forzar uso/no uso del protocolo seguro.
$config['server']['ssl'] = null;
// Servidor - Recuperaci�n avanzada.
$config['server']['backup'] = true;
// Servidor - Limite de memoria en Bytes.
$config['server']['limit'] = 0;
// Servidor - Limite de carga del CPU.
$config['server']['limit_load'] = 0;
?>