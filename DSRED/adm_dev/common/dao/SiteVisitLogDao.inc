<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: SiteVisitLog DAO.
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
 * SiteVisitLog Dao
 * 
 * @author DragonSLAM
 *
 */
class SiteVisitLogDao {
	private $dao;
	function __construct($datasource)
	{
		$this->dao = new DataAccessComponentBase($datasource, "LOG_SITE_VISIT", array(
				"CREATE_DT" 			=> array("isEncrypt"=>false, "datatype"=>"datetime"),
				"REFERER_DOMAIN"	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"REFERER_URL"			=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_LAN" 			=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_IP" 				=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_OS" 				=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_OS_Ver"	 	=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_BR_Type" 		=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_BR_Ver" 		=> array("isEncrypt"=>false, "datatype"=>"string"),
				"USER_AGENT" 		=> array("isEncrypt"=>false, "datatype"=>"string"),				
				"SITE_URL"				=> array("isEncrypt"=>false, "datatype"=>"string")
		));
	}

	public function getList() {
		return $this->dao->getList();
	}
	public function save($param = null, $condition = null) {
		return $this->dao->save($param, $condition);
	}
}
?>