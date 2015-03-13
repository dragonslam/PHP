<?php 
	// Ensure we're on php 5.3 or newer
	if (strnatcmp(phpversion(), '5.3') < 0) {
		print "Anemometer requires PHP 5.3 or newer. You have ".phpversion();
		die();
	}
	
	set_include_path( get_include_path() . PATH_SEPARATOR . "./common");
	
	require "helpers.php";
	
	$conf = array();
	@include ".conf/config.inc.php";
	if (empty($conf)) {
		$action = 'noconfig';
	}
	error_reporting(E_ALL);
	
	// common variable setting.. 
	@include "common/common.php";
	
	// view load..
	@include "view/00.view.main.php";
	
	// 디버깅 정보 출력
	if ($site_isDebug) {
		@include "common/debug.php";
	}
?>