<?php 

include "../../config.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){

		$username = $_POST["username"];
		$password = $_POST["password"];
		$hashedpass = sha1($password);

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

			if($count){
				$_SESSION["userid"] = $get["userid"];
				$_SESSION["username"] = $username;
				header("location: index.php"); exit();
			}else{
				echo "this user not exist!";
			}
		}

	}