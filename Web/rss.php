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

require('Init.php');

// Al parecer no queremos RSS.
if($site['site_rss'] !== "true")
	exit;

// Obteniendo 10 noticias.
$rss['get'] = Site::Get("news", 10);

// Enviando cabecera de documento XML.
header("Content-type: text/xml");
echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
?>
<rss version="2.0">
	<channel>
		<title><?php echo SITE_NAME; ?></title>
		<description><?php echo html_entity_decode($site['site_description']); ?></description>
		<link><?php echo PATH; ?></link>
	
		<?php 
		while($row = MySQL::fetch_assoc())
		{
			if(!is_numeric($row['date']))
				$row['date'] = strtotime($row['date']);
		?>
		<item>
			<title><?php echo html_entity_decode($row['title']); ?></title>
			<description><?php echo html_entity_decode($row['sub_content']); ?></description>
			<pubDate><?php echo date('r', $row['date']); ?></pubDate>
			<!-- Descomentar en caso de tener una página de visualización de noticias.
			<link><?php echo PATH; ?>/news?id=<?php echo $row['id']; ?></link>-->
		</item>
		<?php } ?>
	</channel>
</rss>