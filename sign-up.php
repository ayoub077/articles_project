<?php 

session_start();

define("SITE_STATUS", true);

if(SITE_STATUS == true){

	if(isset($_SESSION["username"])){
		header("location: index.php"); exit();
	}

?>

	<div>

		
		<div id="show_sign_up"></div>
		<div>
			<label>username</label>
			<input type="text" id="username">
		</div>

		<div>
			<label>email</label>
			<input type="text" id="email">
		</div>

		<div>
			<label>password</label>
			<input type="password" id="password">
		</div>
            
        <div>
			<label>re-password</label>
			<input type="password" id="re_password">
		</div>

		<div><a href="sign-in.php">you have an account?</a></div>

		<div>
			<input type="submit" id="sign_up_btn">
		</div>

		

	</div>

<?php 

	include "includes/footer.php";
	
} else{echo "site closed for maintenance!";}

?>