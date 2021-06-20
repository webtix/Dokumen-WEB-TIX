<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>WebTix</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="<?php base_url();?>assets/css/login.css">

	<link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Concert+One&display=swap" rel="stylesheet">
</head>
<body>
	<h4>WebTix</h4>
	<form action="<?php echo base_url('login/login_user')?>" class="login-form" method="post">
		<div class="kotak rounded mx-auto d-block">
			<div class="login">
				<h3>Login</h3>
				<p style="color: red"><?php echo $this->session->flashdata('status'); ?></p>
				<input class="form-control input" type="text" name="username" placeholder="Username">
				<input class="form-control input form-password" type="password" name="password" placeholder="Password" id="InputPass">
				<input type="checkbox" class="form-checkbox"> Show Password
				<br>_________________________________________________</br>
				<input type="submit" class="logbtn btn-warning btn" value="Sign In">

				<br>
				<br>
				<!-- <a href="#" class="btn-warning btn" style="margin-top:10px;">Forgot Password</a> -->

				<h5 style="margin-top: 5px;">New to WebTix ? Register Now</h5>
				<a href="<?php echo base_url('register')?>" type="button" class="btn btn-warning" >Register</a>
			</div> 
		</div>
	</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> 
	<script type ='text/javascript' src = "<?php echo base_url();?>/assets/js/script.js"></script> 
	<script type="text/javascript"> 
		$(document).ready(function(){  /**dapat melihat password saat melakukan login (showpassword) */  
			$('.form-checkbox').click(function(){
				if($(this).is(':checked')){
					$('.form-password').attr('type','text');
				}else{
					$('.form-password').attr('type','password');
				}
			});
		});

	</script>
</body>
</html>
