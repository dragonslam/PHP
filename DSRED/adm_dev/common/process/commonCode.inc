<?php
//
//	Project Title	: Daesung Groupware
//	Developer		: dragonslam@gmail.com
//	Create date		: 2015-03-10
//	Description		: Common-Code Process.
//
//	Edit history
// 
// ========================================================
//	Date     Editer     Description
// ------------------------------------------------------------------------
//'
?>
<?php 
if ($site_isDebug) print "<br/>CommonCode Process - ". $processApp ."/". $processCmd;

$codeDac = null;
if ($processApp == "member") {

	$codeDac = new CommonCodeDac($site_datasource, $_POST);
	switch($processCmd) {
		case "getList" :			
			break;
		case "getData" : 
			break;
		case "setData" :
			break;
		case "delData" :
			break;
	}
}

class CommonCodeDac {
	
	private $param;
	private $datasource;
	
	function __construct($datasource, $params)
	{
		if (empty($datasource)) {
			return;
		}
		
		$this->param = $params;
		$this->datasource = $datasource; 
	}
	
	function dac_get() {
		return "";
	}
	
	function dac_getList() {
		return "";
	}
	
	function dac_set() {
		return "1";
	}
	
	function dac_del() {
		return "1";
	}
}
?>