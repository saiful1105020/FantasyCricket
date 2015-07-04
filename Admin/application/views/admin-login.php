<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">


    <title>Admin Login</title>
    
    
    
    
    <style>
		@import url(http://fonts.googleapis.com/css?family=Exo:100,200,400);
		@import url(http://fonts.googleapis.com/css?family=Source+Sans+Pro:700,400,300);

		body{
			margin: 0;
			padding: 0;
			background: #fff;

			color: #fff;
			font-family: Arial;
			font-size: 12px;
		}

		.body{
			position: absolute;
			top: -20px;
			left: -20px;
			right: -40px;
			bottom: -40px;
			width: auto;
			height: auto;
			background-image: url(<?php echo base_url('images/back2.jpg'); ?>);
			/*background-image: url(http;//i62.tinypic.com/nmj4p0.jpg);*/
			background-size: cover;
			-webkit-filter: blur(5px);
			z-index: 0;
		}

		.grad{
			position: absolute;
			top: -20px;
			left: -20px;
			right: -40px;
			bottom: -40px;
			width: auto;
			height: auto;
			background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
			z-index: 1;
			opacity: 0.7;
		}

		.header1{
			position: absolute;
			top: calc(50% - 55px);
			left: calc(50% - 280px);
			z-index: 2;
		}
		.header2{
			position: absolute;
			top: calc(50% - 155px);
			left: calc(50% - 250px);
			z-index: 2;
		}

		.header{
			position: absolute;
			top: calc(50% - 35px);
			left: calc(50% - 280px);
			z-index: 2;
		}

		.header div{
			float: left;
			color: #fff;
			font-family: 'Exo', sans-serif;
			font-size: 35px;
			font-weight: 200;
		}

		.header div span{
			color: #5379fa !important;
		}

		.login{
			position: absolute;
			top: calc(50% - 75px);
			left: calc(50% - 50px);
			height: 150px;
			width: 350px;
			padding: 10px;
			z-index: 2;
		}

		.login input[type=text]{
			width: 250px;
			height: 30px;
			background: transparent;
			border: 1px solid rgba(255,255,255,0.6);
			border-radius: 2px;
			color: #fff;
			font-family: 'Exo', sans-serif;
			font-size: 16px;
			font-weight: 400;
			padding: 4px;
		}

		.login input[type=password]{
			width: 250px;
			height: 30px;
			background: transparent;
			border: 1px solid rgba(255,255,255,0.6);
			border-radius: 2px;
			color: #fff;
			font-family: 'Exo', sans-serif;
			font-size: 16px;
			font-weight: 400;
			padding: 4px;
			margin-top: 10px;
		}

		.login input[type=button]{
			width: 260px;
			height: 35px;
			background: #fff;
			border: 1px solid #fff;
			cursor: pointer;
			border-radius: 2px;
			color: #a18d6c;
			font-family: 'Exo', sans-serif;
			font-size: 16px;
			font-weight: 400;
			padding: 6px;
			margin-top: 10px;
		}

		.login input[type=button]:hover{
			opacity: 0.8;
		}

		.login input[type=button]:active{
			opacity: 0.6;
		}

		.login input[type=text]:focus{
			outline: none;
			border: 1px solid rgba(255,255,255,0.9);
		}

		.login input[type=password]:focus{
			outline: none;
			border: 1px solid rgba(255,255,255,0.9);
		}

		.login input[type=button]:focus{
			outline: none;
		}

		::-webkit-input-placeholder{
		   color: rgba(255,255,255,0.6);
		}

		::-moz-input-placeholder{
		   color: rgba(255,255,255,0.6);
		}
    </style>


    
</head>

<body>

    <div class="body"></div>
    <div class="header1">Admin</div>
	<div class="grad"></div>
	<div class="header">
		<div>Fantasy<span>Cricket</span></div>
	</div>
		
	<br>
	
	<!--
	<form name = "loginForm" method = "post" action="<?php echo site_url('home/login'); ?>" class="navbar-form navbar-left" role="search">
		
		<div class="form-group" class="login">
			<input type="text" name ="admin_id" class="form-control" placeholder="Admin ID:" required>
		</div>
		
		<div class="form-group" class="login">
			<input type="password" name ="password" class="form-control" placeholder="Password:" required>
		</div>
		
		<button type="submit" class="btn btn-default" class="login">Sign-In</button>
	
	</form>
	-->
	
	<form name = "loginForm" method = "post" action="<?php echo site_url('home/login'); ?>" class="navbar-form navbar-left" role="search">
	
		<div class="login">
			<input type="text" placeholder="username" name ="admin_id"><br>
			<input type="password" placeholder="password" name="password"><br>
			<button type="submit" class="btn btn-default">Sign-In</button>
		</div>
		
	</form>
	
	<?php
		if($login_error==true)
		{
			echo '<div class="header2" style="color:red" ><h1><strong> Login Failed! Username and password didn\'t match </strong></h1></div>';
			//echo '<div class="header2">Login Failed</div>';
		}
	?>
	
	<script src="<?php echo base_url("assets/js/prefixfree.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

</body>

</html>
