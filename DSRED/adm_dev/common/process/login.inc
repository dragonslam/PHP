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
	
	@require "LoginLogDao.inc";
	@require "MemberDao.inc";
	
	$loginDao = new LoginLogDao($site_datasource);
	$memberDao = new MemberDao($site_datasource);			
	
	if ($processCmd == "login") {
		
		$processStatus	= 1;		
		$Login_User_ID	= get_post("Login_User_ID");
		$Login_User_PW	= get_post("Login_User_PW");
		
		if ($Login_User_ID != "" && $Login_User_ID != "") {
			
			//~ Check member
			//$result = $memberDao->getMember($Login_User_ID);

			$_SESSION['isLogin']			= true;
			$_SESSION['usr_id']			= $Login_User_ID;
			$_SESSION['usr_name']		= "이승용";
			$_SESSION['user_mail']		= "dragonslam@gmail.com";
			$_SESSION['user_group']	= 1;
			$_SESSION['user_type']		= 1;	// 0: guest, 1: member, 2: admin
			
			//~ Logging..
			$memberDao->save(array(
				"LOGIN_DT"		=> "NOW",
				"LOGIN_IP"		=> $_SERVER['REMOTE_ADDR'],
				"LOGIN_CNT"	=> "ADD"
			), 
			array(
				"USER_ID"		=> $Login_User_ID
			));
			$loginDao->save(array(
					"USER_ID"				=> $Login_User_ID,
					"USER_SESSION_ID"	=> $_COOKIE['PHPSESSID'],
					"LOGIN_IP"				=> $_SERVER['REMOTE_ADDR'],
					"LOGIN_DT"				=> "NOW"
			));
			
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
						
		//~ Logging..
		$loginDao->save(array(
				"LOGOUT_DT"			=> "NOW"
		), array(
				"USER_ID"				=> $site_UID,
				"USER_SESSION_ID"	=> $_COOKIE['PHPSESSID'],
				"LOGOUT_DT"			=> "NULL"
		));
		
		// remove all session variables				
		session_unset();
		
		// destroy the sessiona		
		session_destroy();
		
		$processStatus	= 2;
		$processMessage	= "로그아웃 하였습니다.";
	}
}
?>