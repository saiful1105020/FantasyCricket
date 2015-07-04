 
<?php
  
	//Show Team Status //Needs to be modified
	if(isset($_SESSION['user_team']))
	{
		$user_team=$_SESSION['user_team'];
		
		$team_value=0;
		$bat=0;
		$bowl=0;
		$all=0;
		$wk=0;
		$number_of_players=0;
		
		foreach($user_team as $u)
		{
			$team_value+=$u['price'];
			if($u['player_cat']==='BAT') $bat++;
			else if($u['player_cat']==='BOWL') $bowl++;
			else if($u['player_cat']==='ALL') $all++;
			else if($u['player_cat']==='WK') $wk++;
			
			$number_of_players++;
		}
		echo '<pre>Number Of Players : '.$number_of_players.'</pre>';
		echo'<pre>Batsman: '.$bat.'    Bowlers: '.$bowl.'    Allrounders: '.$all.'    Wicket Keeper: '.$wk.'</pre>';
		echo '<pre>Team Value : '.$team_value.'</pre>';
	}
	
	//Show Team Value
	
  
  echo'<table>
    <tr>
      <td width="300"></td>
      <td>
          <h3>YOUR TEAM</h3>
      </td>
      <td width="350"></td>
      <td><strong>Sort By (Category): </strong></td>
      <td>
		<form method="post" action="createTeam">
        <select name="cat" >
			<option value="">---</option>
            <option value="BAT">BAT</option>
            <option value="BOWL">BOWL</option>
            <option value="ALL">ALL</option>
            <option value="WK">WK</option>
          </select>
      </td>
      <td width="100"></td>
      <td><strong>Sort By (Team): </strong></td>
      <td>
        <select name="team_id" >
			<option value="">---</option>';
            foreach ($teams as $t) {
            echo'<option value='.$t['team_id'].'> '.$t['team_name'].' </option>';
          }
      echo'
          </select>
      </td>
      <td width="10"></td>
      <td>
        <input type="submit" name="submit" id="submit" value="GO!" class="btn btn-info pull-right">
      </td>
      </form>
    </tr>
  </table>

  <div>
    <div class="col-md-6">
      <table class="table table-bordered" class="table table-striped" class="table table-hover">
      <thead>
		  
				<th>Player Name</th>
				<th>Category</th>
				<th>Price</th>
				<th>Earned Points</th>
				
				<th colspan="3"></th>
			  
			  </thead>
			  <tbody>';
			  $c1="active";
			  $c3="success";
			  $c2="info";
			  $c4="warning";
			  $c5="danger";
			  $c=1;$d="";
			  
			$user_team=$_SESSION['user_team'];
			foreach($user_team as $u)
			{
				if($c%5==0)$d=$c1;
				else if($c%5==1)$d=$c2;
				else if($c%5==2)$d=$c3;
				else if($c%5==3)$d=$c4;
				else if($c%5==4)$d=$c5;
				echo '<tr class='.$d.'>
				
			<form method="post" action="remove_user_team_player">

            
            <input type="hidden" name="name" value="'.$u['player_name'].'"><td width="12%" >'.$u['player_name'].'</td></input>
            <input type="hidden" name="cat" value="'.$u['player_cat'].'"><td width="8%">'.$u['player_cat'].'</td></input>
            <input type="hidden" name="price" value="'.$u['price'].'"><td width="10%">$'.$u['price'].'</td></input>
			<input type="hidden" name="player_id" value="'.$u['player_id'].'"></input>
            <input type="hidden" name="points" value="'.$u['total_points'].'"><td width="10%">'.$u['total_points'].'</td></input>
			<td width="5%"><input type="submit" name="submit" id="submit" value="REMOVE" class="btn btn-danger "></td>
            
          </form>
			  
			  </tr>';
			  $c++;
			}
		  
		  
        echo '<tbody>
        
    </table>
    </div>
    <div class="col-md-6">
      <table class="table table-bordered">
      <thead>
          <tr>
            <th ></th>
            <th>Player Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Earned Points</th>
            
          
          </tr>
        </thead>
        <tbody>';
        $index =0;
        foreach ($players as $p) {
          echo'
          <tr >
          <form method="post" action="add_user_team_player">

            <td width="5%"><input type="submit" name="submit" id="submit" value="ADD" class="btn btn-primary "></td>
            <input type="hidden" name="name" value="'.$p['Player_name'].'"><td width="12%" >'.$p['Player_name'].'</td></input>
            <input type="hidden" name="cat" value="'.$p['Category'].'"><td width="8%">'.$p['Category'].'</td></input>
            <input type="hidden" name="price" value="'.$p['Price'].'"><td width="10%">$'.$p['Price'].'</td></input>
			<input type="hidden" name="player_id" value="'.$p['Player_id'].'"></input>
            <input type="hidden" name="points" value="'.$points[$index].'"><td width="10%">'.$points[$index].'</td></input>
            
          </form>
          </tr>';
          $index++;
        }		  
        echo '</tbody>
    </table>
    </div>
  </div>

  <table>
    
	  <form method="post" action="createTeam_proc">
	  <tr>
	  <td width="200"><strong><h4>Team Name: </h4></strong></td>
	  <td></td>
	  <td>
		<input type="text" name="team_name" required></input>
	  </td>
      </tr>
	  
	  <tr height="20"></tr>
      <tr>
      <td><strong><h4>Select Captain: </h4></strong></td>
      <td ></td>
      <td>
        <select name="captain" required>';
			foreach($user_team as $u)
			{
				echo '<option value="'.$u['player_id'].'">'.$u['player_name'].'</option>';
			}
			
            
          echo '</select>
				</tr>
		<tr>
			<td width="200"></td>
			<td width="100"></td>
			<td></td>
			<td><input type="submit" name="submit" id="submit" value="CREATE TEAM" class="btn btn-danger "></td>
			</td>
      </tr>
	  <tr height="50"></tr>
  </table>';
  ?>