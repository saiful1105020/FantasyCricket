<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy Cricket</title>
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>" />
	
    <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;
      padding: 0%;
      margin: auto;
  }
  </style>
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
        <li class="active"><a href="<?php echo site_url('home'); ?>">HOME<span class="sr-only">(current)</span></a></li>
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
		
          <input type="text" name ="email" class="form-control" placeholder="E-mail">
        </div>
        <div class="form-group">
          <input type="password" name ="password" class="form-control" placeholder="Password">
        </div>
        <button type="submit" class="btn btn-default">Sign-In</button>
      </form>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="<?php echo site_url('home/register'); ?>">Sign-Up</a></li>
        <li><a href="#">Link</a></li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
        <img src="<?php echo base_url('images/b1.png'); ?>" alt="Tigers">
      </div>

      <div class="item">
        <img src="<?php echo base_url('images/b2.png'); ?>" alt="Bangladesh Cricket">
      </div>
    
      <div class="item">
        <img src="<?php echo base_url('images/b3.png'); ?>" alt="The Boss">
      </div>

      <div class="item">
        <img src="<?php echo base_url('images/b4.png'); ?>" alt="Winners!">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

</body>

</html>