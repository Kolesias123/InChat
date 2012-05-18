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

if(!defined("BEATROCK"))
	exit;
	
if(defined("DEBUG") AND DEBUG == true)
{
	echo '<div class="wrapper" style="font-size: 11px; margin-top: 20px; line-height: 15px;"><hr />';
	echo BitRock::Statistics();
	echo '<br />* Esta informaci�n aparece debido a que tiene definida la constante DEBUG en Init.php';
	echo '</div>';
}	

if($site['site_bottom_javascript'] == "true")
	echo '<!-- JavaScript -->' . Tpl::$js;

if($page['analytics'] !== false)
	echo $site['site_analytics'];
	
if(!empty(Tpl::$javascript))
{
	echo Tpl::$javascript; 
	echo ' })</script>'; 
} 
?>
</div>

</body>
</html>