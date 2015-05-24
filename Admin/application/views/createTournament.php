
 		<?php
			echo'<tr height="60"></tr>
				
				<div>
					<table>
						<tr>
							<td width="400"></td>
							<td width="150"></td>
							
							<td>
								<h3> <span class="label label-success" style="font-family:sans-serif">   Existing Tournament List  </span> </h3>
							</td>
						</tr>
						<tr height="20"></tr>';
						
			foreach($tournaments as $pl)
			{
				echo '<tr height="20"></tr>
					<tr>
					<td width="200"></td>
					<td></td>
					<td>
						<strong style="font-size:1.15em">'.$pl['tournament_name'].' </strong>
					</td>
					
					</tr> ';
			}

			echo '</table>
				</div>
			<hr><hr>
			
				<div>
					<form method="POST" action="createTournament_proc">
					
					<table>
						<tr height="30"></tr>
						<tr>
							<td></td>
							<td width="170"></td>
							<td>
								<h3><span class="label label-success" >Create A New Tournament </span></h3>
							</td>
						</tr>
						
						<tr height="20"></tr>
						<tr>
							<td width="400"></td>
							<td><strong>Tournament Name: </strong></td>
							
							<td>
								<input type="text" name="tournament_name" required></td>
							</td>
						</tr>
					</table>
					<table>
						<tr height="30"></tr>
						<tr>
							<td width="400"></td>
							<td><strong>Start Date: </strong></td>
							<td width="20"></td>
							<td></td>
							<td>
								<select name="start_day">
									<option> - Day - </option>
									<option value="01">1</option>
									<option value="02">2</option>
									<option value="03">3</option>
									<option value="04">4</option>
									<option value="05">5</option>
									<option value="06">6</option>
									<option value="07">7</option>
									<option value="08">8</option>
									<option value="09">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
							</td>
							<td>
								<select name="start_month">
									<option> - Month - </option>
									<option value="01">January</option>
									<option value="02">Febuary</option>
									<option value="03">March</option>
									<option value="04">April</option>
									<option value="05">May</option>
									<option value="06">June</option>
									<option value="07">July</option>
									<option value="08">August</option>
									<option value="09">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>

							</td>
							<td>
								<select name="start_year">
									<option> - Year - </option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
								</select>
							</td>
						</tr>
						
			  
						<tr height="30"></tr>
						<tr>
							<td width="400"></td>
							<td><strong>End Date: <strong></td>
							<td width="20"></td>
							<td></td>
							<td>
								<select name="end_day">
									<option> - Day - </option>
									<option value="01">1</option>
									<option value="02">2</option>
									<option value="03">3</option>
									<option value="04">4</option>
									<option value="05">5</option>
									<option value="06">6</option>
									<option value="07">7</option>
									<option value="08">8</option>
									<option value="09">9</option>
									<option value="10">10</option>
									<option value="11">11</option>
									<option value="12">12</option>
									<option value="13">13</option>
									<option value="14">14</option>
									<option value="15">15</option>
									<option value="16">16</option>
									<option value="17">17</option>
									<option value="18">18</option>
									<option value="19">19</option>
									<option value="20">20</option>
									<option value="21">21</option>
									<option value="22">22</option>
									<option value="23">23</option>
									<option value="24">24</option>
									<option value="25">25</option>
									<option value="26">26</option>
									<option value="27">27</option>
									<option value="28">28</option>
									<option value="29">29</option>
									<option value="30">30</option>
									<option value="31">31</option>
								</select>
							</td>
							<td>
								<select name="end_month">
									<option> - Month - </option>
									<option value="01">January</option>
									<option value="02">Febuary</option>
									<option value="03">March</option>
									<option value="04">April</option>
									<option value="05">May</option>
									<option value="06">June</option>
									<option value="07">July</option>
									<option value="08">August</option>
									<option value="09">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>

							</td>
							<td>
								<select name="end_year">
									<option> - Year - </option>
									<option value="2015">2015</option>
									<option value="2016">2016</option>
									<option value="2017">2017</option>
									<option value="2018">2018</option>
									<option value="2019">2019</option>
									<option value="2020">2020</option>
									<option value="2021">2021</option>
									<option value="2022">2022</option>
									<option value="2023">2023</option>
									<option value="2024">2024</option>
									<option value="2025">2025</option>
									<option value="2026">2026</option>
									<option value="2027">2027</option>
									<option value="2028">2028</option>
									<option value="2029">2029</option>
									<option value="2030">2030</option>
								</select>
							</td>
						</tr>
						
						<tr height="30"></tr>
						<tr>
							<td width="300"></td>
							<td></td>
							<td width="100">
							  <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
							</td>
						</tr>
						<tr height="40"></tr>
					</table>
					
					</form>
				</div>';
		
		?>
		
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
