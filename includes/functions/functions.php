<?php

function redirecthome($themessage, $url = null, $second = 3 ){

	if($url === null){$url = "index.php";}
		else{
			if(isset($_SERVER["HTTP_REFERER"]) && $_SERVER["HTTP_REFERER"] !== ""){
				$url = $_SERVER["HTTP_REFERER"];
			}else{$url = "index.php";}
		} 
		//else{$url = $_SERVER["HTTP_REFERER"];}

		echo $themessage;  //"<div class='alert alert-danger'> $errormessage</div>";
		
		
		echo "<div class='alert alert-info'> you will be redirected to previous page in $second seconds";

		header("refresh:$second;url=$url"); exit();
	}