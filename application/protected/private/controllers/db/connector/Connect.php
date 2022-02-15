<?php
/**
 * 
 */
class Connector
{
	private $con;
	function __construct()
	{}

	function connect()
	{
		require_once dirname(__FILE__).'../constats/Consts.php';

		$this->con = new mysqli(HOST_SERVER, USER_NAME, USER_PASS, DB_NAME);

		if (mysqli_connect_errno()) {
			echo "failed to connect to database ".mysqli_connect_error();
		}

		return $this->con;
	}
}
?>