<?php 

session_start();

define("SITE_STATUS", true);

if(SITE_STATUS == true){
	$path_css = "../../layout/css/style.css";
	include "includes/templates/header.php";

	if(isset($_SESSION["username"])){
		header("location: index.php"); exit();
	}

?>



	<div class="page-sign-up">

		
		<div id="show_sign_up"></div>
		<div class="child-containner">
			<div id="errors" class="errors"></div>
			<div class="form-sign-up">
				<div>
					<label>username</label>
					<input type="text" id="username" placeholder="USERNAME">
				</div>
				<div>
					<label>email</label>
					<input type="Email" id="email" placeholder="EMAIL">
				</div>
				<div>
					<label>password</label>
					<input type="password" id="password" placeholder="PASSWORD">
				</div>
				<div>
					<label>confirm-password</label>
					<input type="password" id="re_password" placeholder="CONFIRM PASSWORD">
				</div>

				<div class="have"><a href="sign-in.php">you have an account?</a></div>

				<div>
					<input type="submit" id="sign_up_btn" value="sign-up">
				</div>
			</div>
		</div>
		

	</div>

<?php 

	include "includes/templates/footer.php";
	
} else{echo "site closed for maintenance!";}

?>