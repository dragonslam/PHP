<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Member Process.
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php 
if ($processApp == "process_member") {

	@require "MemberDao.inc";	
	@require "LoginLogDao.inc";	
	$memberDao = new MemberDao($site_datasource);	
	$loginLogDao = new LoginLogDao($site_datasource);	
	
	$processStatus = 1;
	switch($processCmd) {
		case "getList" :
			$result = $memberDao->getList(1, 100);			
			if (!empty($result) && mysql_num_rows($result) > 0) {
				echo($memberDao->toJSON($result));
			}
			break;
		case "getData" : 
			if (!empty($processSeq) && is_string($processSeq)) {
				$result = $memberDao->getMember($processSeq);
				if (!empty($result) && mysql_num_rows($result) > 0) {
					echo($memberDao->toJSON($result));
				}
			}			
			break;
		case "setData" :
			if (!empty($processSeq) && is_string($processSeq)) {
				$result = $memberDao->save(array(
					"USER_PW" 	=> get_post("USER_PW"),
					"USER_NM" 	=> get_post("USER_NM"),
					"USER_LV_CD"	=> get_post("USER_LV_CD"),
					"USER_TP_CD"	=> get_post("USER_TP_CD"),
					"USER_Email"	=> get_post("USER_Email"),
					"USER_Tel"	=> get_post("USER_Tel"),
					"USER_Mobile"	=> get_post("USER_Mobile"),
					"UPDATE_ID"	=> $site_UID,
					"UPDATE_DT"	=> "NOW"
				)
				, array(
					"USER_ID" 	=> get_post("USER_ID")
				));
			}
			else {				
				$result = $memberDao->save(array(
					"USER_ID" 	=> get_post("USER_ID"),
					"USER_PW" 	=> get_post("USER_PW"),
					"USER_NM" 	=> get_post("USER_NM"),
					"USER_LV_CD"	=> get_post("USER_LV_CD"),
					"USER_TP_CD"	=> get_post("USER_TP_CD"),
					"USER_Email"	=> get_post("USER_Email"),
					"USER_Tel"	=> get_post("USER_Tel"),
					"USER_Mobile"	=> get_post("USER_Mobile"),
					"CREATE_ID"	=> $site_UID,
					"CREATE_DT"	=> "NOW"
				));
			}			
			$processMessage = "등록하였습니다.";
			$processStatus = 2;
			break;
		case "delData" :
			$processMessage = "삭제하였습니다.";
			$processStatus = 2;
			break;

		case "getLoginLog" :
			$result = "";
			if (empty($processSeq)) {
				$result = $loginLogDao->getList(1, 100, null, array("LOGIN_DT"=>"desc"));
			}
			else {
				$result = $loginLogDao->getSearch(1, 100, array("USER_ID" => $processSeq), array("LOGIN_DT"=>"desc"));
			}			
			if (!empty($result) && mysql_num_rows($result) > 0) {				
				echo($loginLogDao->toJSON($result));
			}			
			break;
	}
	
	if ($processStatus != 2) exit();
}
?>