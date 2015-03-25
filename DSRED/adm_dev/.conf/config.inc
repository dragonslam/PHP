<?php
/**
 * start configuration settings
 */

/**
 * Site Based Setting.
 * 
 */
$conf['sitesetting']['adm.dsred.co.kr'] = array(		
		"site_timezone"	=> "Asia/Seoul",
		"site_datasource"	=> "real",
		"site_root"			=> "/adm",
		"site_cdn_path"	=> "/adm",
		"site_res_path"	=> "/adm/resource",
		"site_resource"		=> "/resource",		
		"site_index"			=> "index.php",
		"site_name"			=> "대성부동산",
		"site_message"		=> "",
		"site_max_cnt"		=> "4000"
);
$conf['sitesetting']['dev.dsred.co.kr'] = array(
		"site_timezone"	=> "Asia/Seoul",
		"site_datasource"	=> "dev",
		"site_root"			=> "/adm_dev",
		"site_cdn_path"	=> "/adm_dev",
		"site_res_path"	=> "/adm_dev/resource",
		"site_resource"		=> "/resource",
		"site_index"			=> "index.php",
		"site_name"			=> "대성부동산",
		"site_message"		=> "",
		"site_max_cnt"		=> "4000"
);
$conf['sitesetting']['php.dev.localhost'] = array(
		"site_timezone"	=> "Asia/Seoul",
		"site_datasource"	=> "dev",
		"site_root"			=> "/DSRED/adm_dev",
		"site_cdn_path"	=> "/DSRED/adm_dev",
		"site_res_path"	=> "/DSRED/adm_dev/resource",
		"site_resource"		=> "/resource",	
		"site_index"			=> "index.php",
		"site_name"			=> "대성부동산",
		"site_message"		=> "",
		"site_max_cnt"		=> "4000"		
);



/**
 * Data Source Setting.
 */
$conf['datasources']['dev'] = array(
	'host'	=> '10.144.143.124',
	'port'	=> 3306,
	'db'	=> 'slow_query_log',
	'user'	=> 'ec',
	'password' => 'ec',
	'aes_key' => '!daesung!'
);
$conf['datasources']['real'] = array(
	'host'	=> '10.144.143.124',
	'port'	=> 3306,
	'db'	=> 'slow_query_log',
	'user'	=> 'ec',
	'password' => 'ec',
	'aes_key' => '!daesung!'
);




/**
 * end of configuration settings
 */
?>
