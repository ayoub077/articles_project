<?php 

session_start();

define("SITE_STATUS", true);

if(SITE_STATUS == true){

	if(isset($_SESSION["username"])){
		header("location: index.php"); exit();
	}
?>

	<div>
		<div id="show"></div>
		<div>
			<label></label>
			<input type="text" id="username" >
		</div>

		<div>
			<label></label>
			<input type="password" id="password">
		</div>
        <a href="sign-up.php">you don't have an account?</a>
		<div>
			<input type="submit" id="btn">
		</div>

	</div>

<?php 
	
	include "includes/footer.php";

} else{echo "site closed for maintenance!";}

?>