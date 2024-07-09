<?php 

session_start();

define("SITE_STATUS", true);

if(SITE_STATUS == true){

	if(isset($_SESSION["username"])){
		header("location: index.php"); exit();
	}

	// include "config.php";

	// if($_SERVER["REQUEST_METHOD"] == "POST"){

	// 	$username = $_POST["username"];
	// 	$email = $_POST["email"];
	// 	$password = $_POST["password"];
 //        $re_password = $_POST["re-password"];

	// 	$formerrors = array();

	// 	if(empty($username)){$formerrors[] = "username can't be empty";}
	// 	if(empty($email)){$formerrors[] = "email can't be empty";}
	// 	if(empty($password)){$formerrors[] = "please enter password";}
 //        if(empty($re_password)){$formerrors[] = "please re-write password";}

	// 	if(!empty($formerrors)){
	// 		foreach($formerrors as $error){echo $error . "<br>";}
	// 	}
	// 	else{

	// 		if($password !== $re_password){
	// 			echo "wrong password";
	// 		} else 
	// 			{

	// 				$hashedpass = sha1($password);

	// 				// check user before register into database

	// 				$stmt1 = $con->prepare("SELECT username from users where username = ?");
	// 				$stmt1->execute(array($username));
	// 				$stmt1->fetch();
	// 				$count1 = $stmt1->rowCount();

	// 				$stmt2 = $con->prepare("SELECT email from users where email = ?");
	// 				$stmt2->execute(array($email));
	// 				$stmt2->fetch();
	// 				$count2 = $stmt2->rowCount();

	// 				if($count1 != 0){
	// 						echo "this username already exist";
	// 				}

	// 				if($count2 != 0){
	// 					echo "this email already exist";
	// 				}
						
	// 				if($count1 == 0 && $count2 == 0) {

	// 					$stmt = $con->prepare("INSERT into users(username, email, password) values(:zusername, :zemail, :zpassword)");
	// 					$stmt->execute(array(
	// 						"zusername" => $username,
	// 						"zemail" => $email,
	// 						"zpassword" => $hashedpass));
	// 						$count = $stmt->rowCount();

	// 						if($count){
	// 							header("location: sign-in.php"); exit();
	// 						}
	// 					}
	// 				}
				
	// 	} 

	// }



	?>

	<div>

		<!-- <form action="<?php //echo $_SERVER['PHP_SELF'] ?>" method="POST"> -->

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

		<!-- </form> -->

	</div>

<?php 
	include "includes/footer.php";
} else{echo "site closed for maintenance!";}