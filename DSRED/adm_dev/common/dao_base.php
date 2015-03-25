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
	public function getSearch();
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
class DataAccessComponentBase implements DataAccessComponentInterface {	
			
	protected $conf;
	protected $connect;
	protected $database;
	protected $table;
	protected $query;
	protected $entity;
	protected $entity_key;
	
	function __construct($datasource, $data_table, $data_entity = null)
	{
		if (empty($datasource) || empty($data_table)) {
			return;
		}
		if (!empty($data_entity)) {
			$this->setEntity($data_entity);
		}
		$this->conf			= $datasource;
		$this->table		= $data_table;
		$this->connect	= mysql_connect($this->conf["host"].":".$this->conf["port"], $this->conf["user"], $this->conf["password"]);

		if (!$this->connect) {
			die('Could not connect: ' . mysql_error());
		}
		$this->database	= mysql_select_db($this->conf["db"]);
		$this->logging("Init()");
	}	
	
	public function logging($msg) {
		if (is_bool($this->conf["print_log"]) && $this->conf["print_log"] == true) {
			echo "<br/>DataAccessComponentBase::".$msg;
		}
	}
	private function execute() {
		$this->logging("execute()");
		if (empty($this->query)) {
			return null;
		}
		else {
			$this->logging($this->query);
			$result = mysql_query($this->query, $this->connect) or die(mysql_error()); 
			$this->query = "";
			return $result;
		}			
	}
	public function executeQuery($query) {
		$this->logging("executeQuery()");
		if (empty($query)) {
			return null;
		}
		else {
			$this->logging($this->query);
			return mysql_query($query, $this->connect) or die(mysql_error());
		}
	}
	
	
	public function setEntity($data_entity) {
		$this->logging("setEntity()");
		if (empty($data_entity)) {
			return;
		}
		$this->entity = $data_entity;
		if (is_array($data_entity)) {
			// Table Sequence를 미리 찾아 놓는다.
			while (list($key, $value) = each($data_entity)) {
				if (is_bool($value["isKey"]) == true && $value["isKey"] == true) {
					$this->entity_key = $key;
				}
			}
		}		
	}
	public function getList($page_size = 10, $page_count = 1) {
		$this->logging("getList($page_size, $page_count)");
		return $this->execute();
	}
	public function getData($seq = 0) {
		$this->logging("getData($seq)");
		if (empty($seq) || $seq == 0) {
			return "-1";
		}
		$this->SelectQueryGenerator(array(
			$this->entity_key => $seq
		));
		return $this->execute();
	}
	public function getSearch($condition = null) {
		$this->logging("getSearch()");
		if (empty($condition)) {
			return "-1";
		}
		$this->SelectQueryGenerator($condition);
		return $this->execute();
	}
	public function save($param = null, $condition = null) {
		$this->logging("save()");
		if (empty($param)) {
			return "-1";
		}
		if (empty($param[$this->entity_key])) {
			$this->InsertQueryGenerator($param);
		}
		else {
			$result = $this->getData($param[$this->entity_key]);
			if (mysql_num_rows($result) > 0) {
				$this->UpdateQueryGenerator($param, $condition);				
			}
			else {
				$this->InsertQueryGenerator($param);
			}			
		}		
		return $this->execute();
	}
	public function delete($condition = null) {
		$this->logging("delete()");
		if (empty($condition)) {
			return "-1";
		}
		$this->DeleteQueryGenerator($condition);
		return $this->execute();
	}


	// Query Generator.. 
	
	private function SelectQueryGenerator($condition = null) {
		$this->logging("SelectQueryGenerator()");
	}

	private function InsertQueryGenerator($param = null) {
		$this->logging("InsertQueryGenerator()");
		if (is_array($this->entity)) {
			$fildsQuery = "";
			$dataQuery = "";
			$count = 0;
			while (list($key, $value) = each($this->entity)) {
				if ($key != $this->entity_key) {
					if (!empty($param[$key])) {
						$fildsQuery	= $fildsQuery.($count == 0 ? "\n  " : "\n ,").$key;
						$dataQuery	= $dataQuery.($count == 0 ? "\n  " : "\n ,").$this->getInsertValue($value, $param[$key]);
						$count++;
					}
				}
			}

			$this->query = "INSERT INTO ".$this->table." (".$fildsQuery."\n) VALUES (".$dataQuery."\n)";
		} 
	}

	private function UpdateQueryGenerator($param, $condition = null) {		
		$this->logging("UpdateQueryGenerator()");
		if (is_array($this->entity)) {
			$query = "";
			$count = 0;
			while (list($key, $value) = each($this->entity)) {
				if ($key != $this->entity_key) {
					if (!empty($param[$key])) {
						$query  = $query.($count == 0 ? "\n  " : "\n ,").$this->getUpdateValue($key, $value, $param[$key]);
						$count++;
					}
				}
			}

			$this->query = "UPDATE ".$this->table." SET ".$query."\n".$this->getCondition($condition);
		} 
	}

	private function DeleteQueryGenerator($condition = null) {
		$this->logging("DeleteQueryGenerator()");
		$this->query = "DELETE ".$this->table.$this->getCondition($condition);
	}
	
	private function getInsertValue($fild_type, $value) {
		$this->logging("getInsertValue()");
		if (empty($fild_type)) {
			die('Not found arguments.');
		}
		$result = "'".$value."'";
		if (is_string($fild_type["datatype"])) 
		{
			switch($fild_type["datatype"]) {
				case "int" : 					
					break;
				case "string" : 
					if (is_string($value)) {
						if (strtoupper($value) == "NULL") {
							$result = "NULL";
						}
						else {
							if (is_bool($fild_type["isEncrypt"]) && $fild_type["isEncrypt"] == true) {
								$result = "HEX(AES_ENCRYPT('".$value."', '".$this->conf["aes_key"]."'))";
							}							
						}
					}
					break;
				case "text" : 
					break;
				case "date" : 
					break;
				case "datetime" : 
					if (is_string($value)) {
						if (strtoupper($value) == "NULL") {
							$result = "NULL";
						}
						elseif (strtoupper($value) == "NOW") {
							$result = "NOW()";
						}						
					}
					break;
			}			
		}
		$result =  " ".$result." ";
		return $result;
	}
	
	private function getUpdateValue($fild, $fild_type, $value) {
		$this->logging("getUpdateValue()");
		if (empty($fild) || empty($fild_type)) {
			die('Not found arguments.');
		}
		$result = $fild." = '".$value."'";
		if (is_string($fild_type["datatype"])) 
		{
			switch($fild_type["datatype"]) {
				case "int" : 
					if (is_string($value)) {
						if (strtoupper($value) == "ADD") {
							$result = $fild." = ".$fild." + 1";
						}
						else {
							$result = $fild." = ".$fild." - 1";
						}
					} 
					break;				
				case "string" : 
					if (is_string($value)) {
						if (strtoupper($value) == "NULL") {
							$result = $fild." = NULL";
						}
						else {
							if (is_bool($fild_type["isEncrypt"]) && $fild_type["isEncrypt"] == true) {
								$result = $fild." = HEX(AES_ENCRYPT('".$value."', '".$this->conf["aes_key"]."'))";
							}							
						}
					}
					break;
				case "text" : 
					break;
				case "date" : 
					break;
				case "datetime" : 
					if (is_string($value)) {
						if (strtoupper($value) == "NULL") {
							$result = $fild." = NULL";
						}
						elseif (strtoupper($value) == "NOW") {
							$result = $fild." = NOW()";
						}						
					}
					break;				
			}			
		}
		return " ".$result." ";
	}
	
	private function getCondition($condition = null) {
		$this->logging("getCondition()");
		if(empty($condition)) {
			die('Not found arguments.');
		}
		$c = 0;
		$q = "";
		if (is_array($condition)) {			
			while (list($key, $value) = each($condition)) {
				$q = $q.(($c == 0) ? "WHERE" : "AND")." $key = '$value' ";
				$c++;
			}
		}
		else {
			$q = "WHERE ".$condition;
		}
		return $q;
	}
	
	private function getAES_ENC($value = "") {
		if (empty($value)) {
			die('Not found arguments.');
		}		
		return "HEX(AES_ENCRYPT('".$value."', '".$site_datasource["aes_key"]."')) ";
	}
	private function getAES_DEC($name = "") {
		if (empty($name)) {
			die('Not found arguments.');
		}	
		return "AES_DECRYPT(UNHEX(".$name."), '".$site_datasource["aes_key"]."') AS ".$name;
	}
}
?>