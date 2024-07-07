<?php 

session_start();

define("SITE_STATUS", true);

if(SITE_STATUS == true){

	if(isset($_SESSION["username"])){
		$path_css = "layout/css/style.css";
		include "includes/header.php";
		include "includes/navbar.php";
		?>

		<?php 

		echo "<a href='logout.php'>logout</a>";
	}else{
		header("location: sign-in.php");
	}

} else{echo "site closed for maintenance!";}