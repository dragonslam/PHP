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
		case "address" : 
			$page_title = "주소정보 관리";
			@include "address.php"; 
			break;
			
		case "menu" :
			$page_title = "메뉴정보 관리";
			@include "menu.php"; 
			break;
			
		case "code" :
			$page_title = "공통코드 관리";
			@include "common_code.php"; 
			break;

		case "visit_statictics" :
			$page_title = "사용자 접속통계";
			@include "visit_statictics.php";
			break;
		
		case "view_statictics" :
			$page_title = "데이터 조회기록";
			@include "view_statictics.php";
			break;
	}	
?>