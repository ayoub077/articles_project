<?php 

session_start();

define("SITE_STATUS", true);

if(SITE_STATUS == true){

	if(isset($_SESSION["username"])){
		$path_css = "layout/css/style.css";
		include "config.php";
		include "includes/header.php";
		include "includes/navbar.php";

		$stmt = $con->prepare("SELECT * from posts");
	    $stmt->execute();
	    $results = $stmt->fetchAll();
	    $count = $stmt->rowCount();

	    // echo "userid is: " . $_SESSION['userid'];
	    // echo $count;

	    if($count){
	        // echo "success";

	        foreach($results as $result){echo $result["title"] . "<br>" . $result['content'] ;}
	    }
		?>

		<?php 

		echo "<a href='logout.php'>logout</a>";
	}else{
		header("location: sign-in.php");
	}

} else{echo "site closed for maintenance!";}