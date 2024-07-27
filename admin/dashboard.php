<?php 

session_start();

define("SITE_STATUS", true);

if(SITE_STATUS == true){
	include "../config.php";
	if(isset($_SESSION["username"])){

		$stmt = $con->prepare("SELECT count(title) from posts");
		$stmt->execute();
		$get = $stmt->fetchColumn();
		$count = $stmt->rowCount(); 

		$stmt1 = $con->prepare("SELECT count(comment) from comments");
		$stmt1->execute();
		$get1 = $stmt1->fetchColumn();
		$count1 = $stmt1->rowCount(); 

		$stmt2 = $con->prepare("SELECT count(userid) from users");
		$stmt2->execute();
		$get2 = $stmt2->fetchColumn();
		$count2 = $stmt2->rowCount(); 

?>
	<h1>welcome user</h1>
	<a href='logout.php'>logout</a>
	<div>
		<p>total articles: <?php echo $get; ?></p>
		<p>total comments: <?php echo $get1; ?> </p>
		<p>total users: <?php echo $get2; ?></p>
		<p>articles waiting approval: </p>
	</div>

	<div>
		<div>latest 5 users</div>
		<div>latest 5 articles</div>
	</div>
	<?php }else{
		header("location: sign-in.php"); die();
	}
}else{echo "site closed for maintenance";}
