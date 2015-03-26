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
				"USER_SEQ" 	=> array("isKey"=>true, "datatype"=>"int"),
				"USER_ID" 		=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_PW" 		=> array("isEncrypt"=>true , "datatype"=>"string"),
				"USER_NM" 		=> array("isEncrypt"=>false, "datatype"=>"string"),				
				"USER_LV_CD"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_TP_CD"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_Email"	=> array("isEncrypt"=>true , "datatype"=>"string"),
				"USER_Tel"		=> array("isEncrypt"=>true , "datatype"=>"string"),
				"USER_Mobile"	=> array("isEncrypt"=>true , "datatype"=>"string"),
				"CREATE_ID"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"UPDATE_ID"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"CREATE_DT"	=> array("isEncrypt"=>false, "datatype"=>"datetime"),
				"UPDATE_DT"	=> array("isEncrypt"=>false, "datatype"=>"datetime"),
				"LOGIN_DT"		=> array("isEncrypt"=>false, "datatype"=>"datetime"),				
				"LOGIN_IP"		=> array("isEncrypt"=>false, "datatype"=>"string"),
				"LOGIN_CNT"	=> array("isEncrypt"=>false, "datatype"=>"int")
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
		return $this->dao->getSearch(10, 1, $condition);
	}
	public function save($param = null, $condition = null) {
		return $this->dao->save($param, $condition);
	}
	public function delete($seq = 0) {
		return $this->dao->delete($seq);
	}	
}
?>