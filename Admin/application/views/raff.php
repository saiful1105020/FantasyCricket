<!DOCTYPE html>
<html >

  <head>

    <meta charset="UTF-8">
    <title>Admin Login</title>
	<link rel="stylesheet" href="<?php echo base_url("assets/css/admin_login.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>" />
  </head>

  <body>

  	<div class="body"></div>
    <div class="header1">Admin</div>
    <div class="header2" class="alert alert-danger">
       <span class="glyphicon glyphicon-remove"></span><h1 style="color:red"><strong>Error! Please check all page inputs.</strong></h1>
    </div>

	<div class="grad"></div>
	<div class="header">
		<div>Fantasy<span>Cricket</span></div>
	</div>
		
	<br>
	<form name = "loginForm" method = "post" action="<?php echo site_url('home/login'); ?>">
		<div class="login">
			<input type="text" placeholder="username" name="user"><br>
			<input type="password" placeholder="password" name="password"><br>
			<input type="button" value="Login">
		</div>
	</form>
  
	<script type="text/javascript" src="<?php echo base_url("assets/js/prefixfree.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
	
  </body>
</html>
