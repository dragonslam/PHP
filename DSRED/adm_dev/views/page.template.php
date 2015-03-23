<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Page Template
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php
	@include 'header.php'; 
?>
<body>
<?php
	if ($site_isLogin == false) {
		// 로그인이 필요한 페이지.
		// $site_message = "로그인이 필요한 페이지 입니다.";
		// @include 'page.message.php';		
		@include $page_Data["login"][2];
	}
	else {		
		@include $page_Data["main"][2];
	}	
?>
</body>
</html>