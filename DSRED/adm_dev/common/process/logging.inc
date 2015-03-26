<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Logging Process.
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php 
if ($site_isDebug) echo "<br/>Logging Process - ";

	require "SiteVisitLogDao.inc";	
	
	switch ($site_logging_tp) {
		case "visit_log" :
			//$siteVisitLogDao = new SiteVisitLogDao($site_datasource);
			
			break;		
	}
?>