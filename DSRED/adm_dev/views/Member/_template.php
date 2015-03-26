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
		case "member" : 
			$page_title = "사용자 관리";
			@include "member.php"; 
			break;
			
		case "group" :
			$page_title = "사용자 그룹 관리";
			@include "group.php"; 
			break;
			
		case "auth" :
			$page_title = "사용자 권한 관리";
			@include "auth.php"; 
			break;
			
		default :
			$page_title = "사용자 관리";
			@include "member.php";
	}	
?>