<?php
class UserVO {
    protected $id;
    protected $username;
    protected $password;
    
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getId() {
        return $this->id;
    }
    
    public function setUsername($username) {
        $this->username = $username;
    }
    
    public function getUsername() {
        return $this->username;
    }
    
    public function setPassword($password) {
        $this->password = $password;
    }
    
    public function getPassword() {
        return $this->password;
    }
}

class UserDAO {
	protected $connect;
	protected $db;

	// Attempts to initialize the database connection using the supplied info.
	public function UserDAO($host, $username, $password, $database) {
		$this->connect = mysql_connect($host, $username, $password);
		$this->db = mysql_select_db($database);
	}

	// Executes the specified query and returns an associative array of reseults.
	protected function execute($sql) {
		$res = mysql_query($sql, $this->connect) or die(mysql_error());

		if(mysql_num_rows($res) > 0) {
			for($i = 0; $i < mysql_num_rows($res); $i++) {
				$row = mysql_fetch_assoc($res);
				$userVO[$i] = new UserVO();

				$userVO[$i]->setId($row[id]);
				$userVO[$i]->setUsername($row[username]);
				$userVO[$i]->setPassword($row[password]);
			}
		}
		return $userVO;
	}

	// Retrieves the corresponding row for the specified user ID.
	public function getByUserId($userId) {
		$sql = "SELECT * FROM users WHERE id=".$userId;
		return $this->execute($sql);
	}

	// Retrieves all users currently in the database.
	public function getUsers() {
		$sql = "SELECT * FROM users";
		return $this->execute($sql);
	}

	//Saves the supplied user to the database.
	public function save($userVO) {
		$affectedRows = 0;

		if($userVO->getId() != "") {
			$currUserVO = $this->getByUserId($userVO->getId());
		}

		// If the query returned a row then update,
		// otherwise insert a new user.
		if(sizeof($currUserVO) > 0) {
			$sql = "UPDATE users SET ".
					"username='".$userVO->getUsername()."', ".
					"password='".$userVO->getPassword()."' ".
					"WHERE id=".$userVO->getId();

			mysql_query($sql, $this->connect) or die(mysql_error());
			$affectedRows = mysql_affected_rows();
		}
		else {
			$sql = "INSERT INTO users (username, password) VALUES('".
					$userVO->getUsername()."', ".
					$userVO->getPassword()."')".

					mysql_query($sql, $this->connect) or die(mysql_error());
			$affectedRows = mysql_affected_rows();
		}

		return $affectedRows;
	}

	// Deletes the supplied user from the database.
	public function delete($userVO) {
		$affectedRows = 0;

		// Check for a user ID.
		if($userVO->getId() != "") {
			$currUserVO = $this->getByUserId($userVO->getId());
		}

		// Otherwise delete a user.
		if(sizeof($currUserVO) > 0) {
			$sql = "DELETE FROM users WHERE id=".$userVO->getId();

			mysql_query($sql, $this->connect) or die(mysql_error());
			$affectedRows = mysql_affected_rows();

			return $affectedRows;
		}
	}
}	
?>