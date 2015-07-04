
    <div height="200">
      <div class="col-xs-12" style="text-align:center !important;float:left;">
         <h1> <span class="label label-danger" > Create A Match </span> </h1>
      </div>
    </div>
	
	<?php
		if($sameTeam)
		{
			echo 	'<table>
						<tr height="20"> </tr>
						<tr>
							<td width="500"> </td>
							<td class="alert alert-danger">
								<strong><span class="glyphicon glyphicon-remove"></span> A Match Must Contain Two Different Teams </strong>
							</td>
						</tr>
					</table>';
		}
		
		echo '<div height="100">
				
				<table>
					<tr height="20"></tr>
					<tr>
						<td width="565"></td>
						<td width="150"><h4><strong>Running Tournament: </strong></h4></td>
						<td><h4 style="color:#0000CC">'.$tournament_name.'</h4></td>
					</tr>
				</table>
				<hr>
				
				<form method="POST" action="createMatch_proc">
				<table>
					<tr height="50"></tr>
					<tr>
						<td width="480"></td>
						<td width="60"><h4> <strong style="font-family:Cursive; font-size:1.25em">Home Team:  </strong> </h4></td>
						<td>
							<div class="dropdown" >
							  <select name="home_team_id" role="menu" aria-labelledby="dLabel" required width="50" style="font-family:Cursive; font-size:1.25em">';
									foreach ($teams as $t)
									{
										echo '<option value='.$t["team_id"].' > '. $t["team_name"].' </option>';
									}
			echo 				'</select>
							</div>
						</td>
						
						<td width="40"></td>
						<td width="60"><h4> <strong style="font-family:Cursive; font-size:1.25em">Away Team:  </strong> </h4></td>
						
						<td>
							<div class="dropdown" >
							  <select name="away_team_id" role="menu" aria-labelledby="dLabel" required width="50" style="font-family:Cursive; font-size:1.25em">';
									foreach ($teams as $t)
									{
										echo '<option value='.$t["team_id"].' > '. $t["team_name"].' </option>';
									}
			echo 				'</select>
							</div>
						</td>
					</tr>
					
					</table>
					
					<!-- CREATE A DATE + TIME INPUT FORM-->
					<table>
						<tr height="30"></tr>
						<tr>
							<td width="400"></td>
							<td><strong>Start Time: </strong></td>
							<td width="20"></td>
							<td></td>
							<td>
								Start Day:
								<select name="start_day" required>
							
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
								Month:
								<select name="start_month" required>
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
								Year:
								<select name="start_year" required>
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
							
							<td width="30"> </td>
							<td>
								Hour:
								<select name="start_hour" required>
									<option value="00">00</option>
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
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
								</select>
							</td>
							<td>
								Min:
								<select name="start_min" required>
									<option value="00">00</option>
									<option value="01">01</option>
									<option value="02">02</option>
									<option value="03">03</option>
									<option value="04">04</option>
									<option value="05">05</option>
									<option value="06">06</option>
									<option value="07">07</option>
									<option value="08">08</option>
									<option value="09">09</option>
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
									<option value="32">32</option>
									<option value="33">33</option>
									<option value="34">34</option>
									<option value="35">35</option>
									<option value="36">36</option>
									<option value="37">37</option>
									<option value="38">38</option>
									<option value="39">39</option>
									<option value="40">40</option>
									<option value="41">41</option>
									<option value="42">42</option>
									<option value="43">43</option>
									<option value="44">44</option>
									<option value="45">45</option>
									<option value="46">46</option>
									<option value="47">47</option>
									<option value="48">48</option>
									<option value="49">49</option>
									<option value="50">50</option>
									<option value="51">51</option>
									<option value="52">52</option>
									<option value="53">53</option>
									<option value="54">54</option>
									<option value="55">55</option>
									<option value="56">56</option>
									<option value="57">57</option>
									<option value="58">58</option>
									<option value="59">59</option>
								</select>
							</td>
						</tr>
					</table>
					
					<table>
						<tr height="30"></tr>
						<tr>
							<td width="500"></td>
							<td width="200">
							<input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
							</td>
							<td width="200"></td>
						</tr>
					</table>
				</form>
			</div>';
		
		?>


    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
