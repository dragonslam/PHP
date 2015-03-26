<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: ContentsViewLog DAO.
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
 * ContentsViewLog Dao
 * 
 * @author DragonSLAM
 *
 */
class ContentsViewLogDao {
	private $dao;
	function __construct($datasource)
	{
		$this->dao = new DataAccessComponentBase($datasource, "LOG_CONTENTS_VIEW", array(				
				"MENU_SEQ"	=> array("isEncrypt"=>false, "datatype"=>"int"),
				"CONT_SEQ"	=> array("isEncrypt"=>false, "datatype"=>"int"),
				"USER_ID" 		=> array("isEncrypt"=>false, "datatype"=>"string"),				
				"VIEW_DT" 		=> array("isEncrypt"=>false, "datatype"=>"datetime")				
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