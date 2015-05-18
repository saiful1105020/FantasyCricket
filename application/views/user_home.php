<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy Cricket</title>
	
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>" />
    <link type="text/css" rel="stylesheet" href="<?php echo base_url("assets/css/image.css"); ?>"/>
    <link href="<?php echo base_url("assets/css/bootstrap.css"); ?>" rel="stylesheet">
	<link href="<?php echo base_url("assets/css/bootstrap-responsive.css"); ?>" rel="stylesheet" media="screen">
	<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url("assets/css/hosting.css"); ?>" rel="stylesheet" media="all">
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
        <li class="active"><a href="#">HOME <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Schedules </a></li>
        <li><a href="#">Results </a></li>
        <li><a href="#">Points Table </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Rules & Scoring <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">How To Play</a></li>
            <li><a href="#">Rules</a></li>
            <li><a href="#">Scoring</a></li>
      	  </ul>
      	</li>
      	<li><a href="#">Change Team </a></li>
      	<li><a href="#">Latest Points </a></li>
      	<li><a href="#">Point History </a></li>
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
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">User Name <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Edit Profile</a></li>
            <li><a href="#">Change Password</a></li>
            <li><a href="<?php echo site_url('/user/logout'); ?>">Sign Out</a></li>
      	  </ul>
      	</li>
       </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<!-- NAv ends here -->

<!-- <div class="container" class="col-sm-3">
	<img src="d1.png"/>
</div>

<div class="container">  <!--Contaner Starts -->
<div class="container" class="row-fluid PageHead"> <!-- Description Start -->
    <div class="span12">
      <h1 style="color:#180000">My Team</h1>
      <h3> . . .</h3>
    </div>
  </div> <!-- Description End -->
<div class="row" >
	<div class="col-md-4">
		<a href="#" class="btn btn-primary btn-lg active" role="button" style="float:right">Select Captain </a>
	</div>
	
  <div class="col-md-8" style="float:right">
      <div class="dropdown" >
	  
      <select name="captain" id="captain_select" role="menu" aria-labelledby="dLabel">
        <option value='A'>A</option>
		<option value='A'>B</option>
		<option value='A'>C</option>
		<option value='A'>D</option>
		<option value='A'>E</option>
      </select>
    </div>
  </div>
	<div class="col-md-4">
		<a href="#" class="btn btn-primary btn-lg active" role="button" style="float:right">Change Team </a>
	</div>
</div>
<div class="col-xs-12" class="container-fluid">
   
</div>
  <div class="container-fluid" class="row-fluid">
  <!-- Row2 start -->
  
  
    <div class="span3 PlanPricing template4" style="width:180px">  <!-- Price template4 Starts -->
      <div class="planName"> <span class="price">$700K</span>
        <h4>Taskin Ahmed</h4>
        <p>Bangladesh</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url('images/e1.png'); ?>" height="80" width="80" class="img-circle" alt="Circular Image"></li>
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-toggle="modal" class="btn btn-success btn-large" height="50" width="50">Bowler </a> </p>
    </div>

    <div class="span3 PlanPricing template4" style="width:180px">
      <div class="planName"> <span class="price">$1000K</span>
        <h4>Sakib Al Hasan</h4>
        <p>Bangladesh</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url('images/e5.png'); ?>" height="80" width="80"  class="img-circle" alt="Circular Image "></li>
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-toggle="modal" class="btn btn-success btn-large">All Rounder </a> </p>
    </div>

    <div class="span3 PlanPricing template4" style="width:180px">
      <div class="planName"> <span class="price">$850K</span>
        <h4>Tamim Iqbal</h4>
        <p>Bangladesh</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img <img src="<?php echo base_url('images/e3.png'); ?>" height="80" width="80"  class="img-circle" alt="Circular Image "></li>
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-toggle="modal" class="btn btn-success btn-large">Batsman </a> </p>
    </div>

    <div class="span3 PlanPricing template4" style="width:180px">
      <div class="planName"> <span class="price">$800K</span>
        <h4>Mushfiqur Rahim</h4>
        <p>Bangladesh</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url('images/e4.png'); ?>" height="80" width="80"  class="img-circle" alt="Circular Image"></li>
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-toggle="modal" class="btn btn-success btn-large">Wicket Keeper </a> </p>
    </div>  <!-- Price template4 Ends -->

    <div class="span3 PlanPricing template4" style="width:180px">
      <div class="planName"> <span class="price">$800K</span>
        <h4>Mahmudullah Riad</h4>
        <p>Bangladesh</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url('images/e1.png'); ?>" height="80" width="80"  class="img-circle" alt="Circular Image "></li>
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-toggle="modal" class="btn btn-success btn-large">All ROunder </a> </p>
    </div>

     <div class="span3 PlanPricing template4" style="width:180px">
      <div class="planName"> <span class="price">$700K</span>
        <h4>Anamul Haq Bijoy</h4>
        <p>Bangladesh</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url('images/e10.png'); ?>" height="80" width="80"  class="img-circle" alt="Circular Image "></li>
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-toggle="modal" class="btn btn-success btn-large">Wicket Keeper </a> </p>
    </div>


  </div>  <!-- Row2 ends -->

  <div class="container" class="row-fluid">
  <!-- Row3 start -->
  
  
   <div class="span3 PlanPricing template4" style="width:180px">  <!-- Price template4 Starts -->
      <div class="planName"> <span class="price">$650K</span>
        <h4>Anamul Haq Bijoy</h4>
        <p>Bangladesh</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url('images/e9.png'); ?>" height="80" width="80"  class="img-circle" alt="Circular Image "></li>
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-toggle="modal" class="btn btn-success btn-large">Batsman </a> </p>
    </div>

    <div class="span3 PlanPricing template4" style="width:180px">
      <div class="planName"> <span class="price">$850K</span>
        <h4>Mashrafee Mortaza</h4>
        <p>Bangladesh</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url('images/e6.png'); ?>" height="80" width="80"  class="img-circle" alt="Circular Image "></li>
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-toggle="modal" class="btn btn-success btn-large">Bowler </a> </p>
    </div>

    <div class="span3 PlanPricing template4" style="width:180px">
      <div class="planName"> <span class="price">$500K</span>
        <h4>Unknown Name</h4>
        <p>Bangladesh</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url('images/e7.png'); ?>" height="80" width="80"  class="img-circle" alt="Circular Image "></li>
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-toggle="modal" class="btn btn-success btn-large">Unknown </a> </p>
    </div>

    <div class="span3 PlanPricing template4" style="width:180px">
      <div class="planName"> <span class="price">$700K</span>
        <h4>Soumya Sarkar</h4>
        <p>Bangladesh</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url('images/e8.png'); ?>" height="80" width="80"  class="img-circle" alt="Circular Image "></li>
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-toggle="modal" class="btn btn-success btn-large">All Rounder </a> </p>
    </div>  <!-- Price template4 Ends -->

    <div class="span3 PlanPricing template4" style="width:180px">  <!-- Price template4 Starts -->
      <div class="planName"> <span class="price">$500K</span>
        <h4>Unknown Name</h4>
        <p>Bangladesh</p>
      </div>
      <div class="planFeatures">
        <ul>
          <li><img src="<?php echo base_url('images/e2.png'); ?>" height="80" width="80"  class="img-circle" alt="Circular Image "></li>
        </ul>
      </div>
      <p> <a href="#Signup" role="button" data-toggle="modal" class="btn btn-success btn-large">Unknown </a> </p>
    </div>
    
  </div>  <!-- Row3 ends -->
  
  <br><br> <br><br> <br><br>
  
</div> <!-- Container ends -->


<!-- footer -->
<hr>
<footer>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <p class="navbar-brand">   This website is under construction. Any type of feedback from you will be appriciated.</p>  
      <a class="navbar-brand" class="col-lg-12" href="#"><p>Copyright &copy; Your Website 2015</p></a>
    </div>
  </div>
</nav>
</footer>
<hr>

<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

</body>
</html>