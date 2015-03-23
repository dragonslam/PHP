<?php 

// 로그인 관련 명령어를 처리 한다. 

if ($processApp == "member") {
	
	if ($processCmd == "login") {
		
		$processStatus	= 1;
		
		
		$processStatus	= 2;
		$processMessage	= "로그인을 완료 했습니다.";
	}
	else if ($processCmd == "logout") {
		$processStatus	= 1;
		
				
		$processStatus	= 2;
		$processMessage	= "로그아웃 하였습니다.";
	}
}
?>