<?php
/**
 * start configuration settings
 */

// 타임 존 설정. 
date_default_timezone_set('Asia/Seoul');

$conf['datasources']['10.144.143.124'] = array(
	'host'	=> '10.144.143.124',
	'port'	=> 3306,
	'db'	=> 'slow_query_log',
	'user'	=> 'ec_dp_imall',
	'password' => 'ec_dp_imall',
	'tables' => array(
		'global_query_review' => 'fact',
		'global_query_review_history' => 'dimension'
	),
	'source_type' => 'slow_query_log'
);


/**
 * end of configuration settings
 */
?>
