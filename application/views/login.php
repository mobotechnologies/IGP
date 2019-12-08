<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V1</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/loginstyle/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginstyle/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginstyle/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginstyle/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginstyle/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginstyle/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginstyle/css/util.css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/loginstyle/css/main.css">
<!--===============================================================================================-->
    <script src="<?php echo base_url(); ?>assets/loginstyle/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/notify/notify.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/notify/notify.js"></script>
</head>
<body>
	
	<div class="limiter">
	  
		<div class="container-login100" style="background-size: cover !important;background-repeat: no-repeat !important;background-image:url('http://localhost/hrmsproduct/assets/loginstyle/images/manufact.jpeg') !important;">
		<div class="wrap-login100" style="padding-top:75px !important;">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="<?php echo base_url(); ?>assets/images/poclains.jpg" alt="IMG" style="width: 397px;margin-top: 65px;border-radius: 11px;">
				</div>

				<form class="login100-form validate-form" method="post" id="loginform" action="<?php echo base_url('Login/Login_Auth'); ?>">
				   <?php 
				       if($this->session->flashdata('feedback'))
					   {
					      ?>
                            <script>
						       $.notify("Username or password incorrect!", "error",{ position:"top center" });
						    </script>
					     <?php
						}
					?>
					<img src="<?php echo base_url(); ?>assets/images/poc.jpg" alt="logo" style="padding-bottom: 16px;padding-left: 20px;"/>
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email"  value="<?php if(isset($_COOKIE['email'])) { echo $_COOKIE['email']; } ?>" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true" style="color:#004085"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" value="<?php if(isset($_COOKIE['password'])) { echo $_COOKIE['password']; } ?>" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true" style="color:#004085"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">
					
						<span class="txt1">
							Forgot
						</span>
						<a data-toggle="modal" data-target="#forgot">
							Username / Password?
						</a>
					</div>

					
				</form>
			</div>
		</div>
	</div>
	 <div class="modal fade" id="forgot" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
             <h4 class="modal-title" style="font-size: 17px;"><img src="<?php echo base_url(); ?>assets/img/icons/forgot.png" alt="home.png" style="width: 43px;margin-right: 9px;"/>Account Recovery</h4>
        </div>
        <div class="modal-body">
	        <form method="post">
			    <div class="form-group"> 
				    <div class="row">
					    <div class="col">
				           <input type="email" class="form-control" name="email" placeholder="Email"/>
						</div>
					</div>
				</div>
			
        </div>
        <div class="modal-footer">
		 <input type="submit"  class="btn btn-success" name="Submit" />
		</form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	

	
<!--===============================================================================================-->	
	<script src="<?php echo base_url(); ?>assets/loginstyle/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/loginstyle/vendor/bootstrap/js/popper.js"></script>
	<script src="<?php echo base_url(); ?>assets/loginstyle/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/loginstyle/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/loginstyle/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
	//   $(".alert").hide(5000);
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url(); ?>assets/loginstyle/js/main.js"></script>

</body>
</html>