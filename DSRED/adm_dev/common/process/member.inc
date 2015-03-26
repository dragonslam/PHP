<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Member Process.
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php 
if ($site_isDebug) echo "<br/>Member Process - ". $processApp ."/". $processCmd;
if ($processApp == "process_member") {

	require "MemberDao.inc";
	
	//$memberDao = new MemberDao($site_datasource);	
	
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