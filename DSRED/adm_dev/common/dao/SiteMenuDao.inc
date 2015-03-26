<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: SiteMenu DAO.
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
 * SiteMenu Dao
 * 
 * 
 * @author DragonSLAM
 *
 */
class SiteMenuDao {	
	private $dao;
	function __construct($datasource)
	{			
		$this->dao = new DataAccessComponentBase($datasource, "TBL_SITE_MENU", array(
				"MENU_SEQ" 	=> array("isKey"=>true, "datatype"=>"int"),
				"MENU_AT_YN"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"MENU_GP_CD"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"MENU_TP_CD"	=> array("isEncrypt"=>false, "datatype"=>"string"),				
				"MENU_NAME"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"MENU_VIEW"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"MENU_PATH"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"CREATE_ID"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"UPDATE_ID"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"CREATE_DT"	=> array("isEncrypt"=>false, "datatype"=>"datetime"),
				"UPDATE_DT"	=> array("isEncrypt"=>false, "datatype"=>"datetime")
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