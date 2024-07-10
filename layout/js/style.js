// ajax for page sign-in.php

$(document).ready(function(){
	$("#btn").click(function(){
		$.ajax({
			type:"post",
			url:"ajax/authentification/sign-in.php",
			data:{
				username:$("#username").val(),
				password:$("#password").val()
			},
			success:function(data){
				console.log(data);

				if(data != 1){$("#show").html(data)}
				// if(data == 1){$("#show").html(data);}
				if(data == 1){location.href = "index.php";}
			

			}
		});
	});
});

// ajax for page sign-up.php


$(document).ready(function(){
	$("#sign_up_btn").click(function(){
		$.ajax({
			type:"post",
			url:"ajax/authentification/sign-up.php",
			data:{
				username:$("#username").val(),
				email:$("#email").val(),
				password:$("#password").val(),
				re_password:$("#re_password").val()
			},

			success:function(data){
				console.log(data);

				if(data != 1){
					$("#show_sign_up").html(data)
					// $("#show").html(data)
				}else{

					$("#show_sign_up").html("<h1>welcome! you've registred with success</h1>");

					setTimeout(function(){
						"use strict";

						location.href = "sign-in.php";

					}, 4000);
				}
			}
		});
	})
})