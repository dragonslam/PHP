<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Customer Process.
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php 
if ($site_isDebug) echo "<br/>Customer Process - ". $processApp ."/". $processCmd;
if ($processApp == "process_code") {

	require "CustomerDao.inc";
		
	//$customerDao = new CustomerDao($site_datasource);	
	
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