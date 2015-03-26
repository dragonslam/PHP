<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: MemberAuth DAO.
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
 * MemberAuth Dao
 * 
 * 
 * @author DragonSLAM
 *
 */
class MemberAuthDao {	
	private $dao;
	function __construct($datasource)
	{			
		$this->dao = new DataAccessComponentBase($datasource, "TBL_MEMBER_AUTH", array(
				"AUTH_SEQ" 			=> array("isKey"=>true, "datatype"=>"int"),
				"MENU_SEQ" 			=> array("isEncrypt"=>false, "datatype"=>"int"),
				"AUTH_TP_CD"			=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_LV_CD"			=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_ID" 				=> array("isEncrypt"=>false, "datatype"=>"string"),				
				"AUTH_LIST_YN"		=> array("isEncrypt"=>false, "datatype"=>"string"),
				"AUTH_VIEW_YN"		=> array("isEncrypt"=>false, "datatype"=>"string"),
				"AUTH_INSERT_YN"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"AUTH_MODIFY_YN"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"AUTH_DELETE_YN"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"AUTH_PRINT_YN"		=> array("isEncrypt"=>false, "datatype"=>"string"),
				"AUTH_EXPORT_YN"	=> array("isEncrypt"=>false, "datatype"=>"string"),				
				"CREATE_ID"			=> array("isEncrypt"=>false, "datatype"=>"string"),
				"UPDATE_ID"			=> array("isEncrypt"=>false, "datatype"=>"string"),
				"CREATE_DT"			=> array("isEncrypt"=>false, "datatype"=>"datetime"),
				"UPDATE_DT"			=> array("isEncrypt"=>false, "datatype"=>"datetime")
		));		
	}
	
	public function getList() {
		return $this->dao->getList();
	}
	public function getData($seq = 0) {		
		return $this->dao->getData($seq);
	}
	public function save($param = null, $condition = null) {
		return $this->dao->save($param, $condition);
	}
	public function delete($seq = 0) {
		return $this->dao->delete($seq);
	}	
}
?>