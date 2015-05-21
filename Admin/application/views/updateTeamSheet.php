
    <div height="200">
      <div class="col-xs-12" style="text-align:center !important;float:left;">
         <h1> <span class="label label-primary" >Update Team Sheet </span> </h1>
      </div>
    </div>
	
	<?php
		if($step==0)
		{
			echo '<div height="100">
				<form method="POST" action="updateTeamSheet_1">
				<table>
					<tr height="50"></tr>
					<tr>
						<td width="480"></td>
						<td width="60"><h4> <strong style="font-family:Cursive; font-size:1.25em">Team Name:  </strong> </h4></td>
						<td>
							<div class="dropdown" >
							  <select name="team_id" role="menu" aria-labelledby="dLabel" required width="50" style="font-family:Cursive; font-size:1.25em">';
									foreach ($teams as $t)
									{
										echo '<option value='.$t["team_id"].' > '. $t["team_name"].' </option>';
									}
			echo 				'</select>
							</div>
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
		
		else if($step==1)
		{
			echo'<tr height="60"></tr>
					<tr>
					<td width="400"></td>
					<td><strong>Team Name: </strong><h4 style="color:#0000CC">'.$team_name.'</h4></td>
				</tr>
				<hr><hr>
				
				<div>
					<table>
						<tr>
							<td width="200"></td>
							<td width="150"></td>
							<td></td>
							<td>
								<h3> <span class="label label-success" style="font-family:sans-serif">   Current Players  </span> </h3>
							</td>
						</tr>
						<tr height="20"></tr>
						<tr>
							<td width="250"></td>
							<td>
								<strong style="font-family:Cursive; font-size:1.25em">Player Name </strong>
							</td>
							<td width="100" ></td>
							<td>
								<strong style="font-family:Cursive; font-size:1.25em">Category </strong>
							</td>
							<td width="150"></td>
							<td>
								<strong style="font-family:Cursive; font-size:1.25em">Select </strong>
							</td>
						</tr>
					<form method="post" action="updateTeamSheet_2">';
			$count=1;			
			foreach($players as $pl)
			{
				$player="player".$count;

				echo '<tr height="20"></tr>
					<tr>
					<td width="200"></td>
					<td>
						<strong>'.$pl['name'].' </strong>
					</td>
					
					<td width="150"></td>
					<td>
						<strong>'.$pl['player_cat'].'</strong>
					</td>
					<td width="150"></td>
					<td>
						<input type="checkbox" name='.$pl['player_id'].' value="1"><br>
					</td>
					</tr> ';
					$count++;
			}

			echo '
					<tr height="30"></tr>
					<tr>
						<td width="300"></td>
						<td></td>
						<td width="100">
						  <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
						</td>
					</tr>
					</form>
				</table>
			</div>
			<hr><hr>';
		}
		
		?>


    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
