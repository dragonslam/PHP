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
	if ($processStatus == 0) { 
		if ($site_isLogin == false) {
			// 로그인이 필요한 페이지.
			// $site_message = "로그인이 필요한 페이지 입니다.";
			// @include 'page.message.php';		
			@include $page_Data["Login"][2];
		}
		else {
			@include $page_Data["Main"][2];
		}	
	}
	if ($processStatus == 2) {
		@include $page_Data["Message"][2];
	}

	// 프로세스 수행에 핋요한 스크립트를 출력한다.
	PS_PrintScript();
	
	@include 'footer.php';
?>
</body>
</html>