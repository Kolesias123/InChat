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

// ######################################################## //
// 		   Informaci�n del Kernel de BeatRock.				//
// ######################################################## //
// Archivo encargado de proporcionar informaci�n acerca     //
// de la versi�n y detalles del Kernel.						//
// ######################################################## //

// Nombre del software.
// Respete los t�rminos, si ha hecho modificaciones haga con su propio "Code Name".
$Info['name'] = "BeatRock";
$Info['code'] = "Info";

// Versi�n.
$Info['mayor'] = "2";
$Info['minor'] = "3";
$Info['micro'] = "1";
$Info['revision'] = "003";

// Fase de desarrollo.
// Alpha -> Beta -> PP (Platform Preview) -> RC (Release Candidate) -> Inestable.
$Info['fase'] = "Release Candidate";
$Info['fase_ver'] = "1";

// Fecha de creaci�n/actualizaci�n.
$Info['date'] = "12.enero.2011";
$Info['date_hour'] = "09:00 AM";

// Nombres de versi�n.
$Info['version'] = "$Info[mayor].$Info[minor].$Info[micro]";
$Info['version.name'] = "$Info[name] v$Info[version]";
$Info['version.code'] = "$Info[name] \"$Info[code]\" v$Info[version]";
$Info['version.revision'] = "$Info[version] Revisi�n:  $Info[revision]";
$Info['version.date'] = "$Info[version] - $Info[date] $Info[date_hour]";
$Info['version.fase'] = "$Info[fase] $Info[fase_ver]";
$Info['version.full'] = $Info['version.code'] . " $Info[fase]$Info[fase_ver] Revisi�n: $Info[revision] - $Info[date] $Info[date_hour]";
?>