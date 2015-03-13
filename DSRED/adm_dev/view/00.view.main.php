<?php
	@include 'common/header.php'; 
?>
<body>
	<nav class="accessibility">
		<ul><li><a href="#contents">본문 바로가기</a></li></ul>
	</nav>
<?php
	if ($page_auth == true && $site_isLogin == false) {
		// 로그인이 필요한 페이지.
		$site_message = "로그인이 필요한 페이지 입니다.";
		@include '98.message.php';
	}
	else {
		if ($page_type == "m") {
			@include '01.main.php';
		} 
		else if ($page_type == "s") {
			@include '02.mad.php';
		}
		else {
			@include '99.empty.php';
		}
	}

	// 로그인/멤버 레이어 추가.
	//include "common.pop.php";
?>
</body>
</html>