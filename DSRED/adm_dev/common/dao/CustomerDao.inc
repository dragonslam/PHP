<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Customer DAO.
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
 * Customer Dao
 * 
 * 
 * @author DragonSLAM
 *
 */
class CustomerDao {	
	private $dao;
	function __construct($datasource)
	{			
		$this->dao = new DataAccessComponentBase($datasource, "TBL_CUSTOMER", array(
				"CUS_SEQ" 		=> array("isKey"=>true, "datatype"=>"int"),
				"CUS_TP_CD"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"CUS_NM" 		=> array("isEncrypt"=>false, "datatype"=>"string"),
				"CUS_Email" 	=> array("isEncrypt"=>true , "datatype"=>"string"),				
				"CUS_Tel"		=> array("isEncrypt"=>true , "datatype"=>"string"),
				"CUS_Mobile"	=> array("isEncrypt"=>true , "datatype"=>"string"),
				"CUS_ZIP_CD"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"CUS_ADDR1"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"CUS_ADDR2"	=> array("isEncrypt"=>false, "datatype"=>"string"),
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