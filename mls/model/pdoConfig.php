<?php

class pdoConfig extends PDO {

	private $engine;
	public $host;
	public $database;
	public $user;
	public $pass;

	private static $_conn = null;

	/**
	 * pdoConfig constructor.
	 */
	public function __construct(){

		// DB CONFIG
		if (constant("DEV_NAME") != "prod" ) {
			$dbhost = 'lasvegasluxerealty.com';
			$dbuser = 'admin_lvluxe';
			$dbpass = 'CQTXTvwB6O';
			$dbname = 'admin_lvluxe';
		} else {
			$dbhost = 'localhost';
			$dbuser = 'admin_lvluxe';
			$dbpass = 'CQTXTvwB6O';
			$dbname = 'admin_lvluxe';
		}

		$this->engine = 'mysql';
		$this->host = $dbhost;
		$this->database = $dbname;
		$this->user = $dbuser;
		$this->pass = $dbpass;
		$dsn = $this->engine.':dbname='.$this->database.";host=".$this->host;

		if(!self::$_conn) { // If no instance then make one

			// self::$_conn = parent::__construct( $dsn, $this->user, $this->pass );
			self::$_conn = new parent( $dsn, $this->user, $this->pass, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION) );
			self::$_conn ->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

		}

	}

	public function prepare($stm, $opt=array() ) {

		if(self::$_conn) { 
			return self::$_conn->prepare($stm,$opt);
		} else {
			self::$_conn = new parent( $dsn, $this->user, $this->pass );
			return self::$_conn->prepare($stm,$opt); 
		}
	}

	private function __clone() { }

	public function quote($inStg, $inParam = NULL) {
		return self::$_conn->quote($inStg, $inParam);        
	}

}