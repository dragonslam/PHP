<?php
//echo date('D jS \of F Y h:i:s A');
?>
<?php 
	include "./common/common.php";
	include "./common/header.php"; 	
?>
<body>
	<nav class="accessibility">
		<ul><li><a href="#contents">본문 바로가기</a></li></ul>
	</nav>
<?php
	if ($page_auth == true && $site_isLogin == false) {
		// 로그인이 필요한 페이지.
		$site_message = "로그인이 필요한 페이지 입니다.";
		include './view/98.message.php';
	}
	else {
		if ($page_type == "m") {
			include './view/01.main.php';
		} 
		else if ($page_type == "s") {
			include './view/02.mad.php';
		}
		else {
			include './view/99.empty.php';
		}
	}

	// 로그인/멤버 레이어 추가.
	include "./common/common.pop.php";

	// 디버깅 정보 출력
	if ($site_isDebug) {
		// include "./common/common.debug.php";
	}
?>
</body>
</html>