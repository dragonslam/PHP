<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: CommonCode Process.
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php 
if ($site_isDebug) echo "<br/>CommonCode Process - ". $processApp ."/". $processCmd;
if ($processApp == "process_code") {

	require "CommonCodeDao.inc";
		
	//$codeDao = new CommonCodeDao($site_datasource);	
	
	switch($processCmd) {
		case "getList" :			
			break;
		case "getData" : 
			break;
		case "setData" :
			break;
		case "delData" :
			break;
	}
}
?>