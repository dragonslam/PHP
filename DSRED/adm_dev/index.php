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
	require "dao_base.php";
	
	$conf = array();
	@include ".conf/config.inc";
	if (empty($conf)) {
		print "need configration.";
		die();
	}
	
	// common variable setting.. 
	@include "common/common.php";
	if ($site_isNewUser == true) {
		//~Logging..
		$_SESSION['isNewUser'] = false;
	}
	
	// data processing..	process
	if ($processIsRun == true) {
		
		// login check...
		@include "common/process/login.inc";
		
		if ($processStatus == 0) 
		{	// Data Access Compoment Importing.
			@include "common/process/".str_replace("process_", "", $processApp).".inc";
		}
	}
	
	// view load..
	@include "views/page.template.php";
	
	// 디버깅 정보 출력
	if ($site_isDebug) {
		error_reporting(E_ALL | E_STRICT);		
		@include "common/debug.php";
	}	
?>