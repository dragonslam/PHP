<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Login DAO.
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
 * Login Log Dao
 * 
 * @author DragonSLAM
 *
 */
class LoginLogDao {
	private $dao;
	function __construct($datasource)
	{
		$this->dao = new DataAccessComponentBase($datasource, "LOG_LOGIN", array(
				"USER_ID" 				=> array("isEncrypt"=>false, "datatype"=>"string", "value"=>""),
				"USER_SESSION_ID"	=> array("isEncrypt"=>false, "datatype"=>"string", "value"=>""),
				"LOGIN_IP" 				=> array("isEncrypt"=>false, "datatype"=>"string", "value"=>""),
				"LOGIN_DT" 			=> array("isEncrypt"=>false, "datatype"=>"datetime", "value"=>""),
				"LOGOUT_DT"			=> array("isEncrypt"=>false, "datatype"=>"datetime", "value"=>"")
		));
	}

	public function save($param = null, $condition = null) {
		return $this->dao->save($param, $condition);
	}
}
?>