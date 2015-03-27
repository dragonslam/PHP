<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Member DAO.
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php 
/**
 * Member Dao
 * 
 * 
 * @author DragonSLAM
 *
 */
class MemberDao extends DataAccessComponentBase  {	
	
	function __construct($datasource)
	{			
		parent::__construct($datasource, "TBL_MEMBER", array(
				"USER_SEQ" 	=> array("isKey"=>true, "datatype"=>"int"),
				"USER_ID" 		=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_PW" 		=> array("isEncrypt"=>true , "datatype"=>"string"),
				"USER_NM" 		=> array("isEncrypt"=>false, "datatype"=>"string"),				
				"USER_LV_CD"	=> array("isEncrypt"=>false, "datatype"=>"string", 
						"expiration"=>array(
								"type"		=> "SubQuery",
								"table"		=> "TBL_COMMON_CODE T", 
								"column"		=> "T.CODE_NAME", 
								"alias"			=> "USER_LV_NM", 
								"condition"	=> "T.CODE_GROUP = 'MEMBER_GROUP' AND T.CODE_ID = A.USER_LV_CD"							
						)
				),
				"USER_TP_CD"	=> array("isEncrypt"=>false, "datatype"=>"string", 
						"expiration"=>array(
								"type"		=> "SubQuery",
								"table"		=> "TBL_COMMON_CODE T", 
								"column"		=> "T.CODE_NAME", 
								"alias"			=> "USER_TP_NM", 
								"condition"	=> "T.CODE_GROUP = 'MEMBER_TYPE' AND T.CODE_ID = A.USER_TP_CD"								
						)
				),
				"USER_Email"	=> array("isEncrypt"=>true , "datatype"=>"string"),
				"USER_Tel"		=> array("isEncrypt"=>true , "datatype"=>"string"),
				"USER_Mobile"	=> array("isEncrypt"=>true , "datatype"=>"string"),
				"CREATE_ID"	=> array("isEncrypt"=>false, "datatype"=>"string", 
						"expiration"=>array(
								"type"		=> "SubQuery",
								"table"		=> "TBL_MEMBER T", 
								"column"		=> "T.USER_NM", 
								"alias"			=> "CREATE_NM", 
								"condition"	=> "T.CREATE_ID = A.USER_ID"								
						)
				),
				"UPDATE_ID"	=> array("isEncrypt"=>false, "datatype"=>"string", 
						"expiration"=>array(
								"type"		=> "SubQuery",
								"table"		=> "TBL_MEMBER T", 
								"column"		=> "T.USER_NM", 
								"alias"			=> "UPDATE_NM", 
								"condition"	=> "T.UPDATE_ID = A.USER_ID"								
						)
				),
				"CREATE_DT"	=> array("isEncrypt"=>false, "datatype"=>"datetime", "expiration"=>"%Y-%m-%d"),
				"UPDATE_DT"	=> array("isEncrypt"=>false, "datatype"=>"datetime", "expiration"=>"%Y-%m-%d"),
				"LOGIN_DT"		=> array("isEncrypt"=>false, "datatype"=>"datetime"),				
				"LOGIN_IP"		=> array("isEncrypt"=>false, "datatype"=>"string"),
				"LOGIN_CNT"	=> array("isEncrypt"=>false, "datatype"=>"int")
		));		
	}
	
	public function getMember($user_id) {
		parent::logging("getMember($user_id)");
		$condition = array(
				"USER_ID" => $user_id
		);
		return parent::getSearch(1, 1, $condition);
	}
}
?>