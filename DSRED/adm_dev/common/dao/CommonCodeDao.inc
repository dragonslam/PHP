<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: CommonCode DAO.
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
 * CommonCode Dao
 * 
 * 
 * @author DragonSLAM
 *
 */
class CommonCodeDao {	
	private $dao;
	function __construct($datasource)
	{			
		$this->dao = new DataAccessComponentBase($datasource, "TBL_COMMON_CODE", array(
				"CODE_SEQ" 	=> array("isKey"=>true, "datatype"=>"int"),
				"CODE_GROUP"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"CODE_ID" 		=> array("isEncrypt"=>false , "datatype"=>"string"),
				"CODE_NAME" 	=> array("isEncrypt"=>false, "datatype"=>"string"),				
				"CODE_VALUE"	=> array("isEncrypt"=>false, "datatype"=>"string"),
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