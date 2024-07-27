<?php 

session_start();

define("SITE_STATUS", true);

if(SITE_STATUS == true){

	if(isset($_SESSION["username"])){
		header("location: index.php"); exit();
	}
	$path_css = "../../layout/css/style.css";
	include "includes/templates/header.php";
?>

	<div class="form-cadre">
		<div id="errors"></div>
		<div class="form-style">
			<div>
				<label>username</label>
				<input type="text" id="username" placeholder="USERNAME">
			</div>

			<div>
				<label>password</label>
				<input type="password" id="password" placeholder="PASSWORD">
			</div>
	        <div class="have"><a href="sign-up.php">you don't have an account?</a></div>
			<div>
				<input type="submit" id="btn" value="sign-in">
			</div>
		</div>

	</div>

<?php 
	
	include "includes/templates/footer.php";

} else{echo "site closed for maintenance!";}

?>