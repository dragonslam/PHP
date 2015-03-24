<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Control View Template
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php 
	switch ($page_action) {
		case "1" : 
			$page_title = "임차인 관리";
			break;
		case "2" :
			$page_title = "임대인 관리";
			break;
		default :			
	}
	
	@include "customer.php";	
?>