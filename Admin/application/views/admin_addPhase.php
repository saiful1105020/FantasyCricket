

    <div height="100">
      <div class="col-xs-12" style="text-align:center !important;float:left;">
         <h1> <span class="label label-danger" >Add Phases </span> </h1>
      </div>
    </div>

    <div>
      <form method="POST" action="addPhases">
     <table style="width:90%">
      <?php
        if($phases==0)
        {
          echo '
                <tr height="60"></tr>
                <tr>
                <td ></td>
				<tr>
				<td width="200"></td>
                <td><strong>Tournament Name: <br></strong>
				<select name="tournament_name" required>';
				//OPTIONS
				foreach($tournaments as $a)
                {
                    echo '<option value='.$a['tournament_id'].'> '.$a['tournament_name'].'</option>';
                }
				
			echo	'</select>
				</td>
				</tr>
				<tr height="20"></tr>
				<tr>
				<td width="200"></td>
                <td width="100"><strong>No. of Tournament Phases: </strong><br> <input type="number" name="phases" min="0" required></td>
				</tr>
				<tr height="20"></tr>
				<tr>
				<td width="200"></td>
                <td width="200">
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
                </td>
				</tr>
				
                </tr>';
        }?>
      </form>
      <form method="POST" action="addPhases_proc">
      <?php
		if($phases>0)
		{
			echo '<table>
			<tr height="60"></tr>
			<tr>
			<td ></td>
			</tr>
			<tr>
				<td><strong>Tournament Name: </strong></td>
				<td width="40"> </td>
				<td><h4 style="color:#0000CC">'.$tournament_name.'</h4></td>
			<tr>
				<td width="100"><strong>No. of Phases: </strong></td>
				<td width="40"> </td>
				<td><h4 style="color:#0000CC">'.$phases.'</td>
			</tr>
			<tr>
				<td width="800"><h4 style="color:#0002CC">INSERT -1 FOR UNLIMITED FREE TRANSFERS</h4></td>
			</tr>
			</table>';
		}

      for($count=1;$count<=$phases;$count++){
	  
        $name_var="name".$count;
		$ft_var="ft".$count;
		$start_day_var="start_day".$count;
		$start_month_var="start_month".$count;
		$start_year_var="start_year".$count;
		$start_hour_var="start_hour".$count;
		$start_min_var="start_min".$count;
		$end_day_var="end_day".$count;
		$end_month_var="end_month".$count;
		$end_year_var="end_year".$count;
		$end_hour_var="end_hour".$count;
		$end_min_var="end_min".$count;

        echo'
		  <hr><hr>
		  <table>
		  <tr>#'.$count.'<br></tr>
          <tr>
			<td>Phase Name: </td>
			<td><input width="50" type="text" name= '.$name_var.' required></td>
		  </tr>
		  
		  <tr height="10"> </tr>
          <tr>
			<td>Free Transfers: </td>
			<td><input width="50" type="number" name='.$ft_var.' min="-1" max="100" required></td>
		  </tr>
		  
		  <tr height="10"> </tr>
		  <tr>
			<td>Start Time: </td>
			<td width="20"></td>
				<td></td>
				
				<td>
				Start Day:
					<select name='.$start_day_var.' required>
							
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
								<select name='.$start_month_var.' required>
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
								<select name='.$start_year_var.' required>
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
								<select name='.$start_hour_var.' required>
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
								<select name='.$start_min_var.' required>
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
		  
		  <tr height="10"> </tr>
		  
		  <tr>
			<td>End Time: </td>
			<td width="20"></td>
				<td></td>
				
				<td>
				End Day:
					<select name='.$end_day_var.' required>
							
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
								<select name='.$end_month_var.' required>
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
								<select name='.$end_year_var.' required>
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
								<select name='.$end_hour_var.' required>
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
								<select name='.$end_min_var.' required>
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
				
		  </table>';
      }?>

	  <table>
      <tr height="30"></tr>
	  <hr><hr>
      <tr>         
        <td width="200"></td>
        <td width="200"></td>
        <?php
        if($phases>0)
        {
          echo '<td width="200">
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
			</td>
			</tr>
			<tr height="30"></tr>
		</table>
		</form>';
        }
        ?>
    </div>


  </body>
</html>
