<?php
		if($step==0)
		{
			echo '<div height="100">
				<form method="POST" action="updatePhases_proc">
				<table>
					<tr height="50"></tr>
					<tr>
						<td width="480"></td>
						<td width="60"><h4> <strong style="font-family:Cursive; font-size:1.25em">Select Tournament:  </strong> </h4></td>
						<td>
							<div class="dropdown" >';
									foreach ($tournaments as $t)
									{
										echo '<table>
												<tr>
													<td> 
														<input type="radio" name="tournament_id" required value='.$t["tournament_id"].'>'.$t["tournament_name"].'
													</td>
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

		else if($step==1)
		{
		
			echo '<div height="100">
				
				<table>
					<tr height="20"></tr>
					<tr>
						<td width="565"></td>
						<td width="150"><h4><strong>Selected Tournament: </strong></h4></td>
						<td><h4 style="color:#0000CC">'.$tournament_name.'</h4></td>
						<hr><hr>
					</tr>
					<!--
					<tr>
						<td width="565"></td>
						<td><h4 style="color:#">'.$match.'</h4></td>
						<td><h4 style="color:#"> VS </h4></td>
						<td><h4 style="color:#">'.$match.'</h4></td>
					</tr>
					-->
					<tr>
						<td width="565"></td>
						<td width="150"><h4> Start Date: </strong></h4></td>
						<td><h4 style="color:#">'.$start_date.'</h4></td>
					</tr>
					<tr>
						<td width="565"></td>
						<td width="150"><h4> End Date: </strong></h4></td>
						<td><h4 style="color:#">'.$end_date.'</h4></td>
					</tr>
				</table>
				<hr><hr>
				
				<form method="POST" action="updatePhases_proc2">	';
					
					///////////
	$count=0;				
	foreach($phases as $p){
		$count++;
        $name_var="name".$count;
		$ft_var="ft".$count;
		$start_day_var="start_day".$count;
		$start_month_var="start_month".$count;
		$start_year_var="start_year".$count;
		$start_hour_var="start_hour".$count;
		$start_min_var="start_min".$count;
		$start_am_pm_var="start_am_pm".$count;
		$end_day_var="end_day".$count;
		$end_month_var="end_month".$count;
		$end_year_var="end_year".$count;
		$end_hour_var="end_hour".$count;
		$end_min_var="end_min".$count;
		$end_am_pm_var="end_am_pm".$count;
		
		$phase_name=$p['phase_name'];
		$ft=$p['free_transfers'];
		
		$start = explode(" ",$p['start_time']);
		$end = explode(" ",$p['finish_time']);
		
		$start_date = $start[0];
		$start_time = $start[1];
		$start_am_pm = $start[2];
		$end_date = $end[0];
		$end_time = $end[1];
		$end_am_pm = $end[2];
		
		
		$form1 = explode("-",$start_date);
		$start_day = $form1[0];
		$start_month = $form1[1];
		$start_year = $form1[2];
		
		$form2 = (explode(".",$start_time));
		$start_hour = $form2[0];
		$start_min = $form2[1];
		
		$form3 = explode("-",$end_date);
		$end_day = $form3[0];
		$end_month = $form3[1];
		$end_year = $form3[2];
		
		$form4 = (explode(".",$end_time));
		$end_hour = $form4[0];
		$end_min = $form4[1];

        echo'
		  <hr><hr>
		  <table>
		  <tr>#'.$count.'<br></tr>
          <tr>
			<td>Phase Name: </td>
			<td><input width="50" type="text" name= "'.$name_var.'" value="'.$p['phase_name'].'" ></td>
		  </tr>
		  
		  <tr height="10"> </tr>
          <tr>
			<td>Free Transfers: </td>
			<td><input width="50" type="number" name="'.$ft_var.'" min="-1" max="100" value="'.$ft.'"></td>
		  </tr>
		  
		  <tr height="10"> </tr>
		  <tr>
			<td>Start Time: </td>
			<td width="20"></td>
				<td></td>
				
				<td>
				Start Day:
					<select name="'.$start_day_var.'" required>';	
					
							if($start_day==="01") echo '<option value="01" selected>01</option>';
							else echo '<option value="01">01</option>';

							if($start_day==="02") echo '<option value="02" selected>02</option>';
							else echo '<option value="02">02</option>';

							if($start_day==="03") echo '<option value="03" selected>03</option>';
							else echo '<option value="03">03</option>';

							if($start_day==="04") echo '<option value="04" selected>04</option>';
							else echo '<option value="04">04</option>';

							if($start_day==="05") echo '<option value="05" selected>05</option>';
							else echo '<option value="05">05</option>';

							if($start_day==="06") echo '<option value="06" selected>06</option>';
							else echo '<option value="06">06</option>';

							if($start_day==="07") echo '<option value="07" selected>07</option>';
							else echo '<option value="07">07</option>';

							if($start_day==="08") echo '<option value="08" selected>08</option>';
							else echo '<option value="08">08</option>';

							if($start_day==="09") echo '<option value="09" selected>09</option>';
							else echo '<option value="09">09</option>';

							if($start_day==="10") echo '<option value="10" selected>10</option>';
							else echo '<option value="10">10</option>';

							if($start_day==="11") echo '<option value="11" selected>11</option>';
							else echo '<option value="11">11</option>';

							if($start_day==="12") echo '<option value="12" selected>12</option>';
							else echo '<option value="12">12</option>';

							if($start_day==="13") echo '<option value="13" selected>13</option>';
							else echo '<option value="13">13</option>';

							if($start_day==="14") echo '<option value="14" selected>14</option>';
							else echo '<option value="14">14</option>';

							if($start_day==="15") echo '<option value="15" selected>15</option>';
							else echo '<option value="15">15</option>';

							if($start_day==="16") echo '<option value="16" selected>16</option>';
							else echo '<option value="16">16</option>';

							if($start_day==="17") echo '<option value="17" selected>17</option>';
							else echo '<option value="17">17</option>';

							if($start_day==="18") echo '<option value="18" selected>18</option>';
							else echo '<option value="18">18</option>';

							if($start_day==="19") echo '<option value="19" selected>19</option>';
							else echo '<option value="19">19</option>';

							if($start_day==="20") echo '<option value="20" selected>20</option>';
							else echo '<option value="20">20</option>';

							if($start_day==="21") echo '<option value="21" selected>21</option>';
							else echo '<option value="21">21</option>';

							if($start_day==="22") echo '<option value="22" selected>22</option>';
							else echo '<option value="22">22</option>';

							if($start_day==="23") echo '<option value="23" selected>23</option>';
							else echo '<option value="23">23</option>';

							if($start_day==="24") echo '<option value="24" selected>24</option>';
							else echo '<option value="24">24</option>';

							if($start_day==="25") echo '<option value="25" selected>25</option>';
							else echo '<option value="25">25</option>';

							if($start_day==="26") echo '<option value="26" selected>26</option>';
							else echo '<option value="26">26</option>';

							if($start_day==="27") echo '<option value="27" selected>27</option>';
							else echo '<option value="27">27</option>';

							if($start_day==="28") echo '<option value="28" selected>28</option>';
							else echo '<option value="28">28</option>';

							if($start_day==="29") echo '<option value="29" selected>29</option>';
							else echo '<option value="29">29</option>';

							if($start_day==="30") echo '<option value="30" selected>30</option>';
							else echo '<option value="30">30</option>';

							if($start_day==="31") echo '<option value="31" selected>31</option>';
							else echo '<option value="31">31</option>';




					echo '</select>
							</td>
							<td>
								Month:
								<select name="'.$start_month_var.'" required>';
									if($start_month==="JAN") echo '<option value="JAN" selected>JAN</option>';
									else echo '<option value="JAN" >JAN</option>';

									if($start_month==="FEB") echo '<option value="FEB" selected>FEB</option>';
									else echo '<option value="FEB" >FEB</option>';

									if($start_month==="MAR") echo '<option value="MAR" selected>MAR</option>';
									else echo '<option value="MAR" >MAR</option>';

									if($start_month==="APR") echo '<option value="APR" selected>APR</option>';
									else echo '<option value="APR" >APR</option>';

									if($start_month==="MAY") echo '<option value="MAY" selected>MAY</option>';
									else echo '<option value="MAY" >MAY</option>';

									if($start_month==="JUN") echo '<option value="JUN" selected>JUN</option>';
									else echo '<option value="JUN" >JUN</option>';

									if($start_month==="JUL") echo '<option value="JUL" selected>JUL</option>';
									else echo '<option value="JUL" >JUL</option>';

									if($start_month==="AUG") echo '<option value="AUG" selected>AUG</option>';
									else echo '<option value="AUG" >AUG</option>';

									if($start_month==="SEP") echo '<option value="SEP" selected>SEP</option>';
									else echo '<option value="SEP" >SEP</option>';

									if($start_month==="OCT") echo '<option value="OCT" selected>OCT</option>';
									else echo '<option value="OCT" >OCT</option>';

									if($start_month==="NOV") echo '<option value="NOV" selected>NOV</option>';
									else echo '<option value="NOV" >NOV</option>';

									if($start_month==="DEC") echo '<option value="DEC" selected>DEC</option>';
									else echo '<option value="DEC" >DEC</option>';


								echo '</select>

							</td>
							<td>
								Year:
								<select name="'.$start_year_var.'" required>';
									if($start_year==="15") echo '<option value="15" selected>2015</option>';
									else echo '<option value="15" >2015</option>';

									if($start_year==="16") echo '<option value="16" selected>2016</option>';
									else echo '<option value="16" >2016</option>';

									if($start_year==="17") echo '<option value="17" selected>2017</option>';
									else echo '<option value="17" >2017</option>';

									if($start_year==="18") echo '<option value="18" selected>2018</option>';
									else echo '<option value="18" >2018</option>';

									if($start_year==="19") echo '<option value="19" selected>2019</option>';
									else echo '<option value="19" >2019</option>';

									if($start_year==="20") echo '<option value="20" selected>2020</option>';
									else echo '<option value="20" >2020</option>';

									if($start_year==="21") echo '<option value="21" selected>2021</option>';
									else echo '<option value="21" >2021</option>';

									if($start_year==="22") echo '<option value="22" selected>2022</option>';
									else echo '<option value="22" >2022</option>';

									if($start_year==="23") echo '<option value="23" selected>2023</option>';
									else echo '<option value="23" >2023</option>';

									if($start_year==="24") echo '<option value="24" selected>2024</option>';
									else echo '<option value="24" >2024</option>';

									if($start_year==="25") echo '<option value="25" selected>2025</option>';
									else echo '<option value="25" >2025</option>';

									if($start_year==="26") echo '<option value="26" selected>2026</option>';
									else echo '<option value="26" >2026</option>';

									if($start_year==="27") echo '<option value="27" selected>2027</option>';
									else echo '<option value="27" >2027</option>';

									if($start_year==="28") echo '<option value="28" selected>2028</option>';
									else echo '<option value="28" >2028</option>';

									if($start_year==="29") echo '<option value="29" selected>2029</option>';
									else echo '<option value="29" >2029</option>';

									if($start_year==="30") echo '<option value="30" selected>2030</option>';
									else echo '<option value="30" >2030</option>';


								echo '</select>
							</td>
							
							<td width="30"> </td>
							<td>
								Hour:
								<select name="'.$start_hour_var.'" required>';
									if($start_hour==="01") echo '<option value="01" selected>01</option>';
									else echo '<option value="01">01</option>';

									if($start_hour==="02") echo '<option value="02" selected>02</option>';
									else echo '<option value="02">02</option>';

									if($start_hour==="03") echo '<option value="03" selected>03</option>';
									else echo '<option value="03">03</option>';

									if($start_hour==="04") echo '<option value="04" selected>04</option>';
									else echo '<option value="04">04</option>';

									if($start_hour==="05") echo '<option value="05" selected>05</option>';
									else echo '<option value="05">05</option>';

									if($start_hour==="06") echo '<option value="06" selected>06</option>';
									else echo '<option value="06">06</option>';

									if($start_hour==="07") echo '<option value="07" selected>07</option>';
									else echo '<option value="07">07</option>';

									if($start_hour==="08") echo '<option value="08" selected>08</option>';
									else echo '<option value="08">08</option>';

									if($start_hour==="09") echo '<option value="09" selected>09</option>';
									else echo '<option value="09">09</option>';

									if($start_hour==="10") echo '<option value="10" selected>10</option>';
									else echo '<option value="10">10</option>';

									if($start_hour==="11") echo '<option value="11" selected>11</option>';
									else echo '<option value="11">11</option>';

									if($start_hour==="12") echo '<option value="12" selected>12</option>';
									else echo '<option value="12">12</option>';


								echo '</select>
							</td>
							
							<td>
								Min:
								<select name="'.$start_min_var.'" required>';
								
									//print_r($end_time);
									
									if($start_min==="00") echo '<option value="00" selected>00</option>';
									else echo '<option value="00">00</option>';

									if($start_min==="01") echo '<option value="01" selected>01</option>';
									else echo '<option value="01">01</option>';

									if($start_min==="02") echo '<option value="02" selected>02</option>';
									else echo '<option value="02">02</option>';

									if($start_min==="03") echo '<option value="03" selected>03</option>';
									else echo '<option value="03">03</option>';

									if($start_min==="04") echo '<option value="04" selected>04</option>';
									else echo '<option value="04">04</option>';

									if($start_min==="05") echo '<option value="05" selected>05</option>';
									else echo '<option value="05">05</option>';

									if($start_min==="06") echo '<option value="06" selected>06</option>';
									else echo '<option value="06">06</option>';

									if($start_min==="07") echo '<option value="07" selected>07</option>';
									else echo '<option value="07">07</option>';

									if($start_min==="08") echo '<option value="08" selected>08</option>';
									else echo '<option value="08">08</option>';

									if($start_min==="09") echo '<option value="09" selected>09</option>';
									else echo '<option value="09">09</option>';

									if($start_min==="10") echo '<option value="10" selected>10</option>';
									else echo '<option value="10">10</option>';

									if($start_min==="11") echo '<option value="11" selected>11</option>';
									else echo '<option value="11">11</option>';

									if($start_min==="12") echo '<option value="12" selected>12</option>';
									else echo '<option value="12">12</option>';

									if($start_min==="13") echo '<option value="13" selected>13</option>';
									else echo '<option value="13">13</option>';

									if($start_min==="14") echo '<option value="14" selected>14</option>';
									else echo '<option value="14">14</option>';

									if($start_min==="15") echo '<option value="15" selected>15</option>';
									else echo '<option value="15">15</option>';

									if($start_min==="16") echo '<option value="16" selected>16</option>';
									else echo '<option value="16">16</option>';

									if($start_min==="17") echo '<option value="17" selected>17</option>';
									else echo '<option value="17">17</option>';

									if($start_min==="18") echo '<option value="18" selected>18</option>';
									else echo '<option value="18">18</option>';

									if($start_min==="19") echo '<option value="19" selected>19</option>';
									else echo '<option value="19">19</option>';

									if($start_min==="20") echo '<option value="20" selected>20</option>';
									else echo '<option value="20">20</option>';

									if($start_min==="21") echo '<option value="21" selected>21</option>';
									else echo '<option value="21">21</option>';

									if($start_min==="22") echo '<option value="22" selected>22</option>';
									else echo '<option value="22">22</option>';

									if($start_min==="23") echo '<option value="23" selected>23</option>';
									else echo '<option value="23">23</option>';

									if($start_min==="24") echo '<option value="24" selected>24</option>';
									else echo '<option value="24">24</option>';

									if($start_min==="25") echo '<option value="25" selected>25</option>';
									else echo '<option value="25">25</option>';

									if($start_min==="26") echo '<option value="26" selected>26</option>';
									else echo '<option value="26">26</option>';

									if($start_min==="27") echo '<option value="27" selected>27</option>';
									else echo '<option value="27">27</option>';

									if($start_min==="28") echo '<option value="28" selected>28</option>';
									else echo '<option value="28">28</option>';

									if($start_min==="29") echo '<option value="29" selected>29</option>';
									else echo '<option value="29">29</option>';

									if($start_min==="30") echo '<option value="30" selected>30</option>';
									else echo '<option value="30">30</option>';

									if($start_min==="31") echo '<option value="31" selected>31</option>';
									else echo '<option value="31">31</option>';

									if($start_min==="32") echo '<option value="32" selected>32</option>';
									else echo '<option value="32">32</option>';

									if($start_min==="33") echo '<option value="33" selected>33</option>';
									else echo '<option value="33">33</option>';

									if($start_min==="34") echo '<option value="34" selected>34</option>';
									else echo '<option value="34">34</option>';

									if($start_min==="35") echo '<option value="35" selected>35</option>';
									else echo '<option value="35">35</option>';

									if($start_min==="36") echo '<option value="36" selected>36</option>';
									else echo '<option value="36">36</option>';

									if($start_min==="37") echo '<option value="37" selected>37</option>';
									else echo '<option value="37">37</option>';

									if($start_min==="38") echo '<option value="38" selected>38</option>';
									else echo '<option value="38">38</option>';

									if($start_min==="39") echo '<option value="39" selected>39</option>';
									else echo '<option value="39">39</option>';

									if($start_min==="40") echo '<option value="40" selected>40</option>';
									else echo '<option value="40">40</option>';

									if($start_min==="41") echo '<option value="41" selected>41</option>';
									else echo '<option value="41">41</option>';

									if($start_min==="42") echo '<option value="42" selected>42</option>';
									else echo '<option value="42">42</option>';

									if($start_min==="43") echo '<option value="43" selected>43</option>';
									else echo '<option value="43">43</option>';

									if($start_min==="44") echo '<option value="44" selected>44</option>';
									else echo '<option value="44">44</option>';

									if($start_min==="45") echo '<option value="45" selected>45</option>';
									else echo '<option value="45">45</option>';

									if($start_min==="46") echo '<option value="46" selected>46</option>';
									else echo '<option value="46">46</option>';

									if($start_min==="47") echo '<option value="47" selected>47</option>';
									else echo '<option value="47">47</option>';

									if($start_min==="48") echo '<option value="48" selected>48</option>';
									else echo '<option value="48">48</option>';

									if($start_min==="49") echo '<option value="49" selected>49</option>';
									else echo '<option value="49">49</option>';

									if($start_min==="50") echo '<option value="50" selected>50</option>';
									else echo '<option value="50">50</option>';

									if($start_min==="51") echo '<option value="51" selected>51</option>';
									else echo '<option value="51">51</option>';

									if($start_min==="52") echo '<option value="52" selected>52</option>';
									else echo '<option value="52">52</option>';

									if($start_min==="53") echo '<option value="53" selected>53</option>';
									else echo '<option value="53">53</option>';

									if($start_min==="54") echo '<option value="54" selected>54</option>';
									else echo '<option value="54">54</option>';

									if($start_min==="55") echo '<option value="55" selected>55</option>';
									else echo '<option value="55">55</option>';

									if($start_min==="56") echo '<option value="56" selected>56</option>';
									else echo '<option value="56">56</option>';

									if($start_min==="57") echo '<option value="57" selected>57</option>';
									else echo '<option value="57">57</option>';

									if($start_min==="58") echo '<option value="58" selected>58</option>';
									else echo '<option value="58">58</option>';

									if($start_min==="59") echo '<option value="59" selected>59</option>';
									else echo '<option value="59">59</option>';
									
								echo '</select>
							</td>

							<td width="30"></td>
							<td>
								<select name="'.$start_am_pm_var.'" required>';
									if($start_am_pm==="AM") echo '<option value="AM" selected>AM</option>';
									else echo '<option value="AM">AM</option>';
									
									if($start_am_pm==="PM") echo '<option value="PM" selected>PM</option>';
									else echo '<option value="PM">PM</option>';
									
								echo '</select>
							</td>
		  </tr>
		  
		  <tr height="10"> </tr>
		  
		  <tr>
			<td>End Time: </td>
			<td width="20"></td>
				<td></td>
				
				<td>
				End Day:
					<select name="'.$end_day_var.'" required>';
						if($end_day==="01") echo '<option value="01" selected>01</option>';
						else echo '<option value="01">01</option>';

						if($end_day==="02") echo '<option value="02" selected>02</option>';
						else echo '<option value="02">02</option>';

						if($end_day==="03") echo '<option value="03" selected>03</option>';
						else echo '<option value="03">03</option>';

						if($end_day==="04") echo '<option value="04" selected>04</option>';
						else echo '<option value="04">04</option>';

						if($end_day==="05") echo '<option value="05" selected>05</option>';
						else echo '<option value="05">05</option>';

						if($end_day==="06") echo '<option value="06" selected>06</option>';
						else echo '<option value="06">06</option>';

						if($end_day==="07") echo '<option value="07" selected>07</option>';
						else echo '<option value="07">07</option>';

						if($end_day==="08") echo '<option value="08" selected>08</option>';
						else echo '<option value="08">08</option>';

						if($end_day==="09") echo '<option value="09" selected>09</option>';
						else echo '<option value="09">09</option>';

						if($end_day==="10") echo '<option value="10" selected>10</option>';
						else echo '<option value="10">10</option>';

						if($end_day==="11") echo '<option value="11" selected>11</option>';
						else echo '<option value="11">11</option>';

						if($end_day==="12") echo '<option value="12" selected>12</option>';
						else echo '<option value="12">12</option>';

						if($end_day==="13") echo '<option value="13" selected>13</option>';
						else echo '<option value="13">13</option>';

						if($end_day==="14") echo '<option value="14" selected>14</option>';
						else echo '<option value="14">14</option>';

						if($end_day==="15") echo '<option value="15" selected>15</option>';
						else echo '<option value="15">15</option>';

						if($end_day==="16") echo '<option value="16" selected>16</option>';
						else echo '<option value="16">16</option>';

						if($end_day==="17") echo '<option value="17" selected>17</option>';
						else echo '<option value="17">17</option>';

						if($end_day==="18") echo '<option value="18" selected>18</option>';
						else echo '<option value="18">18</option>';

						if($end_day==="19") echo '<option value="19" selected>19</option>';
						else echo '<option value="19">19</option>';

						if($end_day==="20") echo '<option value="20" selected>20</option>';
						else echo '<option value="20">20</option>';

						if($end_day==="21") echo '<option value="21" selected>21</option>';
						else echo '<option value="21">21</option>';

						if($end_day==="22") echo '<option value="22" selected>22</option>';
						else echo '<option value="22">22</option>';

						if($end_day==="23") echo '<option value="23" selected>23</option>';
						else echo '<option value="23">23</option>';

						if($end_day==="24") echo '<option value="24" selected>24</option>';
						else echo '<option value="24">24</option>';

						if($end_day==="25") echo '<option value="25" selected>25</option>';
						else echo '<option value="25">25</option>';

						if($end_day==="26") echo '<option value="26" selected>26</option>';
						else echo '<option value="26">26</option>';

						if($end_day==="27") echo '<option value="27" selected>27</option>';
						else echo '<option value="27">27</option>';

						if($end_day==="28") echo '<option value="28" selected>28</option>';
						else echo '<option value="28">28</option>';

						if($end_day==="29") echo '<option value="29" selected>29</option>';
						else echo '<option value="29">29</option>';

						if($end_day==="30") echo '<option value="30" selected>30</option>';
						else echo '<option value="30">30</option>';

						if($end_day==="31") echo '<option value="31" selected>31</option>';
						else echo '<option value="31">31</option>';


					echo '</select>
							</td>
							<td>
								Month:
								<select name="'.$end_month_var.'" required>';
									if($end_month==="JAN") echo '<option value="JAN" selected>JAN</option>';
									else echo '<option value="JAN" >JAN</option>';

									if($end_month==="FEB") echo '<option value="FEB" selected>FEB</option>';
									else echo '<option value="FEB" >FEB</option>';

									if($end_month==="MAR") echo '<option value="MAR" selected>MAR</option>';
									else echo '<option value="MAR" >MAR</option>';

									if($end_month==="APR") echo '<option value="APR" selected>APR</option>';
									else echo '<option value="APR" >APR</option>';

									if($end_month==="MAY") echo '<option value="MAY" selected>MAY</option>';
									else echo '<option value="MAY" >MAY</option>';

									if($end_month==="JUN") echo '<option value="JUN" selected>JUN</option>';
									else echo '<option value="JUN" >JUN</option>';

									if($end_month==="JUL") echo '<option value="JUL" selected>JUL</option>';
									else echo '<option value="JUL" >JUL</option>';

									if($end_month==="AUG") echo '<option value="AUG" selected>AUG</option>';
									else echo '<option value="AUG" >AUG</option>';

									if($end_month==="SEP") echo '<option value="SEP" selected>SEP</option>';
									else echo '<option value="SEP" >SEP</option>';

									if($end_month==="OCT") echo '<option value="OCT" selected>OCT</option>';
									else echo '<option value="OCT" >OCT</option>';

									if($end_month==="NOV") echo '<option value="NOV" selected>NOV</option>';
									else echo '<option value="NOV" >NOV</option>';

									if($end_month==="DEC") echo '<option value="DEC" selected>DEC</option>';
									else echo '<option value="DEC" >DEC</option>';


								echo '</select>

							</td>
							<td>
								Year:
								<select name="'.$end_year_var.'" required>';
									if($end_year==="15") echo '<option value="15" selected>2015</option>';
									else echo '<option value="15" >2015</option>';

									if($end_year==="16") echo '<option value="16" selected>2016</option>';
									else echo '<option value="16" >2016</option>';

									if($end_year==="17") echo '<option value="17" selected>2017</option>';
									else echo '<option value="17" >2017</option>';

									if($end_year==="18") echo '<option value="18" selected>2018</option>';
									else echo '<option value="18" >2018</option>';

									if($end_year==="19") echo '<option value="19" selected>2019</option>';
									else echo '<option value="19" >2019</option>';

									if($end_year==="20") echo '<option value="20" selected>2020</option>';
									else echo '<option value="20" >2020</option>';

									if($end_year==="21") echo '<option value="21" selected>2021</option>';
									else echo '<option value="21" >2021</option>';

									if($end_year==="22") echo '<option value="22" selected>2022</option>';
									else echo '<option value="22" >2022</option>';

									if($end_year==="23") echo '<option value="23" selected>2023</option>';
									else echo '<option value="23" >2023</option>';

									if($end_year==="24") echo '<option value="24" selected>2024</option>';
									else echo '<option value="24" >2024</option>';

									if($end_year==="25") echo '<option value="25" selected>2025</option>';
									else echo '<option value="25" >2025</option>';

									if($end_year==="26") echo '<option value="26" selected>2026</option>';
									else echo '<option value="26" >2026</option>';

									if($end_year==="27") echo '<option value="27" selected>2027</option>';
									else echo '<option value="27" >2027</option>';

									if($end_year==="28") echo '<option value="28" selected>2028</option>';
									else echo '<option value="28" >2028</option>';

									if($end_year==="29") echo '<option value="29" selected>2029</option>';
									else echo '<option value="29" >2029</option>';

									if($end_year==="30") echo '<option value="30" selected>2030</option>';
									else echo '<option value="30" >2030</option>';


								echo '</select>
							</td>
							
							<td width="30"> </td>
							<td>
								Hour:
								<select name="'.$end_hour_var.'" required>';
									if($end_hour==="01") echo '<option value="01" selected>01</option>';
									else echo '<option value="01">01</option>';

									if($end_hour==="02") echo '<option value="02" selected>02</option>';
									else echo '<option value="02">02</option>';

									if($end_hour==="03") echo '<option value="03" selected>03</option>';
									else echo '<option value="03">03</option>';

									if($end_hour==="04") echo '<option value="04" selected>04</option>';
									else echo '<option value="04">04</option>';

									if($end_hour==="05") echo '<option value="05" selected>05</option>';
									else echo '<option value="05">05</option>';

									if($end_hour==="06") echo '<option value="06" selected>06</option>';
									else echo '<option value="06">06</option>';

									if($end_hour==="07") echo '<option value="07" selected>07</option>';
									else echo '<option value="07">07</option>';

									if($end_hour==="08") echo '<option value="08" selected>08</option>';
									else echo '<option value="08">08</option>';

									if($end_hour==="09") echo '<option value="09" selected>09</option>';
									else echo '<option value="09">09</option>';

									if($end_hour==="10") echo '<option value="10" selected>10</option>';
									else echo '<option value="10">10</option>';

									if($end_hour==="11") echo '<option value="11" selected>11</option>';
									else echo '<option value="11">11</option>';

									if($end_hour==="12") echo '<option value="12" selected>12</option>';
									else echo '<option value="12">12</option>';


								echo '</select>
							</td>
							<td>
								Min:
								<select name="'.$end_min_var.'" required>';
									if($end_min==="00") echo '<option value="00" selected>00</option>';
									else echo '<option value="00">00</option>';

									if($end_min==="01") echo '<option value="01" selected>01</option>';
									else echo '<option value="01">01</option>';

									if($end_min==="02") echo '<option value="02" selected>02</option>';
									else echo '<option value="02">02</option>';

									if($end_min==="03") echo '<option value="03" selected>03</option>';
									else echo '<option value="03">03</option>';

									if($end_min==="04") echo '<option value="04" selected>04</option>';
									else echo '<option value="04">04</option>';

									if($end_min==="05") echo '<option value="05" selected>05</option>';
									else echo '<option value="05">05</option>';

									if($end_min==="06") echo '<option value="06" selected>06</option>';
									else echo '<option value="06">06</option>';

									if($end_min==="07") echo '<option value="07" selected>07</option>';
									else echo '<option value="07">07</option>';

									if($end_min==="08") echo '<option value="08" selected>08</option>';
									else echo '<option value="08">08</option>';

									if($end_min==="09") echo '<option value="09" selected>09</option>';
									else echo '<option value="09">09</option>';

									if($end_min==="10") echo '<option value="10" selected>10</option>';
									else echo '<option value="10">10</option>';

									if($end_min==="11") echo '<option value="11" selected>11</option>';
									else echo '<option value="11">11</option>';

									if($end_min==="12") echo '<option value="12" selected>12</option>';
									else echo '<option value="12">12</option>';

									if($end_min==="13") echo '<option value="13" selected>13</option>';
									else echo '<option value="13">13</option>';

									if($end_min==="14") echo '<option value="14" selected>14</option>';
									else echo '<option value="14">14</option>';

									if($end_min==="15") echo '<option value="15" selected>15</option>';
									else echo '<option value="15">15</option>';

									if($end_min==="16") echo '<option value="16" selected>16</option>';
									else echo '<option value="16">16</option>';

									if($end_min==="17") echo '<option value="17" selected>17</option>';
									else echo '<option value="17">17</option>';

									if($end_min==="18") echo '<option value="18" selected>18</option>';
									else echo '<option value="18">18</option>';

									if($end_min==="19") echo '<option value="19" selected>19</option>';
									else echo '<option value="19">19</option>';

									if($end_min==="20") echo '<option value="20" selected>20</option>';
									else echo '<option value="20">20</option>';

									if($end_min==="21") echo '<option value="21" selected>21</option>';
									else echo '<option value="21">21</option>';

									if($end_min==="22") echo '<option value="22" selected>22</option>';
									else echo '<option value="22">22</option>';

									if($end_min==="23") echo '<option value="23" selected>23</option>';
									else echo '<option value="23">23</option>';

									if($end_min==="24") echo '<option value="24" selected>24</option>';
									else echo '<option value="24">24</option>';

									if($end_min==="25") echo '<option value="25" selected>25</option>';
									else echo '<option value="25">25</option>';

									if($end_min==="26") echo '<option value="26" selected>26</option>';
									else echo '<option value="26">26</option>';

									if($end_min==="27") echo '<option value="27" selected>27</option>';
									else echo '<option value="27">27</option>';

									if($end_min==="28") echo '<option value="28" selected>28</option>';
									else echo '<option value="28">28</option>';

									if($end_min==="29") echo '<option value="29" selected>29</option>';
									else echo '<option value="29">29</option>';

									if($end_min==="30") echo '<option value="30" selected>30</option>';
									else echo '<option value="30">30</option>';

									if($end_min==="31") echo '<option value="31" selected>31</option>';
									else echo '<option value="31">31</option>';

									if($end_min==="32") echo '<option value="32" selected>32</option>';
									else echo '<option value="32">32</option>';

									if($end_min==="33") echo '<option value="33" selected>33</option>';
									else echo '<option value="33">33</option>';

									if($end_min==="34") echo '<option value="34" selected>34</option>';
									else echo '<option value="34">34</option>';

									if($end_min==="35") echo '<option value="35" selected>35</option>';
									else echo '<option value="35">35</option>';

									if($end_min==="36") echo '<option value="36" selected>36</option>';
									else echo '<option value="36">36</option>';

									if($end_min==="37") echo '<option value="37" selected>37</option>';
									else echo '<option value="37">37</option>';

									if($end_min==="38") echo '<option value="38" selected>38</option>';
									else echo '<option value="38">38</option>';

									if($end_min==="39") echo '<option value="39" selected>39</option>';
									else echo '<option value="39">39</option>';

									if($end_min==="40") echo '<option value="40" selected>40</option>';
									else echo '<option value="40">40</option>';

									if($end_min==="41") echo '<option value="41" selected>41</option>';
									else echo '<option value="41">41</option>';

									if($end_min==="42") echo '<option value="42" selected>42</option>';
									else echo '<option value="42">42</option>';

									if($end_min==="43") echo '<option value="43" selected>43</option>';
									else echo '<option value="43">43</option>';

									if($end_min==="44") echo '<option value="44" selected>44</option>';
									else echo '<option value="44">44</option>';

									if($end_min==="45") echo '<option value="45" selected>45</option>';
									else echo '<option value="45">45</option>';

									if($end_min==="46") echo '<option value="46" selected>46</option>';
									else echo '<option value="46">46</option>';

									if($end_min==="47") echo '<option value="47" selected>47</option>';
									else echo '<option value="47">47</option>';

									if($end_min==="48") echo '<option value="48" selected>48</option>';
									else echo '<option value="48">48</option>';

									if($end_min==="49") echo '<option value="49" selected>49</option>';
									else echo '<option value="49">49</option>';

									if($end_min==="50") echo '<option value="50" selected>50</option>';
									else echo '<option value="50">50</option>';

									if($end_min==="51") echo '<option value="51" selected>51</option>';
									else echo '<option value="51">51</option>';

									if($end_min==="52") echo '<option value="52" selected>52</option>';
									else echo '<option value="52">52</option>';

									if($end_min==="53") echo '<option value="53" selected>53</option>';
									else echo '<option value="53">53</option>';

									if($end_min==="54") echo '<option value="54" selected>54</option>';
									else echo '<option value="54">54</option>';

									if($end_min==="55") echo '<option value="55" selected>55</option>';
									else echo '<option value="55">55</option>';

									if($end_min==="56") echo '<option value="56" selected>56</option>';
									else echo '<option value="56">56</option>';

									if($end_min==="57") echo '<option value="57" selected>57</option>';
									else echo '<option value="57">57</option>';

									if($end_min==="58") echo '<option value="58" selected>58</option>';
									else echo '<option value="58">58</option>';

									if($end_min==="59") echo '<option value="59" selected>59</option>';
									else echo '<option value="59">59</option>';

								echo '</select>
							</td>

							<td width="30"></td>
							<td>
								<select name="'.$end_am_pm_var.'" required>';
									if($end_am_pm==="AM") echo '<option value="AM" selected>AM</option>';
									else echo '<option value="AM">AM</option>';
									
									if($end_am_pm==="PM") echo '<option value="PM" selected>PM</option>';
									else echo '<option value="PM">PM</option>';
									
								echo '</select>
							</td>
		  </tr>
				
		  </table>';
      }
					
					echo '<table>
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
		}
?>