    <div style="height:140px">
      <div class="col-xs-3"></div>
      <div class="col-xs-3">
        <h1><span class="label label-danger">Current Tournament </span></h1>
      </div>
      <div class="col-xs-3">
        <h1><span class="label label-success"><?php echo $tournament_name;?> </span></h1>
      </div>
      <div class="col-xs-3"></div>
    </div>

    <!--- You have to edit from here  -->
    <hr>
    <div style="height:60px"> 
      <div class="col-xs-3" style="text-align:center !important;float:left;">
        <h2><span class="label label-default" > Upcoming Match </span></h2>
      </div>
      <div class="col-xs-3" style="text-align:center !important;float:left;">
        <h2><span class="label label-primary" > <?php echo $home_team; ?> </span><span class="label label-warning">Vs </span><span class="label label-primary"> <?php echo $away_team; ?> </span></h2>
      </div>
      
      <div class="col-xs-3" style="text-align:center !important; float:left; vertical-align:top; padding:left">
        <br><button type="button" class="btn btn-info"> Initialize Match </button><br>
      </div>
	  <!--
      <div class="col-xs-3" >
          <br><button type="button" class="btn btn-warning">End </button><br>
      </div>
	  -->
    </div>
	<!--
    <hr>
    <hr>
    <div style="height:60px"> 
      <div class="col-xs-3" style="text-align:center !important;float:left;">
        <h2><span class="label label-default" >  Match 2 </span></h2>
      </div>
      <div class="col-xs-3" style="text-align:center !important;float:left;">
        <h2><span class="label label-primary"> India </span><span class="label label-warning">Vs </span><span class="label label-primary">South Africa </span></h2>
      </div>
      
      <div class="col-xs-3" style="text-align:center !important; float:left; vertical-align:top; padding:left">
        <br><button type="button" class="btn btn-info" >Start </button><br>
      </div>
      <div class="col-xs-3" >
          <br><button type="button" class="btn btn-warning">End </button><br>
      </div>
    </div>
	-->

    <hr>
    <div style="height:60px"> 
      <div class="col-xs-3" style="text-align:center !important;float:left;">
        <h2><span class="label label-default" > Upcoming Phase </span></h2>
      </div>
      <div class="col-xs-3" style="text-align:center !important;float:left;">
        <h2><span class="label label-primary"> <?php echo $upcoming_phase ;?> </span></h2>
      </div>
      <!--
      <div class="col-xs-3" style="text-align:center !important; float:left; vertical-align:top; padding:left">
        <br><button type="button" class="btn btn-info">Start </button><br>
      </div>
	  -->
      <div class="col-xs-3" style="text-align:center !important; float:left; vertical-align:top; padding:left">
          <br><button type="button" class="btn btn-warning"> Finalize Points </button><br>
      </div>
    </div>

    <hr>
    <div style="height:60px"> 
      <div class="col-xs-3" style="text-align:center !important;float:left;">
        <h2><span class="label label-default" > Latest Phase </span></h2>
      </div>
      <div class="col-xs-3" style="text-align:center !important;float:left;">
        <h2><span class="label label-primary"> <?php echo $completed_phase ;?> </span></h2>
      </div>
      <!--
      <div class="col-xs-3" style="text-align:center !important; float:left; vertical-align:top; padding:left">
        <br><button type="button" class="btn btn-info">Start </button><br>
      </div>
	  -->
      <div class="col-xs-3" style="text-align:center !important; float:left; vertical-align:top; padding:left">
          <br><button type="button" class="btn btn-info"> Initialize Phase </button><br>
      </div>
    </div>
	<hr>

  </body>

</html>