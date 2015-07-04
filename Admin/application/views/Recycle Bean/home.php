	
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


<div class="container">
  <br>
  
  <?php
	if($login_error==true)
	{	
		echo '<div class="alert alert-danger">
				<strong><span class="glyphicon glyphicon-remove"></span> Login Failed! Username and password didn\'t match </strong>
			 </div>';
	}
  ?>
		
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