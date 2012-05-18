DROP TABLE IF EXISTS site_cache;

CREATE TABLE IF NOT EXISTS `site_cache` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `page` varchar(50) NOT NULL,
  `time` int(100) NOT NULL DEFAULT '12',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS site_config;

CREATE TABLE IF NOT EXISTS `site_config` (
  `var` varchar(100) NOT NULL,
  `result` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Configuracion del sitio';

INSERT INTO site_config VALUES("site_name","InChat");
INSERT INTO site_config VALUES("site_separation","~");
INSERT INTO site_config VALUES("site_slogan","Salas de chat simples y personalizadas.");
INSERT INTO site_config VALUES("site_charset","iso-8859-15");
INSERT INTO site_config VALUES("site_language","es");
INSERT INTO site_config VALUES("site_description","InChat te permite crear de forma gratuita salas de chat en HTML 5 para poder usarlas en tus sitios web.");
INSERT INTO site_config VALUES("site_keywords","infosmart, beatrock, chat, html5, inchat, salas de chateo, social, socializar, plugin, pÃ¡ginas web, paginas, aplicaciones, miembros");
INSERT INTO site_config VALUES("site_analytics","");
INSERT INTO site_config VALUES("site_state","open");
INSERT INTO site_config VALUES("site_visits","4");
INSERT INTO site_config VALUES("site_favicon","favicon.ico");
INSERT INTO site_config VALUES("site_logo","logo.png");
INSERT INTO site_config VALUES("site_version","1.0.0");
INSERT INTO site_config VALUES("site_revision","de 2011");
INSERT INTO site_config VALUES("site_author","IvÃ¡n Bravo Bravo");
INSERT INTO site_config VALUES("site_publisher","InfoSmart");
INSERT INTO site_config VALUES("site_mobile","false");
INSERT INTO site_config VALUES("site_sitemap","true");
INSERT INTO site_config VALUES("site_rss","true");
INSERT INTO site_config VALUES("site_translate","false");
INSERT INTO site_config VALUES("site_smart_translate","false");
INSERT INTO site_config VALUES("site_bottom_javascript","false");
INSERT INTO site_config VALUES("site_notes","");
INSERT INTO site_config VALUES("session_alias","inchat_");
INSERT INTO site_config VALUES("cookie_alias","inchat_");
INSERT INTO site_config VALUES("cookie_duration","300");
INSERT INTO site_config VALUES("cookie_domain","");
INSERT INTO site_config VALUES("server_host","http://localhost:1797");
INSERT INTO site_config VALUES("users_online","0");
INSERT INTO site_config VALUES("files_path","../resources/inchat/files");



DROP TABLE IF EXISTS site_countrys;

CREATE TABLE IF NOT EXISTS `site_countrys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isoNum` smallint(6) DEFAULT NULL,
  `code2` char(2) DEFAULT NULL,
  `code3` char(3) DEFAULT NULL,
  `name` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=241 DEFAULT CHARSET=latin1;

INSERT INTO site_countrys VALUES("1","4","AF","AFG","AfganistÃ¡n");
INSERT INTO site_countrys VALUES("2","248","AX","ALA","Islas Gland");
INSERT INTO site_countrys VALUES("3","8","AL","ALB","Albania");
INSERT INTO site_countrys VALUES("4","276","DE","DEU","Alemania");
INSERT INTO site_countrys VALUES("5","20","AD","AND","Andorra");
INSERT INTO site_countrys VALUES("6","24","AO","AGO","Angola");
INSERT INTO site_countrys VALUES("7","660","AI","AIA","Anguilla");
INSERT INTO site_countrys VALUES("8","10","AQ","ATA","AntÃ¡rtida");
INSERT INTO site_countrys VALUES("9","28","AG","ATG","Antigua y Barbuda");
INSERT INTO site_countrys VALUES("10","530","AN","ANT","Antillas Holandesas");
INSERT INTO site_countrys VALUES("11","682","SA","SAU","Arabia SaudÃ­");
INSERT INTO site_countrys VALUES("12","12","DZ","DZA","Argelia");
INSERT INTO site_countrys VALUES("13","32","AR","ARG","Argentina");
INSERT INTO site_countrys VALUES("14","51","AM","ARM","Armenia");
INSERT INTO site_countrys VALUES("15","533","AW","ABW","Aruba");
INSERT INTO site_countrys VALUES("16","36","AU","AUS","Australia");
INSERT INTO site_countrys VALUES("17","40","AT","AUT","Austria");
INSERT INTO site_countrys VALUES("18","31","AZ","AZE","AzerbaiyÃ¡n");
INSERT INTO site_countrys VALUES("19","44","BS","BHS","Bahamas");
INSERT INTO site_countrys VALUES("20","48","BH","BHR","BahrÃ©in");
INSERT INTO site_countrys VALUES("21","50","BD","BGD","Bangladesh");
INSERT INTO site_countrys VALUES("22","52","BB","BRB","Barbados");
INSERT INTO site_countrys VALUES("23","112","BY","BLR","Bielorrusia");
INSERT INTO site_countrys VALUES("24","56","BE","BEL","BÃ©lgica");
INSERT INTO site_countrys VALUES("25","84","BZ","BLZ","Belice");
INSERT INTO site_countrys VALUES("26","204","BJ","BEN","Benin");
INSERT INTO site_countrys VALUES("27","60","BM","BMU","Bermudas");
INSERT INTO site_countrys VALUES("28","64","BT","BTN","BhutÃ¡n");
INSERT INTO site_countrys VALUES("29","68","BO","BOL","Bolivia");
INSERT INTO site_countrys VALUES("30","70","BA","BIH","Bosnia y Herzegovina");
INSERT INTO site_countrys VALUES("31","72","BW","BWA","Botsuana");
INSERT INTO site_countrys VALUES("32","74","BV","BVT","Isla Bouvet");
INSERT INTO site_countrys VALUES("33","76","BR","BRA","Brasil");
INSERT INTO site_countrys VALUES("34","96","BN","BRN","BrunÃ©i");
INSERT INTO site_countrys VALUES("35","100","BG","BGR","Bulgaria");
INSERT INTO site_countrys VALUES("36","854","BF","BFA","Burkina Faso");
INSERT INTO site_countrys VALUES("37","108","BI","BDI","Burundi");
INSERT INTO site_countrys VALUES("38","132","CV","CPV","Cabo Verde");
INSERT INTO site_countrys VALUES("39","136","KY","CYM","Islas CaimÃ¡n");
INSERT INTO site_countrys VALUES("40","116","KH","KHM","Camboya");
INSERT INTO site_countrys VALUES("41","120","CM","CMR","CamerÃºn");
INSERT INTO site_countrys VALUES("42","124","CA","CAN","CanadÃ¡");
INSERT INTO site_countrys VALUES("43","140","CF","CAF","RepÃºblica Centroafricana");
INSERT INTO site_countrys VALUES("44","148","TD","TCD","Chad");
INSERT INTO site_countrys VALUES("45","203","CZ","CZE","RepÃºblica Checa");
INSERT INTO site_countrys VALUES("46","152","CL","CHL","Chile");
INSERT INTO site_countrys VALUES("47","156","CN","CHN","China");
INSERT INTO site_countrys VALUES("48","196","CY","CYP","Chipre");
INSERT INTO site_countrys VALUES("49","162","CX","CXR","Isla de Navidad");
INSERT INTO site_countrys VALUES("50","336","VA","VAT","Ciudad del Vaticano");
INSERT INTO site_countrys VALUES("51","166","CC","CCK","Islas Cocos");
INSERT INTO site_countrys VALUES("52","170","CO","COL","Colombia");
INSERT INTO site_countrys VALUES("53","174","KM","COM","Comoras");
INSERT INTO site_countrys VALUES("54","180","CD","COD","RepÃºblica DemocrÃ¡tica del Congo");
INSERT INTO site_countrys VALUES("55","178","CG","COG","Congo");
INSERT INTO site_countrys VALUES("56","184","CK","COK","Islas Cook");
INSERT INTO site_countrys VALUES("57","408","KP","PRK","Corea del Norte");
INSERT INTO site_countrys VALUES("58","410","KR","KOR","Corea del Sur");
INSERT INTO site_countrys VALUES("59","384","CI","CIV","Costa de Marfil");
INSERT INTO site_countrys VALUES("60","188","CR","CRI","Costa Rica");
INSERT INTO site_countrys VALUES("61","191","HR","HRV","Croacia");
INSERT INTO site_countrys VALUES("62","192","CU","CUB","Cuba");
INSERT INTO site_countrys VALUES("63","208","DK","DNK","Dinamarca");
INSERT INTO site_countrys VALUES("64","212","DM","DMA","Dominica");
INSERT INTO site_countrys VALUES("65","214","DO","DOM","RepÃºblica Dominicana");
INSERT INTO site_countrys VALUES("66","218","EC","ECU","Ecuador");
INSERT INTO site_countrys VALUES("67","818","EG","EGY","Egipto");
INSERT INTO site_countrys VALUES("68","222","SV","SLV","El Salvador");
INSERT INTO site_countrys VALUES("69","784","AE","ARE","Emiratos Ãrabes Unidos");
INSERT INTO site_countrys VALUES("70","232","ER","ERI","Eritrea");
INSERT INTO site_countrys VALUES("71","703","SK","SVK","Eslovaquia");
INSERT INTO site_countrys VALUES("72","705","SI","SVN","Eslovenia");
INSERT INTO site_countrys VALUES("73","724","ES","ESP","EspaÃ±a");
INSERT INTO site_countrys VALUES("74","581","UM","UMI","Islas ultramarinas de Estados Unidos");
INSERT INTO site_countrys VALUES("75","840","US","USA","Estados Unidos");
INSERT INTO site_countrys VALUES("76","233","EE","EST","Estonia");
INSERT INTO site_countrys VALUES("77","231","ET","ETH","EtiopÃ­a");
INSERT INTO site_countrys VALUES("78","234","FO","FRO","Islas Feroe");
INSERT INTO site_countrys VALUES("79","608","PH","PHL","Filipinas");
INSERT INTO site_countrys VALUES("80","246","FI","FIN","Finlandia");
INSERT INTO site_countrys VALUES("81","242","FJ","FJI","Fiyi");
INSERT INTO site_countrys VALUES("82","250","FR","FRA","Francia");
INSERT INTO site_countrys VALUES("83","266","GA","GAB","GabÃ³n");
INSERT INTO site_countrys VALUES("84","270","GM","GMB","Gambia");
INSERT INTO site_countrys VALUES("85","268","GE","GEO","Georgia");
INSERT INTO site_countrys VALUES("86","239","GS","SGS","Islas Georgias del Sur y Sandwich del Sur");
INSERT INTO site_countrys VALUES("87","288","GH","GHA","Ghana");
INSERT INTO site_countrys VALUES("88","292","GI","GIB","Gibraltar");
INSERT INTO site_countrys VALUES("89","308","GD","GRD","Granada");
INSERT INTO site_countrys VALUES("90","300","GR","GRC","Grecia");
INSERT INTO site_countrys VALUES("91","304","GL","GRL","Groenlandia");
INSERT INTO site_countrys VALUES("92","312","GP","GLP","Guadalupe");
INSERT INTO site_countrys VALUES("93","316","GU","GUM","Guam");
INSERT INTO site_countrys VALUES("94","320","GT","GTM","Guatemala");
INSERT INTO site_countrys VALUES("95","254","GF","GUF","Guayana Francesa");
INSERT INTO site_countrys VALUES("96","324","GN","GIN","Guinea");
INSERT INTO site_countrys VALUES("97","226","GQ","GNQ","Guinea Ecuatorial");
INSERT INTO site_countrys VALUES("98","624","GW","GNB","Guinea-Bissau");
INSERT INTO site_countrys VALUES("99","328","GY","GUY","Guyana");
INSERT INTO site_countrys VALUES("100","332","HT","HTI","HaitÃ­");
INSERT INTO site_countrys VALUES("101","334","HM","HMD","Islas Heard y McDonald");
INSERT INTO site_countrys VALUES("102","340","HN","HND","Honduras");
INSERT INTO site_countrys VALUES("103","344","HK","HKG","Hong Kong");
INSERT INTO site_countrys VALUES("104","348","HU","HUN","HungrÃ­a");
INSERT INTO site_countrys VALUES("105","356","IN","IND","India");
INSERT INTO site_countrys VALUES("106","360","ID","IDN","Indonesia");
INSERT INTO site_countrys VALUES("107","364","IR","IRN","IrÃ¡n");
INSERT INTO site_countrys VALUES("108","368","IQ","IRQ","Iraq");
INSERT INTO site_countrys VALUES("109","372","IE","IRL","Irlanda");
INSERT INTO site_countrys VALUES("110","352","IS","ISL","Islandia");
INSERT INTO site_countrys VALUES("111","376","IL","ISR","Israel");
INSERT INTO site_countrys VALUES("112","380","IT","ITA","Italia");
INSERT INTO site_countrys VALUES("113","388","JM","JAM","Jamaica");
INSERT INTO site_countrys VALUES("114","392","JP","JPN","JapÃ³n");
INSERT INTO site_countrys VALUES("115","400","JO","JOR","Jordania");
INSERT INTO site_countrys VALUES("116","398","KZ","KAZ","KazajstÃ¡n");
INSERT INTO site_countrys VALUES("117","404","KE","KEN","Kenia");
INSERT INTO site_countrys VALUES("118","417","KG","KGZ","KirguistÃ¡n");
INSERT INTO site_countrys VALUES("119","296","KI","KIR","Kiribati");
INSERT INTO site_countrys VALUES("120","414","KW","KWT","Kuwait");
INSERT INTO site_countrys VALUES("121","418","LA","LAO","Laos");
INSERT INTO site_countrys VALUES("122","426","LS","LSO","Lesotho");
INSERT INTO site_countrys VALUES("123","428","LV","LVA","Letonia");
INSERT INTO site_countrys VALUES("124","422","LB","LBN","LÃ­bano");
INSERT INTO site_countrys VALUES("125","430","LR","LBR","Liberia");
INSERT INTO site_countrys VALUES("126","434","LY","LBY","Libia");
INSERT INTO site_countrys VALUES("127","438","LI","LIE","Liechtenstein");
INSERT INTO site_countrys VALUES("128","440","LT","LTU","Lituania");
INSERT INTO site_countrys VALUES("129","442","LU","LUX","Luxemburgo");
INSERT INTO site_countrys VALUES("130","446","MO","MAC","Macao");
INSERT INTO site_countrys VALUES("131","807","MK","MKD","ARY Macedonia");
INSERT INTO site_countrys VALUES("132","450","MG","MDG","Madagascar");
INSERT INTO site_countrys VALUES("133","458","MY","MYS","Malasia");
INSERT INTO site_countrys VALUES("134","454","MW","MWI","Malawi");
INSERT INTO site_countrys VALUES("135","462","MV","MDV","Maldivas");
INSERT INTO site_countrys VALUES("136","466","ML","MLI","MalÃ­");
INSERT INTO site_countrys VALUES("137","470","MT","MLT","Malta");
INSERT INTO site_countrys VALUES("138","238","FK","FLK","Islas Malvinas");
INSERT INTO site_countrys VALUES("139","580","MP","MNP","Islas Marianas del Norte");
INSERT INTO site_countrys VALUES("140","504","MA","MAR","Marruecos");
INSERT INTO site_countrys VALUES("141","584","MH","MHL","Islas Marshall");
INSERT INTO site_countrys VALUES("142","474","MQ","MTQ","Martinica");
INSERT INTO site_countrys VALUES("143","480","MU","MUS","Mauricio");
INSERT INTO site_countrys VALUES("144","478","MR","MRT","Mauritania");
INSERT INTO site_countrys VALUES("145","175","YT","MYT","Mayotte");
INSERT INTO site_countrys VALUES("146","484","MX","MEX","MÃ©xico");
INSERT INTO site_countrys VALUES("147","583","FM","FSM","Micronesia");
INSERT INTO site_countrys VALUES("148","498","MD","MDA","Moldavia");
INSERT INTO site_countrys VALUES("149","492","MC","MCO","MÃ³naco");
INSERT INTO site_countrys VALUES("150","496","MN","MNG","Mongolia");
INSERT INTO site_countrys VALUES("151","500","MS","MSR","Montserrat");
INSERT INTO site_countrys VALUES("152","508","MZ","MOZ","Mozambique");
INSERT INTO site_countrys VALUES("153","104","MM","MMR","Myanmar");
INSERT INTO site_countrys VALUES("154","516","NA","NAM","Namibia");
INSERT INTO site_countrys VALUES("155","520","NR","NRU","Nauru");
INSERT INTO site_countrys VALUES("156","524","NP","NPL","Nepal");
INSERT INTO site_countrys VALUES("157","558","NI","NIC","Nicaragua");
INSERT INTO site_countrys VALUES("158","562","NE","NER","NÃ­ger");
INSERT INTO site_countrys VALUES("159","566","NG","NGA","Nigeria");
INSERT INTO site_countrys VALUES("160","570","NU","NIU","Niue");
INSERT INTO site_countrys VALUES("161","574","NF","NFK","Isla Norfolk");
INSERT INTO site_countrys VALUES("162","578","NO","NOR","Noruega");
INSERT INTO site_countrys VALUES("163","540","NC","NCL","Nueva Caledonia");
INSERT INTO site_countrys VALUES("164","554","NZ","NZL","Nueva Zelanda");
INSERT INTO site_countrys VALUES("165","512","OM","OMN","OmÃ¡n");
INSERT INTO site_countrys VALUES("166","528","NL","NLD","PaÃ­ses Bajos");
INSERT INTO site_countrys VALUES("167","586","PK","PAK","PakistÃ¡n");
INSERT INTO site_countrys VALUES("168","585","PW","PLW","Palau");
INSERT INTO site_countrys VALUES("169","275","PS","PSE","Palestina");
INSERT INTO site_countrys VALUES("170","591","PA","PAN","PanamÃ¡");
INSERT INTO site_countrys VALUES("171","598","PG","PNG","PapÃºa Nueva Guinea");
INSERT INTO site_countrys VALUES("172","600","PY","PRY","Paraguay");
INSERT INTO site_countrys VALUES("173","604","PE","PER","PerÃº");
INSERT INTO site_countrys VALUES("174","612","PN","PCN","Islas Pitcairn");
INSERT INTO site_countrys VALUES("175","258","PF","PYF","Polinesia Francesa");
INSERT INTO site_countrys VALUES("176","616","PL","POL","Polonia");
INSERT INTO site_countrys VALUES("177","620","PT","PRT","Portugal");
INSERT INTO site_countrys VALUES("178","630","PR","PRI","Puerto Rico");
INSERT INTO site_countrys VALUES("179","634","QA","QAT","Qatar");
INSERT INTO site_countrys VALUES("180","826","GB","GBR","Reino Unido");
INSERT INTO site_countrys VALUES("181","638","RE","REU","ReuniÃ³n");
INSERT INTO site_countrys VALUES("182","646","RW","RWA","Ruanda");
INSERT INTO site_countrys VALUES("183","642","RO","ROU","Rumania");
INSERT INTO site_countrys VALUES("184","643","RU","RUS","Rusia");
INSERT INTO site_countrys VALUES("185","732","EH","ESH","Sahara Occidental");
INSERT INTO site_countrys VALUES("186","90","SB","SLB","Islas SalomÃ³n");
INSERT INTO site_countrys VALUES("187","882","WS","WSM","Samoa");
INSERT INTO site_countrys VALUES("188","16","AS","ASM","Samoa Americana");
INSERT INTO site_countrys VALUES("189","659","KN","KNA","San CristÃ³bal y Nevis");
INSERT INTO site_countrys VALUES("190","674","SM","SMR","San Marino");
INSERT INTO site_countrys VALUES("191","666","PM","SPM","San Pedro y MiquelÃ³n");
INSERT INTO site_countrys VALUES("192","670","VC","VCT","San Vicente y las Granadinas");
INSERT INTO site_countrys VALUES("193","654","SH","SHN","Santa Helena");
INSERT INTO site_countrys VALUES("194","662","LC","LCA","Santa LucÃ­a");
INSERT INTO site_countrys VALUES("195","678","ST","STP","Santo TomÃ© y PrÃ­ncipe");
INSERT INTO site_countrys VALUES("196","686","SN","SEN","Senegal");
INSERT INTO site_countrys VALUES("197","891","CS","SCG","Serbia y Montenegro");
INSERT INTO site_countrys VALUES("198","690","SC","SYC","Seychelles");
INSERT INTO site_countrys VALUES("199","694","SL","SLE","Sierra Leona");
INSERT INTO site_countrys VALUES("200","702","SG","SGP","Singapur");
INSERT INTO site_countrys VALUES("201","760","SY","SYR","Siria");
INSERT INTO site_countrys VALUES("202","706","SO","SOM","Somalia");
INSERT INTO site_countrys VALUES("203","144","LK","LKA","Sri Lanka");
INSERT INTO site_countrys VALUES("204","748","SZ","SWZ","Suazilandia");
INSERT INTO site_countrys VALUES("205","710","ZA","ZAF","SudÃ¡frica");
INSERT INTO site_countrys VALUES("206","736","SD","SDN","SudÃ¡n");
INSERT INTO site_countrys VALUES("207","752","SE","SWE","Suecia");
INSERT INTO site_countrys VALUES("208","756","CH","CHE","Suiza");
INSERT INTO site_countrys VALUES("209","740","SR","SUR","Surinam");
INSERT INTO site_countrys VALUES("210","744","SJ","SJM","Svalbard y Jan Mayen");
INSERT INTO site_countrys VALUES("211","764","TH","THA","Tailandia");
INSERT INTO site_countrys VALUES("212","158","TW","TWN","TaiwÃ¡n");
INSERT INTO site_countrys VALUES("213","834","TZ","TZA","Tanzania");
INSERT INTO site_countrys VALUES("214","762","TJ","TJK","TayikistÃ¡n");
INSERT INTO site_countrys VALUES("215","86","IO","IOT","Territorio BritÃ¡nico del OcÃ©ano Ãndico");
INSERT INTO site_countrys VALUES("216","260","TF","ATF","Territorios Australes Franceses");
INSERT INTO site_countrys VALUES("217","626","TL","TLS","Timor Oriental");
INSERT INTO site_countrys VALUES("218","768","TG","TGO","Togo");
INSERT INTO site_countrys VALUES("219","772","TK","TKL","Tokelau");
INSERT INTO site_countrys VALUES("220","776","TO","TON","Tonga");
INSERT INTO site_countrys VALUES("221","780","TT","TTO","Trinidad y Tobago");
INSERT INTO site_countrys VALUES("222","788","TN","TUN","TÃºnez");
INSERT INTO site_countrys VALUES("223","796","TC","TCA","Islas Turcas y Caicos");
INSERT INTO site_countrys VALUES("224","795","TM","TKM","TurkmenistÃ¡n");
INSERT INTO site_countrys VALUES("225","792","TR","TUR","TurquÃ­a");
INSERT INTO site_countrys VALUES("226","798","TV","TUV","Tuvalu");
INSERT INTO site_countrys VALUES("227","804","UA","UKR","Ucrania");
INSERT INTO site_countrys VALUES("228","800","UG","UGA","Uganda");
INSERT INTO site_countrys VALUES("229","858","UY","URY","Uruguay");
INSERT INTO site_countrys VALUES("230","860","UZ","UZB","UzbekistÃ¡n");
INSERT INTO site_countrys VALUES("231","548","VU","VUT","Vanuatu");
INSERT INTO site_countrys VALUES("232","862","VE","VEN","Venezuela");
INSERT INTO site_countrys VALUES("233","704","VN","VNM","Vietnam");
INSERT INTO site_countrys VALUES("234","92","VG","VGB","Islas VÃ­rgenes BritÃ¡nicas");
INSERT INTO site_countrys VALUES("235","850","VI","VIR","Islas VÃ­rgenes de los Estados Unidos");
INSERT INTO site_countrys VALUES("236","876","WF","WLF","Wallis y Futuna");
INSERT INTO site_countrys VALUES("237","887","YE","YEM","Yemen");
INSERT INTO site_countrys VALUES("238","262","DJ","DJI","Yibuti");
INSERT INTO site_countrys VALUES("239","894","ZM","ZMB","Zambia");
INSERT INTO site_countrys VALUES("240","716","ZW","ZWE","Zimbabue");



DROP TABLE IF EXISTS site_errors;

CREATE TABLE IF NOT EXISTS `site_errors` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `code` varchar(100) NOT NULL DEFAULT '000',
  `title` varchar(100) NOT NULL,
  `response` text NOT NULL,
  `file` varchar(300) NOT NULL,
  `function` varchar(100) NOT NULL,
  `line` int(100) NOT NULL,
  `out_file` varchar(300) NOT NULL,
  `more` text NOT NULL,
  `date` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS site_logs;

CREATE TABLE IF NOT EXISTS `site_logs` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `logs` text NOT NULL,
  `phpid` varchar(300) NOT NULL,
  `path` varchar(300) NOT NULL,
  `date` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;




DROP TABLE IF EXISTS site_maps;

CREATE TABLE IF NOT EXISTS `site_maps` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `page` varchar(100) NOT NULL,
  `lastmod` varchar(50) NOT NULL,
  `changefrec` enum('always','hourly','daily','weekly','monthly','yearly','never') NOT NULL DEFAULT 'always',
  `priority` varchar(10) NOT NULL DEFAULT '1.0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO site_maps VALUES("1","index","","always","1.0");



DROP TABLE IF EXISTS site_news;

CREATE TABLE IF NOT EXISTS `site_news` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `sub_content` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(300) NOT NULL,
  `images` varchar(1000) NOT NULL,
  `author` varchar(60) NOT NULL,
  `date` varchar(100) NOT NULL,
  `comments` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Noticias';




DROP TABLE IF EXISTS site_pages;

CREATE TABLE IF NOT EXISTS `site_pages` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `request` varchar(300) NOT NULL,
  `page` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `header` enum('true','false') NOT NULL DEFAULT 'true',
  `footer` enum('true','false') NOT NULL DEFAULT 'true',
  `subheader` varchar(100) NOT NULL DEFAULT 'SubHeader',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

INSERT INTO site_pages VALUES("1","index","index","","true","true","SubHeader");



DROP TABLE IF EXISTS site_timers;

CREATE TABLE IF NOT EXISTS `site_timers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `action` varchar(100) NOT NULL,
  `time` int(100) NOT NULL,
  `nexttime` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='Tareas automaticas del Sitio';

INSERT INTO site_timers VALUES("1","optimize_db","10080","1334530764");
INSERT INTO site_timers VALUES("2","maintenance_db","44640","1336604367");
INSERT INTO site_timers VALUES("3","backup_db","20160","1329091513");
INSERT INTO site_timers VALUES("4","maintenance_backups","44640","1329121670");



DROP TABLE IF EXISTS site_translate;

CREATE TABLE IF NOT EXISTS `site_translate` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `var` varchar(100) NOT NULL,
  `original` text NOT NULL,
  `translated` text NOT NULL,
  `language` varchar(10) NOT NULL DEFAULT 'en',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

INSERT INTO site_translate VALUES("1","","Â¡Bienvenido a %SITE_NAME%!","Welcome to %SITE_NAME%!","en");
INSERT INTO site_translate VALUES("2","","Â¡Saludos %IP% (IP)! Empieza a programar para \"%SITE_NAME%\" en Kernel/Templates/index.tpl :D","Greetings %IP% (IP)! Start develop for \"%SITE_NAME%\" in Kernel/Templates/index.tpl :D","en");
INSERT INTO site_translate VALUES("3","","Recuerda que %PATH% es lo mismo que","Remember that %PATH% is the same as","en");
INSERT INTO site_translate VALUES("4","","Todos los derechos reservados.","All rights reserved.","en");
INSERT INTO site_translate VALUES("5","","ObtÃ©n tu sala de chat","Get chat","en");



DROP TABLE IF EXISTS site_visits;

CREATE TABLE IF NOT EXISTS `site_visits` (
  `ip` varchar(100) NOT NULL,
  `host` varchar(150) NOT NULL,
  `agent` text NOT NULL,
  `browser` varchar(100) NOT NULL,
  `referer` varchar(300) NOT NULL,
  `phpid` varchar(300) NOT NULL,
  `type` enum('desktop','mobile','bot') NOT NULL DEFAULT 'desktop',
  `date` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

INSERT INTO site_visits VALUES("127.0.0.1","activate.adobe.com","node.js","Desconocido","","e2qpecloevkdshrqfvn6a6amk0","desktop","1333925972");



DROP TABLE IF EXISTS users;

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `sessionId` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(48) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `rank` int(2) NOT NULL DEFAULT '1',
  `state` varchar(48) NOT NULL,
  `birthday` varchar(100) NOT NULL,
  `account_birthday` varchar(100) NOT NULL,
  `lastaccess` varchar(100) NOT NULL,
  `lastonline` varchar(100) NOT NULL DEFAULT '0',
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `agent` varchar(500) NOT NULL,
  `os` varchar(100) NOT NULL,
  `lasthost` varchar(200) NOT NULL,
  `country` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Usuarios';




DROP TABLE IF EXISTS users_browser;

CREATE TABLE IF NOT EXISTS `users_browser` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `sessionId` varchar(50) NOT NULL,
  `hash_secret` varchar(80) NOT NULL,
  `username` varchar(32) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(48) NOT NULL,
  `rank` int(2) NOT NULL DEFAULT '1',
  `birthday` varchar(100) NOT NULL,
  `photo` varchar(100) NOT NULL DEFAULT 'photo.default',
  `photo_time` int(100) NOT NULL,
  `account_birthday` varchar(100) NOT NULL,
  `lastaccess` varchar(100) NOT NULL,
  `lastonline` varchar(100) NOT NULL DEFAULT '0',
  `ip_address` varchar(100) NOT NULL,
  `browser` varchar(100) NOT NULL,
  `agent` varchar(500) NOT NULL,
  `os` varchar(100) NOT NULL,
  `lasthost` varchar(200) NOT NULL,
  `country` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=155 DEFAULT CHARSET=latin1 COMMENT='Usuarios';

INSERT INTO users_browser VALUES("1","897k7bz7y6f2zd18l75id233d32dkfhfddxlylxelli83h7jxf","h93hyjjz4id6fc3xe9bhex7dze2bew3zlc5i0jzfc909k4aeh55ld2by5c9bde3dj2ba2939d61w2hl6","HelloMe15","","","1","","photo.default","0","1327381032","1327545728","1327545728","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.75 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("2","jb7ihlk8yk8a4a3wd90bfxwee0fbxyi8h5jd4kb07w465j4fad","z152wddw8xjiebd5dbkzi18kl2halhzzxdy9196j8y2004fi5x5h920c0le049kwbewajei47didw920","Kolesias123","Iv&aacute;n Bravo Bravo","ibravo13@hotmail.com","1","","7276b379782804bc0d4d81c4489157ed","1327449359","1327381034","1327545734","1328495314","::1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","InfoSmart-PC","");
INSERT INTO users_browser VALUES("3","lw4i04j1zyjhwfzk8a6d63xf8z92ckh2iyb6ef7biadc636fjl","5aw34d9x6ie4zh5ikwwk5212hhl7356x6af94ffj9j3zl2226z2cw5j6e4xbj6h2bkj5ba003idjxdc0","HelloMe7","","","1","","photo.default","0","1327387932","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.75 Safari/535.7","Windows 7","InfoSmart-PC","");
INSERT INTO users_browser VALUES("4","83a0wjedkad7e4ffi29z8zabz17h1dw030c7kll54w0wjx1kjj","a6lzzd16a6yy5cyci2c1j0d00wzh23xjficc2lybz8xa81za8ci73xak1cxz0iik87xyxxkf3jw58613","DJChat36","","","1","","photo.default","0","1327442373","1327545728","1327545728","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.75 Safari/535.7","Windows 7","192.168.1.254","");
INSERT INTO users_browser VALUES("5","lhy54jk88zk1bwe229d53xj3a64j6cc44l5fz91fxyhk943weh","8fl06a6i7l8yle96a16eyx10zkeblwiihz2hfj3ck73j8dlww1l45z37d6a9la3ydej33z05w13c9e0c","UsuaritoFeliz25","","","1","","photo.default","0","1327442383","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.75 Safari/535.7","Windows 7","192.168.1.254","");
INSERT INTO users_browser VALUES("6","79e5y8hdj977cxbb18dd3yxedz3f0jf0714wde5a11kddll09w","5i4hfkxyzwd0dc3z9lybxkw8bwy12kflce3i61a8cz3fa7lyb7z13aidai59b4ieekk5h0kfecbe3fzj","UsuaritoFeliz21","","","1","","photo.default","0","1327443045","1327545735","1327545735","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.75 Safari/535.7","Windows 7","activate.adobe.com","");
INSERT INTO users_browser VALUES("7","kc9bklf17xa32el5i47cba85zx21h761h4f1y0wjjxa39jclyw","79d1akw1chjc207ib764li94khk0fd842daz67z9fkw1f71w5k5cz416642z79f8fw84544k6957bll4","InYellow6","","","1","","photo.default","0","1327443058","1327545728","1327545728","127.0.0.1","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("8","kk08jyy2zhfl815l88xh529xa213c9l60lbzbwh2xiy7c67j9e","b02lw0fz4d3y31lcydk70di2yk95x86le90zeb7yk7jwhdb97592wawh17wae1yx662f0fxe4yiyi1d4","DJChat44","","","1","","photo.default","0","1327443087","1327545730","1327545730","127.0.0.1","Google Adsense BOT","Mediapartners-Google","Desconocido","","");
INSERT INTO users_browser VALUES("9","le370e1z88be30ce4ecj97c6hbji2lee809jfde22ycak62i7b","10791idye78lclbhwa93z7x0996ach2b7wb4k9ihkbwj68k44zjez5w4cfhdj2l2j82a7f504a8bky4f","InYellow49","","","1","","photo.default","0","1327443382","1327545729","1327545729","127.0.0.1","Google Adsense BOT","Mediapartners-Google","Desconocido","","");
INSERT INTO users_browser VALUES("10","z8ae3fyllzjcycihj2bdlid5ldzj9ewzf7kz5322lbh8jczd2z","bl7w1x2bd0c1liifi0ewcx0izk0chci9ck8xec3kbdfx75b7100fw0h74z1862jael1azfdjcxdlhbd0","HelloMe42","","","1","","photo.default","0","1327443576","1327443576","1327443576","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("11","fwb4k8d99aak8x9j8lwh32y54b052dhdykaleaf52h81aj21k3","6w63y7439xb365wi3df9cw33xd6fx7yxxf8w561ce8bhj8z82wwaye464x94b0822hdw4ky1ixx8yaj0","UsuaritoFeliz31","","","1","","photo.default","0","1327443717","1327443717","1327443717","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("12","y46c4hidc9ac29249yix93w5d6c5jl8a864w89hdl7wckxzxhd","kw2wzz5zawbwjefj7fcx8xzii70kzkfkc6idze5ac30axy2w2iel16004a8yaf7c8d664h1z329fddb5","GingerCloud21","","","1","","photo.default","0","1327443874","1327443874","1327443874","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("13","id91i2eced10w74jfe2xj1ze5eexa63beh3w58x8x2lj811hh8","w32wk54ll95c1a1x43ay5eji50lahc4i492xhb0ykj0cwh7fdhczlfx5d6hee8cfz37w81y3yya6yzc5","GingerCloud1","","","1","","photo.default","0","1327443907","1327443907","1327443907","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("14","hy6laz8a2w8j7hex66il36e9fjb37wajx8lzyz61wzyb8ybjl1","5x0xwkk8bd772xf83w091z2684hzilz5w3cfycdl5d2k3956zjjlixyaeh9a3y7c1167c1dey8k233z9","GingerCloud35","","","1","","photo.default","0","1327443966","1327443966","1327443966","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("15","2wy368w8xl38lk4ikdf9z6xhf5jcha1yk422lbxfdjl3433e9x","51jbyi0dkf7iyjfkizk3ej4cbebhaehf4yikjyaj3f3l7adji8f38d9j691khek662i08kaddfl929a2","InYellow47","","","1","","photo.default","0","1327443991","","0","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("18","fky23cylf2i41elibc0ke8b4zcdh3wf2kbbc6ck4xia92czf2x","z2xy5ehxcji9zzyci6915c1wh63y2l586y1ez540bci2hi66hcy158ij06hyd8ahei677708j13yy7bb","DJChat11","","","1","","photo.default","0","1327444043","1327444043","1327444043","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("16","8f992j19fbd48z7fjbkh54b5y0diliey9954d325744jawfhxa","whji6fejlc2xhja580544jaab03cwhehd8f7e1az558c0w5x8w1671jbejklh5h2hha957wccjk9c0i7","GingerCloud44","","","1","","photo.default","0","1327444004","1327545733","1327545733","127.0.0.1","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("17","xlwe3x91wakj45wkfj351bxi26e3a2fzkwci0y8d7dwjx0cfii","9dl58d1ike354xi9683yzfdch96ae71l6czy3ael3b6jhy3j0xe8ewe6ik4cc96d3kc7y025lj5ad0fj","DJChat12","","","1","","photo.default","0","1327444029","1327444029","1327444029","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("19","axwxaf5awljy800xwy0z80wlb6c0hzd47h2kd27xyxd2f3c90f","411405iy7a223kyyjjz9we0yayj6jyj89022fl473yai1834bz9ca77d10j7x589chbz0b976jdh46zc","InYellow49","","","1","","photo.default","0","1327444043","1327444043","1327444043","192.168.1.254","Google Adsense BOT","Mediapartners-Google","Desconocido","","");
INSERT INTO users_browser VALUES("20","b82k5ak2e02zlh7whcj25lj45kj6ea70i3ldh962iakw12jkci","x6x96hywc7wal0ahf0khd7hy3c5ea5few9x64kh5b1x38bi7bd5we9fyif0clebjwjbzh882cw8ezje8","GingerCloud8","","","1","","photo.default","0","1327444058","1327444058","1327444058","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("21","ckd367z8e3ki0zc01zk14yl5bil8ie6la67xde4bcacxw77edx","29ka4ekz3763xiyd7k8eij6j0c8cj7ww0d1jxwa78zd384fa8y14ckcf74f584wb6e7we70az57h088z","GingerCloud12","","","1","","photo.default","0","1327444150","1327444150","1327444150","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("22","jywd3dx3kff1lil2lhjl62z92yfzi5lbeejafac21zkydbj1y9","x9x89yyeif44baihyiwia4lx6508ieda1e68dd4b46a2y74b2bwlyc6c2yk2w9f6hb4w4x9wfkz6hedj","UsuaritoFeliz37","","","1","","photo.default","0","1327444385","1327444385","1327444385","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("23","kwi9l54cxz17ww7a88e420lk19adk584f8h9a6bkjwelajxw69","33jil87089b6kj4yb1fl0zk31x8d70ieay3yz4llf43224ww9fxe8cw3zlhwkx0a9wkhacia975a0dxz","GingerCloud2","","","1","","photo.default","0","1327444461","1327444461","1327445983","192.168.1.254","Google Chrome","Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.75 Safari/535.7","Windows 7","192.168.1.254","");
INSERT INTO users_browser VALUES("24","1i8iy4k1aa1dxxihzx5ajhl61dihch28825c3lzjhf3k77byw8","2bh8jk8ld81al82y19y4945zj7i17hziy53h84i2067izw1fd489jecwaabe1ia7c53j8a99w8w944f2","GingerCloud23","","","1","","photo.default","0","1327444499","1327545726","1327545726","127.0.0.1","Google Adsense BOT","Mediapartners-Google","Desconocido","","");
INSERT INTO users_browser VALUES("25","ibebyaw5i74ahibda9hx89x3yff1464jiadzhzxklhj5kz6jc4","7a2i4j3hebj17ai2adkdjwj1zf4kk68j1jibxijhchc48ce3hxy08l06ew6379854556h3ki18xhb73j","KittyCloud11","","","1","","photo.default","0","1327444651","1327444651","1327444651","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("26","ld0j99w78ayh86a6505yfl8jj37x0jzbd8fh1xwjfxj80izlhx","if7lkdybkxwyj11jaiyb75ld52hkd9hz6ad5z17czwa73213ccee4e3cd2x6c53a02ex8i76fca7be28","DJChat1","","","1","","photo.default","0","1327444948","1327444948","1327444948","192.168.1.254","Facebook BOT","facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)","Desconocido","","");
INSERT INTO users_browser VALUES("35","7e0lb8yww68zy6d82x69bdkx0wlh6z6cf6bl68wbex5w3i71ki","96ifhk5a6flwk41wld8eezlke4l89a6c65ede4zf8hkc8j619x90k9z3f0jy59j99l6wah6955i6ze00","HelloMe15","","","1","","photo.default","0","1327545723","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("27","6b3f67hkdj1ik1a0k896wc1ey44530bhf934k7je36fh9a7c4h","hwh5z7cc7h5ilz12ixjifc6e4abxfllke60dh6e0wf1iyf194y71xy8cx283ayl738bd10l1dycweac3","DJChat30","","","1","","photo.default","0","1327446432","","0","192.168.1.254","Google Adsense BOT","Mediapartners-Google","Desconocido","","");
INSERT INTO users_browser VALUES("53","59j8hbhkx03y93k2zwc01a7zjhl40zjeecyy791fddz9c8l59w","eda3hdx3jddy92a1k9kb8yzalbhbhyziciz11ij22653web3yw0ayzcc6kyzw5i4jh1xhf190ch6ib77","UsuaritoFeliz1","","","1","","photo.default","0","1327545725","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("28","2i2ki6kj9fe6966fey0bw422fzzdzfd5y5ldi8y5cfxl56h1h3","d0c6i98ach5wjj8i36wwx50kik7hhzhlzhe9eej1yjjhykj2bei49j2259a065kid6cbzyx9y2k9l67k","UsuaritoFeliz2","","","1","","photo.default","0","1327446549","","0","192.168.1.254","Google Adsense BOT","Mediapartners-Google","Desconocido","","");
INSERT INTO users_browser VALUES("29","e7j4cl936ij38hc883919cl21zx8cb02ka50lh93ffxwxca93y","f6x27z72kdwjeda27za77a576dh9wyawyaa64hak4ef3yzjzdaiyiz4y2ic42dbw0ykxw1yy0f0wy4x5","KittyCloud18","","","1","","photo.default","0","1327446559","1327446559","1327446559","192.168.1.254","Google Adsense BOT","Mediapartners-Google","Desconocido","","");
INSERT INTO users_browser VALUES("30","d07k3bd4ekeehbefaf33eyi9zd6dl5fl53cllidz6ej6xdfhy1","5xk6166b1020edwl59k779k9zwxwcf6lyy5dk400w92ajy8dz9c65i1e9ll1823d9k0elb41k167803a","UsuaritoFeliz36","","","1","","photo.default","0","1327447850","1327447850","1327447850","192.168.1.254","Google Adsense BOT","Mediapartners-Google","Desconocido","","");
INSERT INTO users_browser VALUES("31","3764lbf83ac938a6yz4w2yd41iw12j60zewaf7b8w5hf69a1ei","y01i7e0fy4lb7c0k2k59kf9e116290ixkckibwhyjbjhby5z994y543zfj18f1hadf31bwddkkh80whd","DJChat44","","","1","","photo.default","0","1327449176","1327545729","1327545729","127.0.0.1","Google Adsense BOT","Mediapartners-Google","Desconocido","","");
INSERT INTO users_browser VALUES("32","5d1j493zdwcexbb4zl9zaxjc3l7b221zk8cc0wiflijl3943dj","1iyakk77140i3b4wf907hdaheff8zd1kex49lhzx268b9x1y2yfc25h9hyl40wy7c2f4cw668xde16j5","UsuaritoFeliz45","","","1","","photo.default","0","1327449433","","0","192.168.1.254","Google Adsense BOT","Mediapartners-Google","Desconocido","","");
INSERT INTO users_browser VALUES("33","d71kxj7cy0k26bd6yaiaz894bdyxy429eb56k69ji6ab9cjhij","ia16c33896klkzddza5i7y6hc94lzec8xy6x3i3dx41eyw8hfd79kzcfek7y8cci2jwjey1h0hxye3zf","InYellow37","","","1","","photo.default","0","1327449552","1327449552","1327449552","192.168.1.254","Google Adsense BOT","Mediapartners-Google","Desconocido","","");
INSERT INTO users_browser VALUES("34","66zhlz87wya7ecxwcbaac59zwdyxa8kd7a5h5k0cf57j8f2w4x","alhiak0b85dj4zh82f74ax19wxa3fkd8h7yi9hzxy4fic93be95flw267bex35j7x0a440dj7dc21d5a","DJChat2","","","1","","photo.default","0","1327510254","1327510254","1327510254","192.168.1.254","Google BOT","Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)","Desconocido","","");
INSERT INTO users_browser VALUES("36","i9bz7el7w53yx9fh500hzkzezl30haj216b1e6w029le5lda39","0hkh6f4eb61z6dhah39lb1yxazfk85y1a62dl7wj9d7711y253a10cdkcykxi11lw7f5zcd111815eb7","GingerCloud47","","","1","","photo.default","0","1327545724","1327545724","1327545724","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("37","3jj51y6212a92d6d0h2za1h78914hwxlj8bj6679wd778w9bie","w1efddz65fl1275ch67y7y99k63yh50zeyb58zl341yalfi0ba3d41f5e2l784359c6hk8e2k167l9k1","DJChat42","","","1","","photo.default","0","1327545724","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("38","dhzc4f9zz7a064cecefhfjy34ld49x73257y2wl1k6ek5idzzz","b39zicxf493hz4lhfyi40z4h5xa12dbfb36c2fyclk29wf9k60jxyll1e88e5c3649h6z6x0z40xl1j3","UsuaritoFeliz4","","","1","","photo.default","0","1327545724","1327545724","1327545724","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("39","9ej38ai1zx5kx9bz8k6e2i7b0yh5cfl45iz233c8lx80dfd8d2","k5aky1591e088xh3hz03jhce3h31icf8xxzyz385c8zwe0ejh36fyadc1k8xd228b7zyfl71l6bedhli","GingerCloud38","","","1","","photo.default","0","1327545724","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("40","050hw0b27iybb7hb09k8jhbzz0x89584ybjx5f2c71e6wkdi95","75wx5ww7d9hhdiy64357f75w346e889cl1kk90lh96dafi76h36hzk2bi91hz5f2j0ixl7b28yzjzezl","GingerCloud6","","","1","","photo.default","0","1327545724","1327545724","1327545724","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("41","4i5y744hhh4cb2j1yk2hx6ibikc93j6682l15xla16xlx9c9ih","wbwfix63eez04dxey6ehyaa1bjkh23e3894w54b1e4ya1ai40yh28hdj5fahy6f8lb1x9ed6xkiz341y","HelloMe33","","","1","","photo.default","0","1327545724","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("42","c50jba2406w2bx5d3k49wwjkhdj7zba06f6a8aa9d2h113bxxk","ye90aibxh8164j3jii6f4a5xil0f3ckijjfeizklb6cxl0kwliaf3w3l9j9z7jle042kxz01i1w1iybc","GingerCloud3","","","1","","photo.default","0","1327545724","1327545724","1327545724","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("43","jxiyc5l9zexy4bziz70yjd0zkh8ywc7k6lyy419fikbbhe3w78","1bf530kycx1j8il124iz8h0cai18d2iha70i1a7i8x6ydfzixd5l6x8iwjii83k4ej86bf382wa8w1hh","HelloMe3","","","1","","photo.default","0","1327545724","1327545724","1327545724","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("44","04j6580l20bzy5h8j68d2iilzal1ab3faee58xf9xb3h7623xf","655zdl5bf198czwfiexcj00eayk788difl7ee1h5jdk8y935a5hzl09dk6aeycb7ylj54c1k6de5336e","UsuaritoFeliz21","","","1","","photo.default","0","1327545724","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("45","j4f6a373bz5ylk8ak3ihilbi1e1x3y4x9al88ifbh6dhy5afd2","2lb00h0ww4b0fhcwid83ijx491992lk3c790kj7l8dcli4wyj24xa7j68c5k700l2z5cla1w66abe1dx","KittyCloud47","","","1","","photo.default","0","1327545724","1327545724","1327545724","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("46","b248eb30xe0zx4d91bjbe54wwaix71ybh2yx6li4k0czykbz8z","634lc9fwl3a688kb6wjw8724y7cci5x2y08x4b8yhc8fby865kleal1ld1zxf26kyf0aj7fif9yjhcjd","HelloMe10","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("47","ek00d27lyyh1d4adi9d1cx7a4hkf628ywc3320xba543yjjiii","jxzwlx55751k16c23bf5e5d1w4l52i379j5f9h52z67acykdja3c4lacjzx2448wxy28jf1f5ff7fkhc","HelloMe19","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("48","hj66kej08dbb1x7ylbk78cyfcjl1713jjkaxwz7cxb9xxiyfka","6ffhy7lbjbe0b5xibieyj3ackak51ila8bi0elzb7dli5elz167cz3k6bz039a35dd92hk5l11ibw850","GingerCloud28","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("49","x4wfeccd2k5bd03860ib1fa62wafk58bkf86elle879k2blc5d","152bw15ylz8kdy5aj5adhfxkjak39cfebx7c4bxa1hbwilf8bjbld7jkc4l6dfwh481f9966ij6179yf","DJChat46","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("50","66ba85cf38fb7hw056kaah96w5idz450dfc3148jyhy9kwwa4d","k2ey3338xb19f9e89e6bwwx8fl2h30436xbhlfx86ckyy1ba6j7e352i855wydy1k6wzyk8h886xd5h7","InYellow8","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("51","7yacahw34ybljz4wedzybhkfjb42iawcl84w0fk3f62091iy62","80dfz603fyii4lz5b20dw5kd5688k23x8ze3cj676ha9i45bjzk06hj31jzcl4lhk2y4ccxww4x0714z","DJChat44","","","1","","photo.default","0","1327545725","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("52","6wbk4f5fihk2ej087dldadw5d54f7yej80f55xe8ef7ck978b8","a1cki33ehal4z3a36c5793ic920xl6fde5bc2id28i3wx0y08lzf22i2y9dd00fdzdldw2lj01c43kc3","InYellow41","","","1","","photo.default","0","1327545725","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("54","cww25bk8lzcc6xbe46j02baifbb4y3jaa9ejkfj1hd19lb2al4","4fzj49fhh4ci82yxc84836jh8eb61i05j8e7yjfz3ijf6l73fakxa65hb4z5j5i46ll6dkz96ixzjdja","DJChat19","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("55","l0x9dfyfjelkxbikkx7ewlk6c01747ix1jw4l54397066385b1","jz665a69zl84cxbj76x3aefxx7y0bjh0ze0i8lzclb979fw5bcl42a462d4178jcxzebzk928c2iyexc","HelloMe15","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("56","w76wa2h76h9k40cykhjiwzl1k6b9ybh7w7aje8ywzlhf3kjy6e","be3ix760d6kl9w3if920bz816y3xac372lzci1wa763jwbck8ck04y1kyd91wh9zfixc0db610xyih8k","DJChat20","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("57","7ib8w6jw6zbxx3dafk66zwl82k00da5az6hdky4hwelc009yaf","33jafhwww89j10be9194ed9ywbz5j2901leyjw9iw38kaxb8kliwx97x73y7el75h1i833476a2ly4zd","HelloMe35","","","1","","photo.default","0","1327545725","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("58","77x348ij7z2c2541lcelk49d9djzhwwke0c1iibayhd1ax6hl2","i3a8z2a447z34871658hbklz0xfefa3k9fj5f5bxi7hzc6xj8fa11y90af5647hz55dh96zbkiw7cb5x","GingerCloud43","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("59","idflbi2eezijfa1d73hh6ikjz3211ydy6yb9khb043l698704h","hwaldlbfyfc0fb91ae59fc0yzc8xdjzia3ej1f66ydhf3e6heyyl5kb54e9bwbhh43f8y0b2a032h1eb","DJChat44","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("60","6jzdzi9cxx478a2e6ce8f7h88kx907wjw8exl902d6kb82z580","6079h6ly148598eidzhi65zh91y7w76wil1wxeidfi01471561404w4by4w44i3j4a20w05ijylfif8x","GingerCloud1","","","1","","photo.default","0","1327545725","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("61","8902ifjd5aj6ka297zdz452zkjw66z8fbiej1dwlb4k7ezikk3","6xi26hw20dhfw10bj450lxd0le48a5lze573jfyyzi4yk660k93i711djldkx75eh831k9kz9d1hlzhw","InYellow48","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("62","612c13wbd89h0aiczyaelcx1wjbjkdzleij40138fxyjekb2l1","dix3209ll17ifw6bbyzkkkc0zhlx4h3aak5w7xe0w4zd3ld984hjwdzliz999cwx7kwh6k3je4hk1i0f","DJChat3","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("63","ifekh77jla5lxi0aeh961781zcj4ey9d617kewkabx4bi727h0","ie3abizfa0bd91zxdjiw588558j9he9e724hl3kb78bllk409j84j29526d1wa10i0xj5fzaa7yeh871","DJChat15","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("64","1eexdk3ld007jcazxeb51zw8jx2xxw9zwly3hewdc06e423xz4","bcf5by7fywhzcyk46ewcdi07c44i9b6ih1d11h353if5jz7ldea5c0l3k425hcdybw07akkfk3e1i0zw","GingerCloud46","","","1","","photo.default","0","1327545725","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("65","h24xf6jcdb0j7f4e1647adeice2077xk1hf2hjl4ff0h47kx9f","yww6ieh77j0y00jlii0y4z91c4h06xw390c0ic2hfzhfkwb86bwb62b1198758bfbd2cx2841xjl7zlz","UsuaritoFeliz12","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("66","d3y97ih54zh1ziic5ii83ach3eeibd922wj1283whkwd156ie6","c08z2jxh7fyckc3j6il3k3yhecdfx3kedkd7k5h6a6h97b3cwfwif69d13231jf72x5lz9l5jaf3ez23","DJChat47","","","1","","photo.default","0","1327545725","1327545725","1327545725","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("67","zw172yjekjk91k8jz5k3j6ac9hak801el2x97aibjlyk4ze1df","ew9370ejy8ead66izx89l2al8x21k64dwc9w17d2fl2wblyai3xhdz01863k5087iya0eay042c70jy3","DJChat40","","","1","","photo.default","0","1327545726","1327545726","1327545726","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("68","0x0ba1flj9ahwziwkd008xzwckh1wza3l7d8ezfxal2jy1x73h","e079ieiha4kbw1wciaf5cb950dabh2h9eei77l14wdc2l48y5k8h21xj97c9kx0dc31lj65758cf5k28","DJChat39","","","1","","photo.default","0","1327545726","1327545726","1327545726","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("69","24wfh92zizf3j78wlaca72kaz3zawj898wkz794bcxazzw99fi","e3ywk3xd692zi8be7jlxa0yykwaiywcha89fhhie54k0jkjhb4hf67ce3ikh8dwdx89i3j666h73whhw","InYellow26","","","1","","photo.default","0","1327545726","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("70","fff7baxfx3j742kl198hd2598fw968370lyc55488z375y3fb9","6f2400ezy68j8zzja5xxzylw390i499edkifda92a1cff8jwjjcf7jxaf01wj6ezixzl1bl0je4jzf34","GingerCloud49","","","1","","photo.default","0","1327545726","1327545726","1327545726","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("71","4j8eel9d1ywajl3b0a4c6bld578iac7l3dzi50zl2f1x6i1zyi","y8cwx03k507l98xlea0fi29fhik2k3zlx2y9ki021yj09475k6bace8j61k32b760yj6dff13h1h8fwf","UsuaritoFeliz5","","","1","","photo.default","0","1327545726","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("72","5be1bz279yk9wyh03i3352843jwj5829j6la4fy8ck9ifj147l","0zz47c0e6izax7l8l333jcaz076w2ewz66h6il977fh708fa43cekby6xylwfii1bz0f56he52k148z6","HelloMe43","","","1","","photo.default","0","1327545726","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("73","h7ziai8lleblkbd4eb8d2ce7zfzkjkcwazy77i33hab9e3dd7f","2idl21zwx2c9blw027y7ik9i7h92difxk6k0zez5a0bjf8zh5lbj9cifj2h4hk52ibjzikde09zeh4jk","UsuaritoFeliz7","","","1","","photo.default","0","1327545726","1327545726","1327545726","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("74","4dh6zcje9kew5a46e8c8idawkw46hlch2ec316aicw9000iizj","bi999j5d5ddwej8di6kx3dfl7xcaybk9yxa9e7eiwwjcj70idwkdz3jeyhla9h7wal84c9bb2l8006za","HelloMe42","","","1","","photo.default","0","1327545726","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("75","8dbx7b3l3kz46di50k3jfijz4j83773ijfyl33z98kc9cay098","657facb6ydb1xaax517x5a1x0y8xdk7w7jyi1ccydxxxbx23a5cdzi1y6aj84fw8w0f17h68wahlah3e","GingerCloud45","","","1","","photo.default","0","1327545726","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("76","hcy7f2fcyd95355iiz0h9y14f6i52hl5w9izfhy7422jk94e58","ifb490f9a8ybf5j6dzl6ffbwcdccckfi1dyc98xi4y2h70za0alj09ll1cc2d643jk4zk9xh4le44hyw","DJChat49","","","1","","photo.default","0","1327545726","1327545726","1327545726","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("77","2ykzc8c006yz63252l22yjxf7l611wabf21f50380e86cwf4k7","lf24cxwlfa071a511j8ibf6ifki4caxzdeybiah2d1df3f3lcjew76x5y6d3hl6z3cwihh95271y255z","DJChat10","","","1","","photo.default","0","1327545728","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("78","1afcd3jyb3ifzfkhjjyi6d092ejw1683yxikd3d0jal7x2z1h8","77h70301e64afdb1745f5ex55hlha3yhl5defl9hj4dd852ay278jxczwzybdlba9yjeyj29lwxcdy01","UsuaritoFeliz13","","","1","","photo.default","0","1327545728","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("79","4e6ddjl856k8yl60z2z9j55hh27jb7560k2dhd1y0fllbl8ej0","w5ayiwd9zcibw1lz87622e6wkfj2w2zb25kfzjcyk4b6x39dcwd4ic4je9lzhf0jj4w5y4c58h5c1w2h","KittyCloud48","","","1","","photo.default","0","1327545728","1327545728","1327545728","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("80","3az0i5h68z1ld8awbyk09bly06e03iwac0wiza5j04967h6xw7","y0y02h437j8xy4zjyiehlk2lac80if85fi07d827wa8yaf33yh2lda56l4hjfz8b7ilw1ecbxzfkxyz0","InYellow20","","","1","","photo.default","0","1327545728","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("81","4f53ja84cjfk0c8fx42k7w601l1cizbe2288f5hcac6h65854c","202c7aa6dxkl13z7fez05l492562ab7w4c10k934kl8l1c6dbf7ll169zk2i8kf68ddycij42x24lhdl","UsuaritoFeliz28","","","1","","photo.default","0","1327545728","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("82","7z8c5f9wa2iyyy435lkbbc2cee75hhlwh8xxdyb7axlhfe4jx9","lbd7y13ayl1ybj0ia3hw6hel42ewhdh7eka7bxbfikwklki09y826y949d96l04xb1dx97biidj46z0w","HelloMe22","","","1","","photo.default","0","1327545728","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("83","5w9ifef8fk3b7ew82fwzk2cbdkif182fdk85685zl70ykfkffb","y9yj3aayy4dj63x4i3whli6a21869798xe9a0x8x190kx83axc6z53habajkj5fd20yd35jxjd236czx","HelloMe1","","","1","","photo.default","0","1327545728","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("84","6jd8d6h3xyx955h0y49i14ja9e6x6bbdj44ifx9djl0b8e45wd","xl3x94k0ewjzkaz8141d7422cex20kezdfyf2lxf58kxzzc95e2kj416yze9cck540z606lcl98fi2ec","HelloMe22","","","1","","photo.default","0","1327545728","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("85","2fj064l8zbci0hk7190l53a85108k9z3l0b81jj1wx7cxk3y3z","7jiaxifi9ba8zd6i6ywiz1waf6xhk4d3c95dl9cl3yayf74falxkk8577jckbllkb582ihewii2jhjja","KittyCloud45","","","1","","photo.default","0","1327545728","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("86","y2e47912hdyi4779lh8fdd16bjfl420wwcax9w6dyl18i1720k","ce8f22x98kha1050l2ic212aaklla04817zbk749a5532dd77halc9x0ycifwzzcec2fa92092w1jxc9","GingerCloud26","","","1","","photo.default","0","1327545728","1327545728","1327545728","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("87","dhih5kcc38713z36h1ljifl2jb9lh2007e10af5fk446df8j3w","1w5yyl305w1jd5l9bj615we6hjfce5fllieb8wjk8x8k473wi029596a6fwcy41eaz52d2hd7jc3x05f","GingerCloud44","","","1","","photo.default","0","1327545728","1327545728","1327545728","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("88","lfwjicjexf6h18iw60410j72jd4z4hkd33dwaw7l7xxx3l59e2","bi802hxhdc690hli9b65hak23hw8fabe2wde9wcehz084c0xahe591lj62wbl2a4z174wah0hww9zy7l","DJChat22","","","1","","photo.default","0","1327545729","1327545729","1327545729","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("89","2izkde9jwa325678yew45ch7714i1k91k1d9zeh8ixzlz03h3l","b5z82i5hhjdlxz96e0afj16c51e30iea3de0b7xwi8bakyi9ywc7bflzc5kf9l1h4fa6kbi84bab9y8j","DJChat35","","","1","","photo.default","0","1327545729","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("90","95w3fly909xi1b2zj37d6yckaafa28hc6iyx2h8994chc3bkwa","x4hx48i7h9wi39bbx6276fl5346l0y16d9exfkbd6110k14253ff33d6wk42hyw5w581zd79c34yaz4z","HelloMe38","","","1","","photo.default","0","1327545729","1327545729","1327545729","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("91","z098h4d2h45cwjayw71yd6d5dcw5ch38iz1fwz3863ic14zxe5","5951aicf2849wjzfic68ka12i2ejydf00jfj401kk86aczkej2w0h2h3xf9f8hcwea7xl66w18ckw18h","InYellow24","","","1","","photo.default","0","1327545729","1327545729","1327545729","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("92","kl84b5x5ll9kz8l7322w87widccicih00lh631lefx1hc2l4kj","cw50jc1xyky1z3zbhzlwx95bd8j22e0e9xwjk9kbdaakx01y1bywaa4095cdlikx3eb7beewhbi6l9d0","InYellow47","","","1","","photo.default","0","1327545729","1327545729","1327545729","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("93","6f3jdeh1l0ak9lk5yb4we64l8k944a8f4hf43kx457218fw6x4","df5bc6b0lx63221eb026a2el3icwlccxikkazw03y6e98f40ybx5h94e3bh24240985z2a5h3f4bkzlf","GingerCloud5","","","1","","photo.default","0","1327545729","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("94","7236exdl7adk464839h9zxkjbh8ek3j9j79k02kfwl060l78xz","yl0kwi73y2l0hlea0dbilyyfe3y8bfeb3wz5dwxya9cyy9ahbz7de2ky2xcwhikxya807c234zik55wc","HelloMe18","","","1","","photo.default","0","1327545729","1327545729","1327545729","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("95","3a1w2iilbij26a861yfze40ihlih1b772a0a034lj8f0bcyz99","b5ayj2ixfkzdjezkkih76e4dy76lejwkabdc20cj74a2ad9awy5y3721a3299lzi0120ya6fc21dc11w","UsuaritoFeliz39","","","1","","photo.default","0","1327545729","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("96","f49k70iffyyfbbdk2c2zh3dfc0ze1hewcay92e6f4lhfwfha02","b9k4yj8ll1k0j5lldy3iexc6bwx5ahelhal87w9cd5kde05lzwh3cj52l3h2cebj9jexd0fl17e0wje6","InYellow4","","","1","","photo.default","0","1327545729","1327545729","1327545729","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("97","a17i14y7491xyhdky5if57x4hixi2e7w2hxlb2x24212k062b7","0y3ze3f7lcea0f4ixe424j3elfiw3k59606cwcy2f96j3zj664kwxie9907ec5e10af3e70f20592jh9","DJChat33","","","1","","photo.default","0","1327545729","1327545729","1327545729","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("98","yciw1kabe48i1hxlad7043ic3iji5kf6w4xjlkfk9dexx8y014","dd4yl5i0lhcaa9c95xck9ez7503x4fe8jka1zf2hh0e897l2jbj9lee96y42lx3djkbx9ziwkbcj9djw","DJChat46","","","1","","photo.default","0","1327545729","1327545729","1327545729","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("99","2j19zj1xykf99zd08w6l979yh6d8fcl5dwhiyfhw169la3fk0c","925dyzibw157yea5z4zd7015zcc6y9hy90bcwj3kky84yeic157608yx153b7j2b61c9xz2cjj0933wb","DJChat19","","","1","","photo.default","0","1327545729","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("100","9zkaf6wwac6x1wdc1ca8f6j0yw9cb378276i6lb3edclfia2z5","yf6hfyyhayjb7xa1fk765b340j0yhe1908k20e4wydw676h1d91ky119y2zhea2j2zj6af8ihfaij69i","DJChat5","","","1","","photo.default","0","1327545729","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("101","31l9ah4d371eai5yz1aa41ec9j97y23d21xljbx51xf4d40eb3","z8dyc12294k59j8e1253e5y9xy39az241i3f03xhb1h3ihhd1i705hi263xe9dw0yxhylbh4cle1yack","DJChat41","","","1","","photo.default","0","1327545729","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("102","6hd32xi7ihy7dz7d4eki16cb99by4hf30elcw9k477h88h99jw","dj99dhxce3h6z1jeh6jxefcjazbwicf9bd8ihwehex328w9yhjc9ycdiy7h75l85y0bw99z27fcy415c","InYellow39","","","1","","photo.default","0","1327545729","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("103","z7jck8yklfib07l3akjh42f61caawxkk9bdhjda6a4ye6e07lf","z2d1ay6aj53xd855x479z2a1j5j9cj230b60736iic4zb4wbcz062xj0ejxekec2wk81ww89y25wdh7f","KittyCloud7","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("104","h2h5zew42w0w9afffiif9wecx7x65f19211eyx1hc2x8ddl47x","ylz1ya1879ez2xdh2e98j3beahb3ik2ecdzxwdhi5da9fx78kbehidez91edwzay1ay4a8i9k89w5k09","GingerCloud40","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("105","z0e4yxxcwfl3c9zf1i3if3384cl9a8ic9xe2cb7ldfc8zb0a0l","6whhzk8fzwb4122h13jfjixbjkhlhbl3h89bhdd1f71zy2zl44031213848zkz26dik7adlkbzh2ylyd","KittyCloud23","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("106","yie0lyx5f02c3xajd2ek7x01y84wee9cz8x930wlj6f600zfe6","4ykyx4iaxb4iix5k9583ld1je3a10l09zy6hkw2xkcbyxbcx3fw15k3k5z9kx5ab65wci9e31hcbx2li","UsuaritoFeliz45","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("107","c721wi9bl0zlzc3leyw3llj9cb9j6yf47cfw95wk7kz83jh8l1","02kwhxjcdww584chx534z1y1x212a7c3h6bcz82lkieh2axkkx3dcxx2dz8ldj668j1yele35zxkfbhk","KittyCloud13","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("108","wxi83zl2b5ialbb19w53zdj3eh3kihbeheczc8d997d4k2lhyk","hfbd3cbzic40d7ji9lhal8j5a2jky0jfz2jwf592w7k520yc0a89l89w1clxifjwzc3i7bi0cwic7wx9","KittyCloud17","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("109","b706cek3iw4hl13c3x4ihc6zxx42c1bkc2whxwyxblac9238l7","kbe7a0fwf9ly91fdf3dfabdxkl5c6y2wjj3087jcez17wl6cwkcxlha22634y56k5belb78yzwa62bde","GingerCloud7","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("110","lez81bwb8w0e0858kzl8w7wh2b88aexdyb76ky04kkyk9cwljx","95h7lzl7yf4b1c428x6idax1hbzzxcz6hlifl45ibjhek2aa54afxy7lexx5fj5w15w91x0awb45fyj4","KittyCloud13","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("111","8zfxbb6y3e824z76k5z8wxi3h8f75k3489fy260yc01kwz9y4f","0b15c98c74e0hwlidaz0i44lc9lw200c31h9x9c62515d79j9a4w69yci8ieh608hdd9w9k8k7wyi184","InYellow49","","","1","","photo.default","0","1327545730","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("112","8a04545z1c5i357f8x1bik38h272iy70a70x0y5x06x0bd025d","w50cy2z7a41ba76c9kf8098hezb0il9c9a4h9645clha5zx7l5y2cdydydxiix57cwl9x418i20d1z19","KittyCloud31","","","1","","photo.default","0","1327545730","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("113","y57y2lb050kj7jcilki7dy273xi3w0d73wj5hiy2i4zd7c7w0c","ey04ixfc224326diff583h7kf6chldl790eel6xk1j6685y36fe8zea3716c99hl92x7ela60dwhx075","UsuaritoFeliz29","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("114","wjhehcaxyzx8dfj65x7wihbz4366j2bx67ac465jk8bdx99h01","jxy81db5x9azwwx8xw2zf9kkk6l2kc4c94h4zkcxye7948ae73e8zl72z4adi1e3909cwxf264lcw6j5","UsuaritoFeliz40","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("115","fe3160zj428ef76jkf778kfi445daca5b9h711dh51ibzew5w8","xlffxawi6xfl08xhzyd059acaiie6baclx6al3c689k7jix0k2y7kk9w66d2c618fcf620x6c9fezlje","GingerCloud26","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("116","c06kl8wd73jfehb36ydhx6i5f1iwxzfhwl254d31c5101xx7wf","e7c58ia7ai5jhb3hd4169140l8w46j8h7i6fzhfzyde3yw69kb06148ixe3cy4l75jxdjxcd4flwk3hi","DJChat20","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("117","byf00biyfh4yhf1z2ddlwkfibc6ayl9808acf2baydfwhycl1a","e69ki0xbjjy9fefwfywc467a67197hbyibixwa7xydyb11kw6a0zwhyzccjjheiyi2ez8xxebyx4i715","KittyCloud39","","","1","","photo.default","0","1327545730","1327545730","1327545730","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("118","16wcfae0xhxy7a82dwy4ibf0hzjx57jf7bla14j6xxb9d405kw","fjzb3dad5ye9z115jca7l44bkj6dd0w282d92dwc57ch5lyb0jajaa9w2fx1408ea1dkzieke872f64a","InYellow50","","","1","","photo.default","0","1327545730","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("119","lzb18x3lf5b6f9j8cc5l24a266y3c2j4kaeb5121cx6wak5jix","87hd4w619dzk1iwi1c2e99d356h4d7jhjieyl3l8ka7800kelhjf1ld4ajlhke2w2fdewx34ia75bf5j","KittyCloud44","","","1","","photo.default","0","1327545733","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("120","53d963ey777zjha4l87k08634xczle89e2026bechh0fb77bk2","hd76k73b791lwjj1e26jawl8kjdewyhkc5wwl6y1wyf99ijl18bxcl89ey7770hkwfl55k4a8597106z","InYellow31","","","1","","photo.default","0","1327545733","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("121","a7ea3eb9lyelh8e97dxxi15z96jhy2blbaleefbw61i8bid5ih","hw0e3h4dyhcxzhib0yxj07a7k47ix4f8ly8y7l7hke29kfli82406h63ja5h6xbx7kjkieedyl83j06a","UsuaritoFeliz10","","","1","","photo.default","0","1327545733","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("122","j1i2czhalj46k10dddy0ixxk2w01y2czl84fldlexhdjf2z509","6j8x0e7h4icy968xha4bw35d64d2y62iajcl8w6hffba2h3xd41i7i5b100bj6z8jclec5yh82h7h9c5","HelloMe41","","","1","","photo.default","0","1327545733","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("123","bdw4ibe42l2ex2c26b7db3acfkwxk967a6ewcb4d0xlel59h8f","8djjy74zh16j10c583zcxjbx7id76kzkely86cklz1ezhex6dx28zxz5zyb457138595fz96w10ie7f8","DJChat24","","","1","","photo.default","0","1327545733","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("124","icib0yhzwdf5bl58w4y11z085iyy559fi4fi1wx2f6bw33460e","e67392i57fi92khk709eyykchy319l298c1hd5dx6xj0801hjfya5hfibx3182a3w25lzkz3bixid452","GingerCloud39","","","1","","photo.default","0","1327545733","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("125","i993xwbda5ky1f0lylclj2ww122eb7edzc16widljxjwh79079","f0k5cbxd1yf1bldwfjw8yk16000lwc79cacib19884l7dd2lai303xhcy54d2ll2cdi25x6ajhyjjh29","GingerCloud40","","","1","","photo.default","0","1327545733","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("126","zcwfaec14k7fc21y119e8x31xyd23eyb2x28z7l2w76fzd125l","0dxlzzxd20e4k9keb3w0xexxjal9z9lj7wj8f1y4y9dj9z1a9fl4k0heccf81yx954k5y77w36ii4xi5","InYellow36","","","1","","photo.default","0","1327545733","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("127","16bdbyc84jab1dh4z842lc4b3z90d62jkxaiawbwyyay7255y6","w8623wydcwf7y840i1yhy6ejk552e956574h6w8b6d28hehid0f5ije1yi4x0724fdfy9b6beh1lfdxa","InYellow41","","","1","","photo.default","0","1327545733","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("128","283x1cz28wc6522l7bk92l2d6e52a86ec4620fjwiae4kji9if","ffalyyi54c0a7517kw8djhc8a218aa43laaafz0z4ikf63diyfaadkek598a9bwx08j1ibwy0ywkzwxw","KittyCloud16","","","1","","photo.default","0","1327545733","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("129","ke6yb39x6yh8d5k29lfyk9ci75wex8kf7wfw48k0whl3d12c13","f56dwyw9h9h451adc0lcz5j4efbixedy3k3h6cj2z6k96d02laf0ebh0f77xy21aia2f348bcx22d7iy","GingerCloud3","","","1","","photo.default","0","1327545733","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("130","0bxhjw994khl2lff8fdhe3lli57z4496j6a64fb92h0yacy6wy","c8yld1309f093jec514bhey7aez7li0d33i5li50eyel6f97wfzah7fbb64yf00jky4b91f4b1wf53xh","GingerCloud34","","","1","","photo.default","0","1327545733","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("131","a9f947afijh9y3fz00haz24kybw54d9j9cjbk8i0j04adc030k","wj441i1c25j22kl4047x16h06dczdiwj2i075d0835l07hw7aei03e0if0wb8w075ea2yy28ylkhj8dh","GingerCloud10","","","1","","photo.default","0","1327545733","1327545733","1327545733","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("132","3w0z87hbfxzdzhydkbx4ebi45d906ylibz3czeai5650zab18w","84eel3zycf843baahbldw4z4wbffkbdfh47d423174dfj06c76chydkziwz1we8fxd77a2a1551jfjzd","GingerCloud43","","","1","","photo.default","0","1327545733","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("133","jaye50b475wcjb93yjw031822eaz3b6l0x1dj02j512943fd1z","yif8b54ayda22a7bxf7fehaw4zjfx9z1di47k6kk81lai3354b1cew05af95w2jd043b92k43hldid32","HelloMe47","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("134","d7by7l8a6jwhk5099ajl5145h9jc03yibylwew8i2y2625x2b7","lj6fwyd6y0ck5081754wa4dcaxfjx47283cbz89ad2we2id5w01h48c57ydbhb5a693bbkhkja57bcl3","DJChat16","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("135","hj52w5aed5e6i49iy576fd2ae81250j25bxh6jz3w2zk1yx44a","fdbyk5ki7346yhafl1lye3by1xjf5kkd9wey0xyjcl65y95wh7ah6z2keliaehze7d599bbhl3cydx7x","DJChat9","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("136","fj3w6y1z23yj6kdbj01h537x1yz009hh5c1k0k0790l0b0026y","il86lk5c83dd66bf802d231l4xd0l3a7bdyy1i2i8z20lek5efw3ki2zh9ex44bafw6idw6z666ik4fh","UsuaritoFeliz46","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("137","lcb7djke1zyyei8f8a40fhz4af53kzlj974wlh14i0bhfcy0y9","zkeefx0jz2b2485xyhj245j22ydedxcbc1bka9ccx17axzd2b4zja6xwlee46f3wa2hc2d6386by947y","KittyCloud34","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("138","6c04c5l0cyc3a7fkyj7cc69dj67l420ibiczwbbfj1ajcdcl1c","381yjk3dcicc2l17y7zdfw74ykbz7aey5815x591c9f97eh0didab0b82y8aew1ck3ki5w5j85k5z1kx","HelloMe20","","","1","","photo.default","0","1327545734","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("139","dhy8a33c9e5akez9xc76y9f2h968x4wid3az55ezldaahzbak3","kywf294z4y99x9xll81xk6zzf96z18dx7j6dakdb6h53i49j8k53ywaeef2x8ff513eece53kef8lxyy","HelloMe9","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("140","ey63iw6di8163bdik962hd52xyzdfhi7wwyywf4l9xxxwf54a2","l12184dj3663a808l878w36z40zk0zkebl62aj5wah317k3b2bdj15f7ay26dyh206y0xc61le61li7b","HelloMe47","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("141","d6wwa2265wz5ea2y81dalch7lkyix4l02a53i40yx03cf12cd0","9cc84h8i8ye3wew9i7w8jiz52bea75ax78w3x4a5i942k3y35ydel843wyjd2cwc29w0b02afkw3j5k1","UsuaritoFeliz22","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("142","f6ly3yajj1be4dbk7a0d9032lx4jfj0kw7y2z51he4yw8l03il","38ck11bzwd0y9k4y8wjekh49310z22z7lk70ddhxc8yai0wwx2ef5aei356k7i881y5798ek588582w5","HelloMe43","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("143","5lbd0i7zlfyzf1fheb3xj590j659zjwlw75eb7w0i5l1icdl8l","zkx8fyy2x0bwhy075eyz1aj68jzed626f76ajxw5wczafca3k82kdec8hiw0bk3yce6866h076e1l64w","DJChat7","","","1","","photo.default","0","1327545734","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("144","d0j1h8f4k44al75yild6eiikk43la4fld881h7l9dj10c8zjbi","079acac8zww0288173k8da4y7axbx5hl63ldafibcyiaibie2k7jj38268c648ad0x7zbihb5jl9z52l","DJChat25","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("145","l9yzzdie2c3cxwbja4e10464aze4yj5aib4wczl3jxw5wi52hz","czdj2bhh0b2ewiwc4zxzzz69dwe13cb69zjfe0b130cx357hfy46l04i81haw2xh7e136c1yf9lhlzb9","DJChat36","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("146","0hlke8da7x66w6iewa7hyzllxbwcf1e0241ff6wah62wk2jdhj","3wkywdxa16x3ch00hyb8kxwhdc7f0la6w0kk95z2cwidk06kly4k94c250w99l979ei8030wywi0270z","GingerCloud45","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("147","2hd8ky94a5x8ee5xci0w11zaba9j62jl15354ix54890eh7d76","y5ahlak7fky152i9l8ajkh9ik5zd9375ijy22xj46jwi1h51ezk6w5c86wbiz4bjc0a189el03j5jl39","InYellow2","","","1","","photo.default","0","1327545734","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("148","xzx37ex9l8k35lxff02cizfz0lfw7h7fdbejhyda5dz15alef4","al8xbcy9cb2ce77lkdhx55d1cd123xhd70eji6h880y5i19xi45wj5jcb3f02xf6h2f89i7cjkd11ec1","GingerCloud28","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("149","wfakj21fxl14aa4lbyxd8zwl9w4064f3jdh3fe0ey6fj0y5402","7f20i7a5eiw34c4kej6yif04l995kiahcedcb5fe41a8liw4l79zhdhxca8h1cli4cchf09y81iii9l4","UsuaritoFeliz11","","","1","","photo.default","0","1327545734","1327545734","1327545734","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("150","6dkyewda3yi8wb0h2d8eyxcxi6ee57jyhiki8jwxdkykzbh88z","5h0hef9i4kzl16b04j0c05l51h3zyl2cjw4hxl476ib7hzd1izdel8lzaxybzcjkyaf94w0ejd131j0l","GingerCloud11","","","1","","photo.default","0","1327545735","","0","127.0.0.1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","","");
INSERT INTO users_browser VALUES("151","f9if0cd26xfykb1edf88hhxcbjeie2aze5ya1cw433we2eicly","d40fyaj1ablka36djhwi7eaailde6fl6fc988343j0i42a7e57xk47cx2ffc9xbed2wf5565kziehd0d","DJChat18","","","1","","photo.default","0","1328379412","1328379412","1328384876","::1","Google Chrome","Mozilla/5.0 (Windows NT 6.1) AppleWebKit/535.7 (KHTML, like Gecko) Chrome/16.0.912.77 Safari/535.7","Windows 7","InfoSmart-PC","");
INSERT INTO users_browser VALUES("152","w3exad7adhlhh2aek2ldcc3464w5e5jdhxa1wza7cj76x14adj","h5zefceffy8w54w5665c8hjez17w6w51ed0z9ywi281w4adyi9xdcz5ywk8ji3x59l4ix09y50zwdd91","KittyCloud21","","","1","","photo.default","0","1328384906","1328384906","1328384906","192.168.1.254","Google BOT","Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)","Desconocido","","");
INSERT INTO users_browser VALUES("153","bkxxfl5988kd1awlbxefch10yl6b5wc620y29z06j2k73zhij7","fx233jky4ych0126y0i4ch5e4i2ac7ed62h06e4ehy0e6wd4ci1e39a60aeak2cbfiwaef6697d1awy6","KittyCloud19","","","1","","photo.default","0","1328617726","1328617726","1328617726","192.168.1.254","Google BOT","Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)","Desconocido","","");
INSERT INTO users_browser VALUES("154","ydx5x1dl9waz8wk4hc9a787di74dif25k8a5kz05jiwba065ec","yj4fclc7xx9ka2831bwx4l0lbe7cflbci1l0j9fj95aba04fw1dxc2e5hizwwihweb7zwjkfw77dfxkk","GingerCloud21","","","1","","photo.default","0","1328974491","1328974491","1328974491","192.168.1.254","Google BOT","Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)","Desconocido","","");



DROP TABLE IF EXISTS users_rooms;

CREATE TABLE IF NOT EXISTS `users_rooms` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ownerId` int(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `in_list` enum('true','false') NOT NULL DEFAULT 'true',
  `options` text NOT NULL,
  `style` text NOT NULL,
  `date` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

INSERT INTO users_rooms VALUES("1","1","InfoSmart","Esta es una prueba","true","{\"name\":\"InfoSmart\",\"desc\":\"Esta es una prueba\",\"radio\":\"\",\"web\":\"http:\\/\\/www.infosmart.mx\\/\",\"visible\":\"true\",\"smilies\":\"true\",\"bbc\":\"true\",\"wordsfilter\":\"true\",\"text_color\":\"false\",\"sound_message\":\"false\",\"social_buttons\":\"true\",\"onlineusers\":\"false\"}","{\"background\":\"wallpaper-1460086\",\"box_background\":\"255, 255, 255\",\"box_trans\":\"80\",\"font_color\":\"\",\"my_css\":\"\"}","1326812744");
INSERT INTO users_rooms VALUES("2","1","Prueba","","true","{\"name\":\"Prueba\",\"desc\":\"\",\"radio\":\"\",\"web\":\"\",\"visible\":\"true\",\"smilies\":\"true\",\"bbc\":\"true\",\"wordsfilter\":\"true\",\"text_color\":\"false\",\"sound_message\":\"false\",\"social_buttons\":\"true\",\"onlineusers\":\"false\"}","{\"background\":\"\",\"box_background\":\"255, 255, 255\",\"box_trans\":\"80\",\"font_color\":\"\",\"my_css\":\"\"}","1326970625");
INSERT INTO users_rooms VALUES("3","2","Prueba",":D","true","{\"name\":\"Prueba\",\"desc\":\":D\",\"radio\":\"\",\"web\":\"http:\\/\\/www.infosmart.mx\\/\",\"visible\":\"true\",\"smilies\":\"true\",\"bbc\":\"true\",\"wordsfilter\":\"true\",\"text_color\":\"false\",\"sound_message\":\"false\",\"social_buttons\":\"true\",\"onlineusers\":\"false\"}","{\"background\":\"wallpaper-1460086\",\"box_background\":\"255, 255, 255\",\"box_trans\":\"80\",\"font_color\":\"\",\"my_css\":\"\"}","1327389511");
INSERT INTO users_rooms VALUES("4","2","Esta si es otra prueba xD","&lt;h1&gt;Wooots!&lt;/h1&gt;\n\nLOOOL\n\n&lt;p&gt;Hahaha&lt;/p&gt;","true","{\"name\":\"Esta si es otra prueba xD\",\"desc\":\"&lt;h1&gt;Wooots!&lt;\\/h1&gt;\\\\n\\\\nLOOOL\\\\n\\\\n&lt;p&gt;Hahaha&lt;\\/p&gt;\",\"radio\":\"\",\"web\":\"\",\"visible\":\"true\",\"smilies\":\"true\",\"bbc\":\"true\",\"wordsfilter\":\"true\",\"text_color\":\"false\",\"sound_message\":\"false\",\"social_buttons\":\"true\",\"onlineusers\":\"false\"}","{\"background\":\"\",\"box_background\":\"255, 255, 255\",\"box_trans\":\"80\",\"font_color\":\"\",\"my_css\":\"\"}","1327389881");
INSERT INTO users_rooms VALUES("5","2","Prueba de Chat","Looolazo","true","{\"name\":\"Prueba de Chat\",\"desc\":\"Looolazo\",\"radio\":\"\",\"web\":\"\",\"visible\":\"true\",\"smilies\":\"true\",\"bbc\":\"true\",\"wordsfilter\":\"true\",\"text_color\":\"false\",\"sound_message\":\"false\",\"social_buttons\":\"true\",\"onlineusers\":\"false\"}","{\"background\":\"wallpaper-1468366\",\"box_background\":\"255, 255, 255\",\"box_trans\":\"80\",\"font_color\":\"\",\"my_css\":\"\"}","1327442942");
INSERT INTO users_rooms VALUES("6","2","Prueab","","true","{\"name\":\"Prueab\",\"desc\":\"\",\"radio\":\"\",\"web\":\"\",\"visible\":\"true\",\"smilies\":\"true\",\"bbc\":\"true\",\"wordsfilter\":\"true\",\"text_color\":\"false\",\"sound_message\":\"false\",\"social_buttons\":\"true\",\"onlineusers\":\"false\"}","{\"background\":\"\",\"box_background\":\"255, 255, 255\",\"box_trans\":\"87\",\"font_color\":\"\",\"my_css\":\"\"}","1328379402");



DROP TABLE IF EXISTS wordsfilter;

CREATE TABLE IF NOT EXISTS `wordsfilter` (
  `word` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Filtro de Palabras';

INSERT INTO wordsfilter VALUES("puto");
INSERT INTO wordsfilter VALUES("puta");
INSERT INTO wordsfilter VALUES("pendejo");
INSERT INTO wordsfilter VALUES("pendeja");
INSERT INTO wordsfilter VALUES("pito");
INSERT INTO wordsfilter VALUES("verga");
INSERT INTO wordsfilter VALUES("pene");
INSERT INTO wordsfilter VALUES("vagina");
INSERT INTO wordsfilter VALUES("cabron");
INSERT INTO wordsfilter VALUES("cabrona");
INSERT INTO wordsfilter VALUES("chingada");
INSERT INTO wordsfilter VALUES("chingados");
INSERT INTO wordsfilter VALUES("mierda");
INSERT INTO wordsfilter VALUES("popo");
INSERT INTO wordsfilter VALUES("shit");
INSERT INTO wordsfilter VALUES("motherfucker");
INSERT INTO wordsfilter VALUES("motherfuck");
INSERT INTO wordsfilter VALUES("p.u.t.o");
INSERT INTO wordsfilter VALUES("p.u.t.h.o");
INSERT INTO wordsfilter VALUES("putho");
INSERT INTO wordsfilter VALUES("mamawebo");
INSERT INTO wordsfilter VALUES("mamahuevo");
INSERT INTO wordsfilter VALUES("mmg");
INSERT INTO wordsfilter VALUES("putha");
INSERT INTO wordsfilter VALUES("putho");
INSERT INTO wordsfilter VALUES("pija");
INSERT INTO wordsfilter VALUES("dick");
INSERT INTO wordsfilter VALUES("bitch");
INSERT INTO wordsfilter VALUES("b!tch");
INSERT INTO wordsfilter VALUES("dumbass");
INSERT INTO wordsfilter VALUES("joto");
INSERT INTO wordsfilter VALUES("jotho");
INSERT INTO wordsfilter VALUES("asshole");
INSERT INTO wordsfilter VALUES("culo");



