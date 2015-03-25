<?php
/**
 * 
 * 
 * @author Dragonslam
 *
 */
interface DataAccessComponentInterface {
	public function getList();
	public function getData();
	public function save();
	public function delete();
}

/**
 * 
 * 
 * 
 * @author Dragonslam
 *
 */
abstract  class DataAccessComponentBase implements DataAccessComponentInterface {	
			
	protected $connect;
	protected $database;
	protected $query;
	protected $entity;
	
	public function __construct($datasource)
	{
		if (empty($datasource)) {
			return;
		}
		
		$this->connect = mysql_connect($datasource["host"], $datasource["user"], $datasource["password"]);
		$this->database = mysql_select_db($datasource["db"]);
	}	
	
	protected function getQuery_AES_ENC($name = "") {
		if (empty($name)) {
			return "";
		}	
		
		return "HEX(AES_ENCRYPT(".$name.", '".$site_datasource["aes_key"]."')) AS ".$name;
	}
	protected function getQuery_AES_DEC($name = "") {
		if (empty($name)) {
			return "";
		}
	
		return "AES_DECRYPT(UNHEX(".$name."), '".$site_datasource["aes_key"]."') AS ".$name;
	}
	
	protected function execute() {
		if (!empty($this->query))
			return mysql_query($this->query, $this->connect) or die(mysql_error());
	}
	
	public function getList() {
		
	}
	public function getData($seq = 0) {
		if (empty($seq) || $seq == 0) {
			return "-1";
		}
	}
	public function save($seq = 0, $param = null) {
		if (empty($param)) {
			return "-1";
		}
	}
	public function delete($seq = 0) {
		if (empty($seq) || $seq == 0) {
			return "-1";
		}
	}
}
?>