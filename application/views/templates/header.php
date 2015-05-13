<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy Cricket</title>
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>" />
</head>
<body>
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
        <li><a href="<?php echo site_url('home'); ?>">HOME<span class="sr-only">(current)</span></a></li>
        <li><a href="<?php echo site_url('home/schedules'); ?>">Schedules</a></li>
        <li><a href="<?php echo site_url('home/results'); ?>">Results</a></li>
        <li><a href="<?php echo site_url('home/pointTable'); ?>">Points Table</a></li>
        <li class="dropdown">
          <a href="<?php echo site_url('home/rules'); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rules & Scoring <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="<?php echo site_url('home/howToPlay'); ?>">How to play</a></li>
            <li><a href="<?php echo site_url('home/rules'); ?>">Rules</a></li>
            <li><a href="<?php echo site_url('home/scoring'); ?>">Scoring</a></li>
          </ul>
        </li>
      </ul>
      <form name = "loginForm" method = "post" action="<?php echo site_url('home/login'); ?>" class="navbar-form navbar-left" role="search">
        <div class="form-group">
		
          <input type="email" name ="email" class="form-control" placeholder="E-mail" required>
        </div>
        <div class="form-group">
          <input type="password" name ="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-default">Sign-In</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('home/register'); ?>">Sign-Up</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
</body>