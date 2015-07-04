<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy Cricket</title>
  
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>" />
    <link href="css/bootstrap-responsive.css" rel="stylesheet" media="screen">
    <link href="css/hosting.css" rel="stylesheet" media="all">
	<link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/image.css"); ?>"/>
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet">
	<link href="<?php echo base_url("assets/css/bootstrap-responsive.css"); ?>" rel="stylesheet" media="screen">
	<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url("assets/css/hosting.css"); ?>" rel="stylesheet" media="all">
	
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

</head>
</head>
<body style="height=800;">
  <!-- navigation bar -->
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Fantasy Cricket</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo site_url('user'); ?>">HOME <span class="sr-only">(current)</span></a></li>
		<li><a href="<?php echo site_url('user/view_points'); ?>">Latest Points </a></li>
        <li><a href="<?php echo site_url('user/schedules'); ?>">Schedules </a></li>
        <li><a href="<?php echo site_url('user/results'); ?>">Results </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rules & Scoring <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">How To Play</a></li>
            <li><a href="#">Rules</a></li>
            <li><a href="#">Scoring</a></li>
          </ul>
        </li>
        <li><a href="#">Change Team </a></li>
        <li><a href="<?php echo site_url('user/topplayers'); ?>">Top Scorers </a></li>
        <li><a href="#">Prizes </a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!--
        <li>
            <a class="navbar-brand" rel="home" href="#" title="Buy Sell Rent Everyting">
                <img style="max-width:100px; margin-top: -7px;" src="download.png">
            </a>
        </li>
    -->
        <li class="dropdown">
          <a  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User Name <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Edit Profile</a></li>
            <li><a href="#">Change Password</a></li>
            <li><a href="<?php echo site_url('user/logout'); ?>">Sign Out</a></li>
          </ul>
        </li>
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>