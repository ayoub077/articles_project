<?php 

session_start();

define("SITE_STATUS", true);

if(SITE_STATUS == true){

	include "../config.php";

	if(isset($_SESSION["username"])){
		header("location: dashboard.php"); exit();
	}

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$username = $_POST["username"];
		$password = $_POST["password"];
		$hashedpass = sha1($password);

		// echo $username;

		$formerrors = array();

		if(empty($username)){$formerrors[] = "username can't be empty";}
		if(empty($password)){$formerrors[] = "please enter password";}

		if(!empty($formerrors)){
			foreach($formerrors as $error){echo $error . "<br>";}
		}
		else{

			$stmt = $con->prepare("SELECT userid, username, password from users where username = ? and     		password = ?");
			$stmt->execute(array($username, $hashedpass));
			$get = $stmt->fetch();
			$count = $stmt->rowCount(); 

			// echo $count;

			if($count){
				// $_SESSION["userid"] = $get["userid"];
				$_SESSION["username"] = $username;
				header("location: dashboard.php"); die();
			}else{
				echo "this user not exist!";
			}

		}

	}
?>

	<div>
		<div id="show"></div>
		<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="POST">
			<div>
				<label></label>
				<input type="text" name="username" >
			</div>

			<div>
				<label></label>
				<input type="password" name="password">
			</div>
	        <a href="sign-up.php">you don't have an account?</a>
			<div>
				<input type="submit" id="btn">
			</div>
		</form>

	</div>

<?php 
	
	// include "includes/templates/footer.php";

} else{echo "site closed for maintenance!";}

?>