<?php
		
		echo '<div height="200">
	        <div class="col-xs-12" style="text-align:center !important;float:left;">
	           <h1> <span class="label label-danger" > Update Match Stats </span> </h1>
	        </div>
	    </div>';
		if($step==0)
		{
			echo '<div height="100">
				<form method="POST" action="updateMatchStat_1">
				<table>
					<tr height="50"></tr>
					<tr>
						<td width="300"></td>
						<td width="60"><h4> <strong style="font-family:Cursive; font-size:1.25em">Select Match:  </strong> </h4></td>
						<td>
							<div class="dropdown" >';
									foreach ($matches as $m)
									{
										echo '<table>
												<tr>
													<td width="250"> 
														<h4><input type="radio" name="match_id" required value='.$m["match_id"].'>'.$m["home_team_name"]
														.' VS '.$m["away_team_name"].'</h4>
													</td>
													<td width="200"> </td>
													<td><h4>'.$m['Time'].'</h4></td>
												</tr>
											</table>';
									}
			echo 			'</div>
						</td>
					</tr>
					<tr height="30"></tr>
					<tr>
						<td width="200"></td>
						<td width="200">
						  <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
						</td>
					</tr>
				</table>
				</form>
			</div>';
		}

		else if($step==1){

	echo '<div height="50">
		    <div class="col-xs-12" style="text-align:center !important;float:left;">
		        <h3><strong> Team : '.$team_name.' </strong> </h3>
		    </div>
		  	</div>

		    <table>
		      <tr>
		          
		          <td width="100">
		             <h4><strong> Player Name </strong> </h4>
		          </td>
		          <td width"100">
		            <h4><strong> Runs Scored </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Balls Played </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Fours </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Sixes </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Wickets Taken </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Balls Bowled </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Runs Conceded </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Maiden Overs </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Catches </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Stumpings </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Run Outs </strong> </h4>
		          </td>
		          
		      </tr>
		      <form method="POST" action="updateMatchStat_proc/0">';
		      $count=1;
		      foreach ($result as $r) {
		      	
		      	$score_var="runs_score".$count;
		      	$balls_play_var="balls_played".$count;
		      	$fours_var="fours".$count;
		      	$sixes_var="sixes".$count;
		      	$Wickets_var="wickets".$count;
		      	$balls_bowl_var="balls_bowled".$count;
		      	$runs_con_var="runs_conceded".$count;
		      	$maiden_var="maiden".$count;
		      	$catch_var="catches".$count;
		      	$stump_var="stumping".$count;
		      	$runout_var="run_out".$count;
		      	$id_var="player_id".$count;
		      echo'
		      <tr>    
		          <td width="150">
		             <h4><strong> '.$r['PLAYER_NAME'].' </strong> </h4>
		             <input type="hidden" name='.$id_var.' value='.$r['PLAYER_ID'].'>
		          </td>
		          <td width"100">
		            <input type="number" min="0" name='.$score_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$balls_play_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$fours_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$sixes_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$Wickets_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$balls_bowl_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$runs_con_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$maiden_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$catch_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$stump_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$runout_var.' value="0" style="width: 6em">
		          </td>
		          
		      </tr>';
		      $count++;
		  }
		  $_SESSION['noPlayers']=$count-1;
		    echo'</table>
		    <table>
		      <tr height="20"></tr>
		      <tr>
		        <td width="580"></td>

		        <td>
		          <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
		        </td>
		      </tr>
		    </table>
		    </form>';
		
		}

		else if($step==2){

	echo '<div height="50">
		    <div class="col-xs-12" style="text-align:center !important;float:left;">
		        <h3><strong> Team : '.$team_name.' </strong> </h3>
		    </div>
		  	</div>

		    <table>
		      <tr>
		          
		          <td width="100">
		             <h4><strong> Player Name </strong> </h4>
		          </td>
		          <td width"100">
		            <h4><strong> Runs Scored </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Balls Played </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Fours </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Sixes </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Wickets Taken </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Balls Bowled </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Runs Conceded </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Maiden Overs </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Catches </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Stumpings </strong> </h4>
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <h4><strong> Run Outs </strong> </h4>
		          </td>
		          
		      </tr>
		      <form method="POST" action="updateMatchStat_proc/1">';
		      $count=1;
		      foreach ($result as $r) {
		      	$score_var="runs_score".$count;
		      	$balls_play_var="balls_played".$count;
		      	$fours_var="fours".$count;
		      	$sixes_var="sixes".$count;
		      	$Wickets_var="wickets".$count;
		      	$balls_bowl_var="balls_bowled".$count;
		      	$runs_con_var="runs_conceded".$count;
		      	$maiden_var="maiden".$count;
		      	$catch_var="catches".$count;
		      	$stump_var="stumping".$count;
		      	$runout_var="run_out".$count;
		      	$id_var="player_id".$count;

		      	echo $r['PLAYER_ID'];

		      echo'<tr>    
		          <td width="150">
		             <h4><strong> '.$r['PLAYER_NAME'].' </strong> </h4>
		             <input type="hidden" name='.$id_var.' value='.$r['PLAYER_ID'].'>
		          </td>
		          <td width"100">
		            <input type="number" min="0" name='.$score_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$balls_play_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$fours_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$sixes_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$Wickets_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$balls_bowl_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$runs_con_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$maiden_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$catch_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$stump_var.' value="0" style="width: 6em">
		          </td>
		          <td width="20"></td>
		          <td width"100">
		            <input type="number" min="0" name='.$runout_var.' value="0" style="width: 6em">
		          </td>
		          
		      </tr>';
		      $count++;
		  }
		  $_SESSION['noPlayers']=$count-1;
		    echo'</table>
		    <table>
		      <tr height="20"></tr>
		      <tr>
		        <td width="580"></td>

		        <td>
		          <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
		        </td>
		      </tr>
		    </table>
		    </form>';
		
		}
    ?>