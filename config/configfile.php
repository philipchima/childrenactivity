<?php
class Config {

	private $DBHOST = "127.0.0.1";
	private $DBUSER = "root";
	private $DBPASS = "explore";
	private $DBNAME = "activity_learning";

	  //private $host = "127.0.0.1";
        //private $database_name = "activity_learning";
        //private $username = "root";
        //private $password = "explore";

	// Data Sources Network 

	//private $dns = "mysql:host=" .self::DBHOST . ";dbname=" .self::DBNAME . "";
	public $conn = null;

	
	function __construct()
	{
		
		try {

			 $this->conn = new PDO("mysql:host=" . $this->DBHOST . ";dbname=" . $this->DBNAME, $this->DBUSER, $this->DBPASS);
                $this->conn->exec("set names utf8");

			//$this->conn = new PDO("mysql:host=" . $this->DBHOST . ";dbname=" . $this->DBNAME, $this->DBUSER, $this->DBPASS);

			//$this->conn = new PDO($this->dns, self::DBUSER, self::DBPASS);
			//$this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
			// $this->conn->exec("set names utf8");

		}catch(PDOException $e){
			echo "Database could not be connected: " . $e->getMessage();
		}
		return $this->conn;
	}


	public function test_input($data){
		$data = strip_tags($data);
		$data = htmlspecialchars($data);
		$data = stripslashes($data);
		$data = trim($data);

	}

	public function message($content,$status)
	{
		// code...
		return json_encode(['message' => $content, 'error' => $status]);
	}
}






?>