<?php
/**
 * Common Data Access Component Interface
 * 
 * @author Dragonslam
 *
 */
interface DataAccessComponentInterface {
	
	/**
	 * 목록 데이터 조회
	 */
	public function getList();
	
	/**
	 * 1Row 데이터 조회
	 */
	public function getData();
	
	/**
	 * 검색
	 */
	public function getSearch();

	/**
	 * 확인
	 */
	public function isValid();
	
	/**
	 * 저장
	 */
	public function save();
	
	/**
	 * 삭제
	 */
	public function delete();
}

/**
 * 
 * Common Data Access Component
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
	
	/**
	 * DAO 생성자
	 * @param array $datasource
	 * @param string $data_table
	 * @param array $data_entity
	 */
	function __construct($datasource = null, $data_table = "", $data_entity = null)
	{
		if (empty($datasource) || empty($data_table)) {
			return;
		}
		if (!empty($data_entity)) {
			$this->setEntity($data_entity);
		}
		$this->conf			= $datasource;
		$this->table		= $data_table;
		$this->connect	= mysql_connect($this->conf["host"].":".$this->conf["port"], $this->conf["user"], $this->conf["password"])
										or die ('Could not connect to the database server' . mysqli_connect_error());

		if (!$this->connect) {
			die('Could not connect: ' . mysql_error());
		}
		$this->database	= mysql_select_db($this->conf["db"]);
		$this->logging("Init()");
	}	
	
	/**
	 * DAO 소멸자
	 */
	function __destruct() {
		$this->logging("destruct()");
		mysql_close($this->connect);
	}

	/**
	 * 로그 출력
	 * @param string $msg
	 */
	protected function logging($msg = "") {
		if (is_bool($this->conf["print_log"]) && $this->conf["print_log"] == true) {
			print("<br/>DataAccessComponentBase::".$msg."\n");
		}
	}
	
	/**
	 * 쿼리 실행. 
	 * @return NULL|resource
	 */
	protected function execute() {
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
	/**
	 * 등록된 쿼리 실행.
	 * @param unknown $query
	 * @return NULL|boolean
	 */
	protected function executeQuery($query) {
		$this->logging("executeQuery()");
		if (empty($query)) {
			return null;
		}
		else {
			$this->logging($this->query);
			return mysql_query($query, $this->connect) or die(mysql_error());
		}
	}
	
	/**
	 * 테이블 스키마를 등록
	 * @param array $data_entity
	 */
	protected function setEntity($data_entity = null) {
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
	
	/**
	 * 테이블 스키마를 반환
	 * @return array $data_entity
	 */
	protected function getEntity() {
		$this->logging("getEntity()");		
		return $this->entity;		
	}
	
	/**
	 * 목록 조회
	 * @see DataAccessComponentInterface::getList()
	 * @param int $page_size
	 * @param int $page_count 
	 * @param array $sort
	 */
	public function getList($page_size = 10, $page_count = 1, $sort = null) {
		$this->logging("getList($page_size, $page_count)");
		$this->SelectQueryGenerator($page_size, $page_count, $sort);
		return $this->execute();
	}
	
	/**
	 * 고유번호로 데이터 조회
	 * @see DataAccessComponentInterface::getData()
	 * @param int $seq
	 */
	public function getData($seq = 0) {
		$this->logging("getData($seq)");
		if (empty($seq) || $seq == 0) {
			die('Not found arguments.');
		}
		$this->SelectQueryGenerator(1, 1, array(
			$this->entity_key => $seq
		));
		return $this->execute();
	}
	
	/**
	 * 검색 조건으로 데이터 목록 검색
	 * @see DataAccessComponentInterface::getSearch()
	 * @param int $page_size
	 * @param int $page_count 
	 * @param array $condition
 	 * @param array $sort
	 */
	public function getSearch($page_size = 10, $page_count = 1, $condition = null, $sort = null) {
		$this->logging("getSearch($page_size, $page_count)");
		if (empty($condition)) {
			die('Not found arguments.');
		}
		$this->SelectQueryGenerator($page_size, $page_count, $condition, $sort);
		return $this->execute();
	}

	/**
	 * 검색 조건으로 데이터 확인
	 * @see DataAccessComponentInterface::isValid()
	 * @param array $condition
	 */
	public function isValid($condition = null) {
		$this->logging("isValid()");		
		return (mysql_num_rows($this->getSearch(1, 1, $condition)) > 0);
	}
	
	/**
	 * 데이터 저장
	 * <pre>
	 *  - 고유번호 정보가 없는 경우는 INSERT
	 *  - 고유번호로 정보가 있으면 UPDATE
	 * </pre>
	 * @see DataAccessComponentInterface::save()
	 * @param array $param
	 * @param array $condition
	 */
	public function save($param = null, $condition = null) {
		$this->logging("save()");
		if (empty($param)) {
			die('Not found arguments.');
		}
		if (empty($condition)) 
		{	// 조회조건 없으면 무조건 등록
			$this->InsertQueryGenerator($param);
		}
		else {			
			if ($this->isValid($condition)) 
			{	// 조회해서 있으면 수정.
				$this->UpdateQueryGenerator($param, $condition);
			}
		}
		return $this->execute();
	}
	
	/**
	 * 데이터 삭제.
	 * @see DataAccessComponentInterface::delete()
	 * @param array $condition
	 */
	public function delete($condition = null) {
		$this->logging("delete()");
		if (empty($condition)) {
			die('Not found arguments.');
		}
		
		$this->DeleteQueryGenerator($condition);
		return $this->execute();
	}

	/**
	 * MySql result to JSON.
	 * @param MySqlResult $result
	 * @return JSON
	 */
	public function toJSON($result) {
		$this->logging("toJSON()");		
		$rows = array();
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)){
			$rows[] = $row;
		}
		return json_encode($rows);
	}


	// Query Generator.. 
	/**
	 * 검색쿼리 생성
	 * @param int $page_size
	 * @param int $page_count 
	 * @param array $condition
	 * @param array $sort	 
	 */
	private function SelectQueryGenerator($page_size = 10, $page_count = 1, $condition = null, $sort = null) {
		$this->logging("SelectQueryGenerator()");
		if (is_array($this->entity)) {
			$fildsQuery = "";
			$count = 0;
			while (list($key, $value) = each($this->entity)) 
			{
				$q = ($count == 0 ? "\n  " : "\n ,")."A.".$key." AS ".$key;
				if (is_string($value["datatype"])) {
					switch($value["datatype"]) {
						case "int" : 					
							break;
						case "string" :							 
								if (is_bool($value["isEncrypt"]) && $value["isEncrypt"] == true) {
									$q = ($count == 0 ? "\n  " : "\n ,").$this->getAES_DEC($key);
								}
								if (is_array($value["expiration"])) 
								{	// Sub Query 구현.
									$sub = $value["expiration"];
									if ($sub["type"] == "SubQuery") {
										$q = $q."\n ,(SELECT ".$sub["column"]." FROM ".$sub["table"]." WHERE ".$sub["condition"]." LIMIT 1) AS ".$sub["alias"];
									}
								}
							break;
						case "text" : 
							break;
						case "date" : 
							if (is_string($value["expiration"])) {
								$q = ($count == 0 ? "\n  " : "\n ,")."DATE_FORMAT(A.".$key.", '".$value["expiration"]."') AS ".$key;
							}
							else {
								$q = ($count == 0 ? "\n  " : "\n ,")."DATE_FORMAT(A.".$key.", '%Y-%m-%d') AS ".$key;
							}
							break;
							
						case "time" : 
							if (is_string($value["expiration"])) {
								$q = ($count == 0 ? "\n  " : "\n ,")."DATE_FORMAT(A.".$key.", '".$value["expiration"]."') AS ".$key;
							}
							else {
								$q = ($count == 0 ? "\n  " : "\n ,")."DATE_FORMAT(A.".$key.", '%H:%i:%s') AS ".$key;
							}
							break;
						case "timestamp" : 
							if (is_string($value["expiration"])) {
								$q = ($count == 0 ? "\n  " : "\n ,")."DATE_FORMAT(A.".$key.", '".$value["expiration"]."') AS ".$key;
							}
							else {
								$q = ($count == 0 ? "\n  " : "\n ,")."DATE_FORMAT(A.".$key.", '%Y-%m-%d %H:%i') AS ".$key;
							}
							break;
						case "datetime" : 
							if (is_string($value["expiration"])) {
								$q = ($count == 0 ? "\n  " : "\n ,")."DATE_FORMAT(A.".$key.", '".$value["expiration"]."') AS ".$key;
							}
							else {
								$q = ($count == 0 ? "\n  " : "\n ,")."DATE_FORMAT(A.".$key.", '%Y-%m-%d %H:%i:%s') AS ".$key;
							}
							break;							
					}			
				}

				$fildsQuery	= $fildsQuery.$q;
				$count++;
			}
			
			if (empty($condition)) {
				$this->query = "SELECT ".$fildsQuery." \nFROM ".$this->table." A";
			}
			else {
				$this->query = "SELECT ".$fildsQuery." \nFROM ".$this->table." A\n".$this->getCondition($condition);
			}
			if (!empty($sort)) {
				$count = 0;
				$order = "";
				while (list($fild, $order) = each($sort)) 
				{
					$order = ($count == 0 ? "" : " ,")."A.".$key." ".$order;
				}
				$this->query."\nORDER BY ".$order;
			}
			if ($page_size > 0) {
				if ($page_size == 1 && $page_count == 1) {
					$this->query."\nLIMIT 1";
				} 
				else {
					$this->query."\nLIMIT ".(($page_count-1) * $page_size).", ".(($page_count-1) * $page_size + $page_size);
				}				
			}
		} 
	}

	/**
	 * 등록 쿼리 생성
	 * @param array $param
	 */
	private function InsertQueryGenerator($param = null) {
		$this->logging("InsertQueryGenerator()");
		echo(print_r($param));
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

	/**
	 * 수정쿼리 생성
	 * @param array $param
	 * @param array $condition
	 */
	private function UpdateQueryGenerator($param = null, $condition = null) {		
		$this->logging("UpdateQueryGenerator()");		
		if (is_array($this->entity)) {
			$q = "";
			$c = 0;
			/*
			while (list($key, $value) = each($this->entity)) {
				print ("<br/>debug:".$this->entity_key."/".$key."/".$value);
				if ($key != $this->entity_key) {
					if (!empty($param[$key])) {
						$q  = $q.($c == 0 ? "\n  " : "\n ,").$this->getUpdateValue($key, $value, $param[$key]);
						$c++;
					}
				}
			}
			*/
			while (list($pKey, $pValue) = each($param)) {
				print ("<br/>debug:".$this->entity_key."/".$pKey."/".$pValue."<br>");
				if ($pKey != $this->entity_key && !empty($pValue)) {
					$fild_type = $this->entity[$pKey];					
					if (!empty($fild_type)) {
						$q  = $q.($c == 0 ? "\n  " : "\n ,").$this->getUpdateValue($pKey, $fild_type, $pValue);
						$c++;
					}					
				}
			}

			$this->query = "UPDATE ".$this->table." SET ".$q."\n".$this->getCondition($condition);			
		} 
	}

	/**
	 * 삭제 쿼리 생성
	 * @param array $condition
	 */
	private function DeleteQueryGenerator($condition = null) {
		$this->logging("DeleteQueryGenerator()");
		$this->query = "DELETE ".$this->table." ".$this->getCondition($condition);
	}
	
	/**
	 * 등록용 값 쿼리 생성
	 * @param array $fild_type
	 * @param string $value
	 * @return string
	 */
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
	
	/**
	 *  수정용 값 쿼리 생성. 
	 * @param string $fild
	 * @param array $fild_type
	 * @param string $value
	 * @return string
	 */
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
	
	/**
	 * 조건 쿼리 생성
	 * @param array $condition
	 * @return string
	 */
	private function getCondition($condition = null) {
		$this->logging("getCondition()");
		if(empty($condition)) {
			die('Not found arguments.');
		}
		$c = 0;
		$q = "";
		if (is_array($condition)) {			
			while (list($key, $value) = each($condition)) {
				if (strtoupper($value) == "NULL") {
					$q = $q.(($c == 0) ? "WHERE" : "AND")." isNull($key) ";
				}
				else {
					$q = $q.(($c == 0) ? "WHERE" : "AND")." $key = '$value' ";
				}				
				$c++;
			}
		}
		else {
			$q = "WHERE ".$condition;
		}
		return $q;
	}
	
	
	/**
	 * MySql 데이터 암호화 쿼리
	 * @param string $value
	 * @return string
	 */
	private function getAES_ENC($value = "") {
		if (empty($value)) {
			die('Not found arguments.');
		}		
		return "HEX(AES_ENCRYPT('".$value."', '".$this->conf["aes_key"]."')) ";
	}
	
	/**
	 * MySql 데이터 복호화 쿼리
	 * @param string $name
	 * @return string
	 */
	private function getAES_DEC($name = "") {
		if (empty($name)) {
			die('Not found arguments.');
		}	
		return "AES_DECRYPT(UNHEX(A.".$name."), '".$this->conf["aes_key"]."') AS ".$name;
	}
}
?>