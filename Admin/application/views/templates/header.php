<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fantasy Cricket Admin</title>
    
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-theme.min.css"); ?>" />
	<link rel="stylesheet" href="<?php echo base_url("assets/css/admin_home.css"); ?>" />
    
	    
	<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.min.js"); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>

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
            <li class="active"><a href="<?php echo site_url('admin'); ?>">HOME<span class="sr-only">(current)</span></a></li>
            <li class="dropdown">
              <a href="<?php echo site_url('tournament'); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tournament <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li ><a href="<?php echo site_url('tournament/viewTournament'); ?>">View Existing Tournaments </a></li>
                <li><a href="<?php echo site_url('tournament/createTournament'); ?>">Create A Tournament</a></li>
                <li><a href="<?php echo site_url('tournament/activeTournament'); ?>">Select Active Tournament </a></li>
                <li><a href="<?php echo site_url('tournament/updateTournamentTeam'); ?>">Update Tournament Teams </a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?php echo site_url('phase'); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Phases <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('phase/addPhases'); ?>">Create Tournament Phases </a></li>
                <li><a href="<?php echo site_url('phase/updatePhases'); ?>">Update Tournament Phases </a></li>
                <li><a href="<?php echo site_url('phase/updateInterPhase'); ?>">Update Inter-phase </a></li>
              </ul>
            </li>
             <li class="dropdown">
              <a href="<?php echo site_url('team'); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Team <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('team/createTeam'); ?>">Create A Team </a></li>
                <li><a href="<?php echo site_url('team/addPlayer'); ?>">Add A Player </a></li>
                <li><a href="<?php echo site_url('team/updateTeamSheet'); ?>">Update Team Sheet</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="<?php echo site_url('match'); ?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Match <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="<?php echo site_url('match/createMatch'); ?>">Create A Match </a></li>
                <li><a href="<?php echo site_url('match/deleteMatch'); ?>">Delete A Match </a></li>
                <li><a href="<?php echo site_url('match/updateMatchInfo'); ?>">Update Match Info </a></li>
                <li><a href="<?php echo site_url('match/updateMatchStat'); ?>">Update Match Statistics </a></li>
              </ul>
            </li>
            <li><a href="<?php echo site_url('admin/schedules'); ?>">Schedules</a></li>
            <li><a href="<?php echo site_url('admin/results'); ?>">Results</a></li>
            <li><a href="<?php echo site_url('admin/logout'); ?>">Sign-Out</a></li>
            
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>