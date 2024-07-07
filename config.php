<?php 

$dsn = "mysql:host=localhost;dbname=articles1";
$user = "root";
$pass = "";

try{
	$con = new PDO($dsn, $user, $pass);

	// echo "successful connect!";
}

catch(PDOException $e){
	echo "Error " . $e->getMessage();
}