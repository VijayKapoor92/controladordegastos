<?php

function conectar(){
	$db_hostname = "127.0.0.1";
	$db_username = "root";
	$db_password = "root";
	$db_database = "ControladorDeGastos";

	$conn = mysqli_connect($db_hostname,$db_username,$db_password);
	if(!$conn){
		die("Connection failed: " . mysql_error());
	}
	mysqli_select_db($conn,$db_database);


	return $conn;

}


?>