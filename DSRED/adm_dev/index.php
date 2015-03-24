<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Init Page.
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
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
	
	// data processing..	
	if ($processApp != "" && $processCmd != "") {
		
		// login check...
		@include "common/dac/login.inc";
		
		if ($processStatus == 0) 
		{	// Data Access Compoment Importing.
			@include "common/dac/".$processApp.".inc";
		}
	}
	
	// view load..
	@include "views/page.template.php";
	
	// 디버깅 정보 출력
	if ($site_isDebug) {
		@include "common/debug.php";
	}
?>