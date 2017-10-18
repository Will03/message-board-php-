<?php
include "my.php";

function connect_mySQL()
{
$link =  mysqli_connect($MYSQL_IP, "root", "root","MessageBoard");


	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}
	else{
		// echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
		// echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL;
		return $link;
	}
}
?>