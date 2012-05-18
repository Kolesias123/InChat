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
	
/*####################################################
##	CONEXIÓN AL SERVIDOR [MYSQL]					##
####################################################*/

// MySQL - Host de conexión.
$config['mysql']['host'] = 'localhost';
// MySQL - Nombre de usuario.
$config['mysql']['user'] = 'root';
// MySQL - Contraseña.
$config['mysql']['pass'] = '';
// MySQL - Nombre de la base de datos.
$config['mysql']['name'] = 'inchat';
// MySQL - Alias de la base de datos.
$config['mysql']['alias'] = '';

// MySQL - Optimización de la base de datos al iniciar.
$config['mysql']['optimize'] = false;
// MySQL - Reparación de la base de datos al iniciar.
$config['mysql']['repair'] = false;

// MySQL - Optimización de la base de datos en caso de algún error.
$config['mysql']['optimize.error'] = true;
// MySQL - Reparación de la base de datos en caso de algún error.
$config['mysql']['repair.error'] = true;

/*####################################################
##	UBICACIÓN DEL SITIO WEB							##
####################################################*/

// Sitio - Ubicación de la aplicación.
// Ubicaciones: http://www.php.net/manual/es/timezones.php
$config['site']['country'] = 'America/Mexico_City';

// Sitio - Dirección de entrada a la aplicación.
// Sin "/" al final ni "http://" al principio.
$config['site']['path'] = 'localhost/inchat';
// Sitio - Dirección de la administración.
// Sin "/" al final ni "http://" al principio.
$config['site']['admin'] = 'localhost/inchat/imgod';

// Sitio - Dirección de InfoSmart Cuentas.
$config['site']['accounts'] = 'accounts.infosmart.mx';

// Sitio - Dirección de los recursos de la aplicación.
$config['site']['resources'] = 'localhost/resources/inchat';
// Sitio - Dirección de los recursos globales.
$config['site']['resources.sys'] = 'localhost/resources/system';

/*####################################################
##	SEGURIDAD										##
####################################################*/

// Seguridad - Modo seguro.
$config['security']['enabled'] = false;
// Seguridad - Nivel de codificación.
$config['security']['level'] = 5;
// Seguridad - Cadena de seguridad.
$config['security']['hash'] = '3Kl5I3&8ijJ_K05jl9A3@4ByJLJd';

/*####################################################
##	ERRORES	& CONSOLA								##
####################################################*/

// Errores - Reparación automatica de la DB.
$config['errors']['hidden'] = false;
// Errores - Reporte de errores PHP.
$config['errors']['report'] = E_ALL & ~E_NOTICE & ~E_WARNING & ~E_DEPRECATED;
// Errores - Correo electrónico en caso de algún error.
$config['errors']['email.to'] = '';

// Logs - Activar la captura.
$config['logs']['capture'] = true;
// Logs - Guardar logs.
$config['logs']['save'] = 'error';

/*####################################################
##	PARAMETROS EXTRA DE SERVIDOR					##
####################################################*/

// Servidor - Compresión GZIP.
$config['server']['gzip'] = false;
// Servidor - Compresión de HTML.
$config['server']['compression'] = false;
// Servidor - Solicitud de Host/DNS del cliente.
$config['server']['host'] = true;
// Servidor - Forzar uso/no uso del protocolo seguro.
$config['server']['ssl'] = null;
// Servidor - Recuperación avanzada.
$config['server']['backup'] = true;
// Servidor - Limite de memoria en Bytes.
$config['server']['limit'] = 0;
// Servidor - Limite de carga del CPU.
$config['server']['limit_load'] = 0;
?>