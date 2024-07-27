<?php 
session_start();

include "../../config.php";

	if($_SERVER["REQUEST_METHOD"] == "POST"){

		$username 		= filter_var($_POST["username"], FILTER_SANITIZE_STRING);
		$email 			= filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
		$password 		= filter_var($_POST["password"], FILTER_SANITIZE_STRING);
        $re_password 	= filter_var($_POST["re_password"], FILTER_SANITIZE_STRING);

		$formerrors = array();
		
		if(empty($username)){$formerrors[] = "username can't be empty";}
		if(empty($email)){$formerrors[] = "please, email enter valid email";}
		if(empty($password)){$formerrors[] = "please enter password";}
        if(empty($re_password)){$formerrors[] = "please re-write password";}

		if(!empty($formerrors)){
			foreach($formerrors as $error){
				echo "<p class='error'>", $error, "</p>", exit();
			} 
		}
		else{
			if(!empty($email)){$formerrors[] = "email not valid";}

			if($password !== $re_password){
				echo "wrong password";
			} else 
				{

					$hashedpass = sha1($password);

					// check user before register

					$stmt1 = $con->prepare("SELECT username from users where username = ?");
					$stmt1->execute(array($username));
					$stmt1->fetch();
					$count1 = $stmt1->rowCount();

					$stmt2 = $con->prepare("SELECT email from users where email = ?");
					$stmt2->execute(array($email));
					$stmt2->fetch();
					$count2 = $stmt2->rowCount();

					if($count1 != 0){
							echo "<p class='error'>this username already exist</p>";
					}

					if($count2 != 0){
						echo "<p class='error'>this email already exist</p>";
					}
						
					if($count1 == 0 && $count2 == 0) {
						
						$stmt = $con->prepare("INSERT into users(username, email, password) values(:zusername, :zemail, :zpassword)");
						$stmt->execute(array(
							"zusername" => $username,
							"zemail" => $email,
							"zpassword" => $hashedpass));
							$count = $stmt->rowCount();

							echo $count;
						} 
					}
				
		} 

	}