<?php####################################################### 					 BeatRock				   	   ######################################################### Framework avanzado de procesamiento para PHP.   ######################################################### InfoSmart � 2011 Todos los derechos reservados. #### http://www.infosmart.mx/						   ######################################################### http://beatrock.infosmart.mx/				   #######################################################require('Init.php');$room = Users::GetRoom($G['id']);$page['subheader'] = "none";$page['footer'] = false;if($room == false OR !is_numeric($G['id'])){	$page['id'] = "no_room";	exit;}$room = mysql_fetch_assoc($room);$options = json_decode($room['options'], true);$style = json_decode($room['style'], true);if(!empty($style['background'])){	if(!Core::isValid($style['background'], "url"))		$background = RESOURCES . "/images/bgs/$style[background].jpg";	else		$background = $style['background'];}if(empty($style['box_trans']))	$style['box_trans'] = "0.6";	if(empty($options['web']))	$options['web'] = PATH . "/room/" . $options['id'];Tpl::addVar("My_Username", MY_USERNAME);Tpl::addVar("My_SessionId", MY_SESSIONID);Tpl::addVar("My_Hash", $my['hash_secret']);Tpl::addVar("roomId", $room['id']);Tpl::addVar("randomString", Core::Random(50));Tpl::addVar("Host", $site['server_host']);Tpl::addVar("Options", addslashes(json_encode($options)));Tpl::addVar("Radio", $options['radio']);Tpl::Set("background", $background);Tpl::Set("box_background", $style['box_background']);Tpl::Set("box_trans", $style['box_trans'] / 100);Tpl::Set("font_color", $style['font_color']);Tpl::Set("radio", $options['radio']);$page['id'] = "chat";$page['name'] = " ";?>