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
class MemberDao {	
	private $dao;
	function __construct($datasource)
	{			
		$this->dao = new DataAccessComponentBase($datasource, "TBL_MEMBER", array(
				"USER_SEQ" 	=> array("isKey"=>true, "datatype"=>"int", "value"=>0),
				"USER_ID" 		=> array("isEncrypt"=>false, "datatype"=>"string", "value"=>""),
				"USER_PW" 		=> array("isEncrypt"=>true , "datatype"=>"string", "value"=>""),
				"USER_NM" 		=> array("isEncrypt"=>false, "datatype"=>"string", "value"=>""),				
				"USER_LV_CD"	=> array("isEncrypt"=>false, "datatype"=>"string", "value"=>""),
				"USER_TP_CD"	=> array("isEncrypt"=>false, "datatype"=>"string", "value"=>""),
				"USER_Email"	=> array("isEncrypt"=>true , "datatype"=>"string", "value"=>""),
				"USER_Tel"		=> array("isEncrypt"=>true , "datatype"=>"string", "value"=>""),
				"USER_Mobile"	=> array("isEncrypt"=>true , "datatype"=>"string", "value"=>""),
				"LOGIN_CNT"	=> array("isEncrypt"=>false, "datatype"=>"int", "value"=>""),
				"LOGIN_IP"		=> array("isEncrypt"=>false, "datatype"=>"string", "value"=>""),				
				"LOGIN_DT"		=> array("isEncrypt"=>false, "datatype"=>"datetime", "value"=>""),				
				"CREATE_DT"	=> array("isEncrypt"=>false, "datatype"=>"datetime", "value"=>""),				
				"UPDATE_DT"	=> array("isEncrypt"=>false, "datatype"=>"datetime", "value"=>""),
				"CREATE_ID"	=> array("isEncrypt"=>false, "datatype"=>"string", "value"=>""),
				"UPDATE_ID"	=> array("isEncrypt"=>false, "datatype"=>"string", "value"=>"")				
		));		
	}
	
	public function getList() {
		return $this->dao->getList();
	}
	public function getData($seq = 0) {		
		return $this->dao->getData($seq);
	}	
	public function getUser($user_id) {
		$condition = array(
				"USER_ID" => $user_id
		);
		return $this->dao->getSearch($condition);
	}
	public function save($param = null, $condition = null) {
		return $this->dao->save($param, $condition);
	}
	public function delete($seq = 0) {
		return $this->dao->delete($seq);
	}
	
	
	function getData_test($seq = 0) {
		$SQL = "SELECT USER_SEQ, USER_ID, AES_DECRYPT(UNHEX(USER_PW), '".$site_datasource["aes_key"]."') AS USER_PW"
			.", USER_NM, USER_LV_CD, USER_TP_CD "
			.", AES_DECRYPT(UNHEX(USER_Email), '".$datasource["aes_key"]."') AS USER_Email "
			.", AES_DECRYPT(UNHEX(USER_Tel), '".$datasource["aes_key"]."') AS USER_Tel "
			.", AES_DECRYPT(UNHEX(USER_Mobile), '".$datasource["aes_key"]."') AS USER_Mobile "
			.", LOGIN_DT, LOGIN_IP, LOGIN_CNT"
			.", CREATE_DT, CREATE_ID"
			.", UPDATE_DT, UPDATE_ID"
			."FROM `TBL_MEMBER` "
			."WHERE ".(is_numeric($seq) ? "USER_SEQ" : "USER_ID")." = '".$seq."'"
			."LIMIT 1 ";
		return "";
	}
	
}

?>