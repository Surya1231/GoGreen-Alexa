<?php
session_start();
class Database{
  private $host;
  private $user;
  private $pass;
  private $db;
  public $mysqli;

  public function __construct() {
    $this->db_connect();
  }

  public function db_connect(){

	  $this->host = 'localhost';
    $this->user = 'root';
    $this->pass = '';
    $this->db = 'Gogreen';
    $this->mysqli = new mysqli($this->host, $this->user, $this->pass, $this->db);
    return $this->mysqli;
  }

  public function db_num($sql){
        $result = $this->mysqli->query($sql);
        return $result->num_rows;
  }

  public function runQuery($query) {
		$result = $this->mysqli->query($query);
		while($row=$result->fetch_array(MYSQLI_ASSOC)) {
			$resultset[] = $row;
		}
		if(!empty($resultset))
			return $resultset;
	}

  public function SinglerunQuery($query) {
		$result = $this->mysqli->query($query);
		$row=$result->fetch_array(MYSQLI_ASSOC);
			$resultest = $row;
		if(!empty($resultest))
			return $resultest;
	}

  public function updateQuery($query) {
		$result = $this->mysqli->query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}

  public function insertQuery($query) {
		$result = $this->mysqli->query($query);
		$last_insert_id = $this->mysqli->insert_id;
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $last_insert_id;
		}
	}

  public function deleteQuery($query) {
		$result = $this->mysqli->query($query);
		if (!$result) {
			die('Invalid query: ' . mysql_error());
		} else {
			return $result;
		}
	}

}

@define("_APPLICATION_URL", "http://".$_SERVER['SERVER_NAME'].":8080/alphonic/grow-well/ver2/");
?>
