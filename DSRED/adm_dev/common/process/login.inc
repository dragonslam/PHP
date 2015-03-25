<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Login Process.
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php 
// 로그인 관련 명령어를 처리 한다. 

if ($processApp == "process_login") {
	
	require "LoginLogDao.inc";
	require "MemberDao.inc";
	
	$loginDao = new LoginLogDao($site_datasource);
	$memberDao = new MemberDao($site_datasource);			
	
	if ($processCmd == "login") {
		
		$processStatus	= 1;
		
		$Login_User_ID	= get_post("Login_User_ID");
		$Login_User_PW	= get_post("Login_User_PW");
		
		if ($Login_User_ID != "" && $Login_User_ID != "") {
			
			//~ Check member
			
			$_SESSION['isLogin']			= true;
			$_SESSION['usr_id']			= $Login_User_ID;
			$_SESSION['usr_name']		= "이승용";
			$_SESSION['user_mail']		= "dragonslam@gmail.com";
			$_SESSION['user_group']	= 1;
			$_SESSION['user_type']		= 1;	// 0: guest, 1: member, 2: admin
			
			//~ Logging..  
			
			$processStatus	= 2;
			$processMessage	= "로그인을 완료 했습니다.";
		} 
		else {
			$processStatus	= 2;
			$processMessage	= "로그인 계정 정보를 등록해 주세요.";
		}		
	}
	elseif ($processCmd == "logout") {
		$processStatus	= 1;
						
		// remove all session variables				
		session_unset();
		
		// destroy the sessiona		
		session_destroy();
		
		//~ Logging.. 
		
		$processStatus	= 2;
		$processMessage	= "로그아웃 하였습니다.";
	}
}
?>