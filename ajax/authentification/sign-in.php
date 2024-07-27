<?php 

session_start();

include "../../config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

		$username 	= filter_var($_POST["username"], FILTER_SANITIZE_STRING);
		$password 	= filter_var($_POST["password"], FILTER_SANITIZE_STRING);
		
		$hashedpass = sha1($password);

		$formerrors = array();

		if(empty($username)){$formerrors[] = "username can't be empty";}
		if(empty($password)){$formerrors[] = "please enter password";}

		if(!empty($formerrors)){
			foreach($formerrors as $error){
				echo "<p class='error'>", $error, "</p>", exit();
			}
		}
		else{

			$stmt = $con->prepare("SELECT userid, username, password from users where username = ? and     		password = ?");
			$stmt->execute(array($username, $hashedpass));
			$get = $stmt->fetch();
			$count = $stmt->rowCount();

			if($count){
				$_SESSION["userid"] = $get["userid"];
				$_SESSION["username"] = $username;

				echo $count;

				// header("location: index.php"); exit();
			}else{
				echo "<p class='error'>username or password incorrect!<p>";
			}

		}

	}