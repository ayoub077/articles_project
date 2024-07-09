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
				else{$("#show").html(data)}

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
			}
		});
	})
})