
<?php
	if($password_match_error==true)
	{	
		echo '<div class="alert alert-danger">
				<strong><span class="glyphicon glyphicon-remove"></span> Password and Confirm Password didn\'t match </strong>
			 </div>';
	}
?>

<?php
	if($already_exist_error==true)
	{	
		echo '<div class="alert alert-danger">
				<strong><span class="glyphicon glyphicon-remove"></span> This E-mail ID is already registered </strong>
			 </div>';
	}
?>

<head>
	<meta charset = "utf-8">
	<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<link rel = "stylesheet" href = "css/bootstrap.min.css">
	
</head>

<body style = "background-color:">
 <div class="container" style = "margin: 5%">
    <div class="row">
        <form name="registrationForm" method = "post" action="<?php echo site_url('home/register_proc'); ?>" role="form">
            <div class="col-lg-6">
                <div class="well well-sm"><span class="glyphicon glyphicon-asterisk"></span>Required Field</div>
                <div class="form-group">
                    <label for="InputName">Enter Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="user_name" id="InputName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-group">
							<select name="Country" placeholder="Select Country" class="form-control" id="country-selector" autocorrect="off" autocomplete="off">
								  <option value="" selected="selected">Select Country</option>
								  <option value="Afghanistan" data-alternative-spellings="AF ?????????">Afghanistan</option>
								  <option value="Albania" data-alternative-spellings="AL">Albania</option>
								  <option value="Algeria" data-alternative-spellings="DZ ???????">Algeria</option>
								  <option value="Andorra" data-alternative-spellings="AD" data-relevancy-booster="0.5">Andorra</option>
								  <option value="Angola" data-alternative-spellings="AO">Angola</option>
								  <option value="Anguilla" data-alternative-spellings="AI" data-relevancy-booster="0.5">Anguilla</option>
								  <option value="Antarctica" data-alternative-spellings="AQ" data-relevancy-booster="0.5">Antarctica</option>
								  <option value="Antigua And Barbuda" data-alternative-spellings="AG" data-relevancy-booster="0.5">Antigua And Barbuda</option>
								  <option value="Argentina" data-alternative-spellings="AR">Argentina</option>
								  <option value="Armenia" data-alternative-spellings="AM ????????">Armenia</option>
								  <option value="Australia" data-alternative-spellings="AU" data-relevancy-booster="1.5">Australia</option>
								  <option value="Austria" data-alternative-spellings="AT Österreich Osterreich Oesterreich ">Austria</option>
								  <option value="Azerbaijan" data-alternative-spellings="AZ">Azerbaijan</option>
								  <option value="Bahamas" data-alternative-spellings="BS">Bahamas</option>
								  <option value="Bahrain" data-alternative-spellings="BH ???????">Bahrain</option>
								  <option value="Bangladesh" data-alternative-spellings="BD ????????" data-relevancy-booster="2">Bangladesh</option>
								  <option value="Barbados" data-alternative-spellings="BB">Barbados</option>
								  <option value="Belarus" data-alternative-spellings="BY ????????">Belarus</option>
								  <option value="Belgium" data-alternative-spellings="BE België Belgie Belgien Belgique" data-relevancy-booster="1.5">Belgium</option>
								  <option value="Belize" data-alternative-spellings="BZ">Belize</option>
								  <option value="Benin" data-alternative-spellings="BJ">Benin</option>
								  <option value="Bermuda" data-alternative-spellings="BM" data-relevancy-booster="0.5">Bermuda</option>
								  <option value="Bhutan" data-alternative-spellings="BT ?????">Bhutan</option>
								  <option value="Bolivia" data-alternative-spellings="BO">Bolivia</option>
								  <option value="Bosnia and Herzegovina" data-alternative-spellings="BA BiH Bosna i Hercegovina ????? ? ???????????">Bosnia and Herzegovina</option>
								  <option value="Botswana" data-alternative-spellings="BW">Botswana</option>
								  <option value="Brazil" data-alternative-spellings="BR Brasil" data-relevancy-booster="2">Brazil</option>
								  <option value="Bulgaria" data-alternative-spellings="BG ????????">Bulgaria</option>
								  <option value="Burkina Faso" data-alternative-spellings="BF">Burkina Faso</option>
								  <option value="Burundi" data-alternative-spellings="BI">Burundi</option>
								  <option value="Cambodia" data-alternative-spellings="KH ???????">Cambodia</option>
								  <option value="Cameroon" data-alternative-spellings="CM">Cameroon</option>
								  <option value="Canada" data-alternative-spellings="CA" data-relevancy-booster="2">Canada</option>
								  <option value="Chad" data-alternative-spellings="TD ????? Tchad">Chad</option>
								  <option value="Chile" data-alternative-spellings="CL">Chile</option>
								  <option value="China" data-relevancy-booster="3.5" data-alternative-spellings="CN Zhongguo Zhonghua Peoples Republic ??/??">China</option>
								  <option value="Colombia" data-alternative-spellings="CO">Colombia</option>
								  <option value="Comoros" data-alternative-spellings="KM ??? ?????">Comoros</option>
								  <option value="Congo" data-alternative-spellings="CG">Congo</option>
								  <option value="Cook Islands" data-alternative-spellings="CK" data-relevancy-booster="0.5">Cook Islands</option>
								  <option value="Costa Rica" data-alternative-spellings="CR">Costa Rica</option>
								  <option value="Côte d'Ivoire" data-alternative-spellings="CI Cote dIvoire">Côte d'Ivoire</option>
								  <option value="Croatia" data-alternative-spellings="HR Hrvatska">Croatia</option>
								  <option value="Cuba" data-alternative-spellings="CU">Cuba</option>
								  <option value="Cyprus" data-alternative-spellings="CY ??p??? Kýpros Kibris">Cyprus</option>
								  <option value="Czech Republic" data-alternative-spellings="CZ Ceská Ceska">Czech Republic</option>
								  <option value="Denmark" data-alternative-spellings="DK Danmark" data-relevancy-booster="1.5">Denmark</option>
								  <option value="Djibouti" data-alternative-spellings="DJ ??????? Jabuuti Gabuuti">Djibouti</option>
								  <option value="Dominica" data-alternative-spellings="DM Dominique" data-relevancy-booster="0.5">Dominica</option>
								  <option value="Dominican Republic" data-alternative-spellings="DO">Dominican Republic</option>
								  <option value="Ecuador" data-alternative-spellings="EC">Ecuador</option>
								  <option value="Egypt" data-alternative-spellings="EG" data-relevancy-booster="1.5">Egypt</option>
								  <option value="El Salvador" data-alternative-spellings="SV">El Salvador</option>
								  <option value="Equatorial Guinea" data-alternative-spellings="GQ">Equatorial Guinea</option>
								  <option value="Estonia" data-alternative-spellings="EE Eesti">Estonia</option>
								  <option value="Ethiopia" data-alternative-spellings="ET ?????">Ethiopia</option>
								  <option value="Fiji" data-alternative-spellings="FJ Viti ?????">Fiji</option>
								  <option value="Finland" data-alternative-spellings="FI Suomi">Finland</option>
								  <option value="France" data-alternative-spellings="FR République française" data-relevancy-booster="2.5">France</option>
								  <option value="Gabon" data-alternative-spellings="GA République Gabonaise">Gabon</option>
								  <option value="Gambia" data-alternative-spellings="GM">Gambia</option>
								  <option value="Georgia" data-alternative-spellings="GE ??????????">Georgia</option>
								  <option value="Germany" data-alternative-spellings="DE Bundesrepublik Deutschland" data-relevancy-booster="3">Germany</option>
								  <option value="Ghana" data-alternative-spellings="GH">Ghana</option>
								  <option value="Gibraltar" data-alternative-spellings="GI" data-relevancy-booster="0.5">Gibraltar</option>
								  <option value="Greece" data-alternative-spellings="GR ????da" data-relevancy-booster="1.5">Greece</option>
								  <option value="Greenland" data-alternative-spellings="GL grønland" data-relevancy-booster="0.5">Greenland</option>
								  <option value="Grenada" data-alternative-spellings="GD">Grenada</option>
								  <option value="Guam" data-alternative-spellings="GU">Guam</option>
								  <option value="Guatemala" data-alternative-spellings="GT">Guatemala</option>
								  <option value="Guinea" data-alternative-spellings="GN">Guinea</option>
								  <option value="Guinea-Bissau" data-alternative-spellings="GW">Guinea-Bissau</option>
								  <option value="Guyana" data-alternative-spellings="GY">Guyana</option>
								  <option value="Haiti" data-alternative-spellings="HT">Haiti</option>
								  <option value="Holy See (Vatican City State)" data-alternative-spellings="VA" data-relevancy-booster="0.5">Vatican City</option>
								  <option value="Honduras" data-alternative-spellings="HN">Honduras</option>
								  <option value="Hong Kong" data-alternative-spellings="HK ??">Hong Kong</option>
								  <option value="Hungary" data-alternative-spellings="HU Magyarország">Hungary</option>
								  <option value="Iceland" data-alternative-spellings="IS Island">Iceland</option>
								  <option value="India" data-alternative-spellings="IN ???? ??????? Hindustan" data-relevancy-booster="3">India</option>
								  <option value="Indonesia" data-alternative-spellings="ID" data-relevancy-booster="2">Indonesia</option>
								  <option value="Iran, Islamic Republic of" data-alternative-spellings="IR ?????">Iran</option>
								  <option value="Iraq" data-alternative-spellings="IQ ???????">Iraq</option>
								  <option value="Ireland" data-alternative-spellings="IE Éire" data-relevancy-booster="1.2">Ireland</option>
								  <option value="Israel" data-alternative-spellings="IL ??????? ?????">Israel</option>
								  <option value="Italy" data-alternative-spellings="IT Italia" data-relevancy-booster="2">Italy</option>
								  <option value="Jamaica" data-alternative-spellings="JM">Jamaica</option>
								  <option value="Japan" data-alternative-spellings="JP Nippon Nihon ??" data-relevancy-booster="2.5">Japan</option>
								  <option value="Jordan" data-alternative-spellings="JO ??????">Jordan</option>
								  <option value="Kazakhstan" data-alternative-spellings="KZ ????????? ?????????">Kazakhstan</option>
								  <option value="Kenya" data-alternative-spellings="KE">Kenya</option>
								  <option value="Kiribati" data-alternative-spellings="KI">Kiribati</option>
								  <option value="Korea, Democratic People's Republic of" data-alternative-spellings="KP North Korea">North Korea</option>
								  <option value="Korea, Republic of" data-alternative-spellings="KR South Korea" data-relevancy-booster="1.5">South Korea</option>
								  <option value="Kuwait" data-alternative-spellings="KW ??????">Kuwait</option>
								  <option value="Kyrgyzstan" data-alternative-spellings="KG ??????????">Kyrgyzstan</option>
								  <option value="Latvia" data-alternative-spellings="LV Latvija">Latvia</option>
								  <option value="Lebanon" data-alternative-spellings="LB ?????">Lebanon</option>
								  <option value="Lesotho" data-alternative-spellings="LS">Lesotho</option>
								  <option value="Liberia" data-alternative-spellings="LR">Liberia</option>
								  <option value="Libyan Arab Jamahiriya" data-alternative-spellings="LY ?????">Libya</option>
								  <option value="Liechtenstein" data-alternative-spellings="LI">Liechtenstein</option>
								  <option value="Lithuania" data-alternative-spellings="LT Lietuva">Lithuania</option>
								  <option value="Luxembourg" data-alternative-spellings="LU">Luxembourg</option>
								  <option value="Macao" data-alternative-spellings="MO">Macao</option>
								  <option value="Macedonia, The Former Yugoslav Republic Of" data-alternative-spellings="MK ??????????">Macedonia</option>
								  <option value="Madagascar" data-alternative-spellings="MG Madagasikara">Madagascar</option>
								  <option value="Malaysia" data-alternative-spellings="MY">Malaysia</option>
								  <option value="Maldives" data-alternative-spellings="MV">Maldives</option>
								  <option value="Mali" data-alternative-spellings="ML">Mali</option>
								  <option value="Malta" data-alternative-spellings="MT">Malta</option>
								  <option value="Mauritania" data-alternative-spellings="MR ???????????">Mauritania</option>
								  <option value="Mauritius" data-alternative-spellings="MU">Mauritius</option>
								  <option value="Mexico" data-alternative-spellings="MX Mexicanos" data-relevancy-booster="1.5">Mexico</option>
								  <option value="Moldova, Republic of" data-alternative-spellings="MD">Moldova</option>
								  <option value="Monaco" data-alternative-spellings="MC">Monaco</option>
								  <option value="Mongolia" data-alternative-spellings="MN Mong?ol ulus ?????? ???">Mongolia</option>
								  <option value="Montenegro" data-alternative-spellings="ME">Montenegro</option>
								  <option value="Morocco" data-alternative-spellings="MA ??????">Morocco</option>
								  <option value="Mozambique" data-alternative-spellings="MZ Moçambique">Mozambique</option>
								  <option value="Myanmar" data-alternative-spellings="MM">Myanmar</option>
								  <option value="Namibia" data-alternative-spellings="NA Namibië">Namibia</option>
								  <option value="Nepal" data-alternative-spellings="NP ?????">Nepal</option>
								  <option value="Netherlands" data-alternative-spellings="NL Holland Nederland" data-relevancy-booster="1.5">Netherlands</option>
								  <option value="New Zealand" data-alternative-spellings="NZ Aotearoa">New Zealand</option>
								  <option value="Nicaragua" data-alternative-spellings="NI">Nicaragua</option>
								  <option value="Niger" data-alternative-spellings="NE Nijar">Niger</option>
								  <option value="Nigeria" data-alternative-spellings="NG Nijeriya Naíjíríà" data-relevancy-booster="1.5">Nigeria</option>
								  <option value="Norway" data-alternative-spellings="NO Norge Noreg" data-relevancy-booster="1.5">Norway</option>
								  <option value="Oman" data-alternative-spellings="OM ????">Oman</option>
								  <option value="Pakistan" data-alternative-spellings="PK ???????" data-relevancy-booster="2">Pakistan</option>
								  <option value="Palestinian Territory, Occupied" data-alternative-spellings="PS ??????">Palestine</option>
								  <option value="Panama" data-alternative-spellings="PA">Panama</option>
								  <option value="Papua New Guinea" data-alternative-spellings="PG">Papua New Guinea</option>
								  <option value="Paraguay" data-alternative-spellings="PY">Paraguay</option>
								  <option value="Peru" data-alternative-spellings="PE">Peru</option>
								  <option value="Philippines" data-alternative-spellings="PH Pilipinas" data-relevancy-booster="1.5">Philippines</option>
								  <option value="Poland" data-alternative-spellings="PL Polska" data-relevancy-booster="1.25">Poland</option>
								  <option value="Portugal" data-alternative-spellings="PT Portuguesa" data-relevancy-booster="1.5">Portugal</option>
								  <option value="Puerto Rico" data-alternative-spellings="PR">Puerto Rico</option>
								  <option value="Qatar" data-alternative-spellings="QA ???">Qatar</option>
								  <option value="Romania" data-alternative-spellings="RO Rumania Roumania România">Romania</option>
								  <option value="Russian Federation" data-alternative-spellings="RU Rossiya ?????????? ??????" data-relevancy-booster="2.5">Russian Federation</option>
								  <option value="Rwanda" data-alternative-spellings="RW">Rwanda</option>
								  <option value="Saint Helena" data-alternative-spellings="SH St.">Saint Helena</option>
								  <option value="Saint Kitts and Nevis" data-alternative-spellings="KN St.">Saint Kitts and Nevis</option>
								  <option value="Saint Lucia" data-alternative-spellings="LC St.">Saint Lucia</option>
								  <option value="Saint Vincent and the Grenadines" data-alternative-spellings="VC St.">Saint Vincent and the Grenadines</option>
								  <option value="San Marino" data-alternative-spellings="SM RSM Repubblica">San Marino</option>
								  <option value="Saudi Arabia" data-alternative-spellings="SA ????????">Saudi Arabia</option>
								  <option value="Senegal" data-alternative-spellings="SN Sénégal">Senegal</option>
								  <option value="Serbia" data-alternative-spellings="RS ?????? Srbija">Serbia</option>
								  <option value="Sierra Leone" data-alternative-spellings="SL">Sierra Leone</option>
								  <option value="Singapore" data-alternative-spellings="SG Singapura  ??????????? ???????? ??????">Singapore</option>
								  <option value="Slovakia" data-alternative-spellings="SK Slovenská Slovensko">Slovakia</option>
								  <option value="Slovenia" data-alternative-spellings="SI Slovenija">Slovenia</option>
								  <option value="Somalia" data-alternative-spellings="SO ???????">Somalia</option>
								  <option value="South Africa" data-alternative-spellings="ZA RSA Suid-Afrika">South Africa</option>
								  <option value="Spain" data-alternative-spellings="ES España" data-relevancy-booster="2">Spain</option>
								  <option value="Sri Lanka" data-alternative-spellings="LK ????? ???? ?????? Ceylon">Sri Lanka</option>
								  <option value="Sudan" data-alternative-spellings="SD ???????">Sudan</option>
								  <option value="Swaziland" data-alternative-spellings="SZ weSwatini Swatini Ngwane">Swaziland</option>
								  <option value="Sweden" data-alternative-spellings="SE Sverige" data-relevancy-booster="1.5">Sweden</option>
								  <option value="Switzerland" data-alternative-spellings="CH Swiss Confederation Schweiz Suisse Svizzera Svizra" data-relevancy-booster="1.5">Switzerland</option>
								  <option value="Syrian Arab Republic" data-alternative-spellings="SY Syria ?????">Syria</option>
								  <option value="Taiwan, Province of China" data-alternative-spellings="TW ?? ??">Taiwan</option>
								  <option value="Tajikistan" data-alternative-spellings="TJ ?????????? Toçikiston">Tajikistan</option>
								  <option value="Tanzania, United Republic of" data-alternative-spellings="TZ">Tanzania</option>
								  <option value="Thailand" data-alternative-spellings="TH ????????? Prathet Thai">Thailand</option>
								  <option value="Togo" data-alternative-spellings="TG Togolese">Togo</option>
								  <option value="Tonga" data-alternative-spellings="TO">Tonga</option>
								  <option value="Trinidad and Tobago" data-alternative-spellings="TT">Trinidad and Tobago</option>
								  <option value="Tunisia" data-alternative-spellings="TN ????">Tunisia</option>
								  <option value="Turkey" data-alternative-spellings="TR Türkiye Turkiye">Turkey</option>
								  <option value="Turkmenistan" data-alternative-spellings="TM Türkmenistan">Turkmenistan</option>
								  <option value="Uganda" data-alternative-spellings="UG">Uganda</option>
								  <option value="Ukraine" data-alternative-spellings="UA Ukrayina ???????">Ukraine</option>
								  <option value="United Arab Emirates" data-alternative-spellings="AE UAE ????????">United Arab Emirates</option>
								  <option value="United Kingdom" data-alternative-spellings="GB Great Britain England UK Wales Scotland Northern Ireland" data-relevancy-booster="2.5">United Kingdom</option>
								  <option value="United States" data-relevancy-booster="3.5" data-alternative-spellings="US USA United States of America">United States</option>
								  <option value="Uruguay" data-alternative-spellings="UY">Uruguay</option>
								  <option value="Uzbekistan" data-alternative-spellings="UZ ?????????? O'zbekstan O‘zbekiston">Uzbekistan</option>
								  <option value="Venezuela" data-alternative-spellings="VE">Venezuela</option>
								  <option value="Vietnam" data-alternative-spellings="VN Vi?t Nam" data-relevancy-booster="1.5">Vietnam</option>
								  <option value="Yemen" data-alternative-spellings="YE ?????">Yemen</option>
								  <option value="Zambia" data-alternative-spellings="ZM">Zambia</option>
								  <option value="Zimbabwe" data-alternative-spellings="ZW">Zimbabwe</option>
							</select>
					
					<!--<div class="input-group">
                        <input type="text" class="form-control" name="country" id="InputCountry" placeholder="Enter Country" >
                        <span class="input-group-addon"></span>
                    </div>-->
                </div>
				
                <div class="form-group">
                    <label for="InputDate">Enter Your Birthday</label>
					
                    <div class="input-group"  style = "">
					<label for="InputDay" style = "margin-right: 5px">Day</label>
					<select name="day" style = "margin: 5px;" required>
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
						
                        <!--<span class="input-group-addon"></span>-->
                    
					<label for="InputMonth" style = "margin: 5px">Month</label>
                    <!--<div class="input-group">-->
                        <select name="month" style = "margin: 5px" required>
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
                        

                    
					
					<label for="InputYear" style = "margin: 5px">Year</label>
                    <!--<div class="input-group" style = "background-color: red" >-->
                        <select name="year" style = "margin: 5px" required>				
									<option value= "1920">1920</option>
									<option value= "1921">1921</option>
									<option value= "1922">1922</option>
									<option value= "1923">1923</option>
									<option value= "1924">1924</option>
									<option value= "1925">1925</option>
									<option value= "1926">1926</option>
									<option value= "1927">1927</option>
									<option value= "1928">1928</option>
									<option value= "1929">1929</option>
									<option value= "1930">1930</option>
									<option value= "1931">1931</option>
									<option value= "1932">1932</option>
									<option value= "1933">1933</option>
									<option value= "1934">1934</option>
									<option value= "1935">1935</option>
									<option value= "1936">1936</option>
									<option value= "1937">1937</option>
									<option value= "1938">1938</option>
									<option value= "1939">1939</option>
									<option value= "1940">1940</option>
									<option value= "1941">1941</option>
									<option value= "1942">1942</option>
									<option value= "1943">1943</option>
									<option value= "1944">1944</option>
									<option value= "1945">1945</option>
									<option value= "1946">1946</option>
									<option value= "1947">1947</option>
									<option value= "1948">1948</option>
									<option value= "1949">1949</option>
									<option value= "1950">1950</option>
									<option value= "1951">1951</option>
									<option value= "1952">1952</option>
									<option value= "1953">1953</option>
									<option value= "1954">1954</option>
									<option value= "1955">1955</option>
									<option value= "1956">1956</option>
									<option value= "1957">1957</option>
									<option value= "1958">1958</option>
									<option value= "1959">1959</option>
									<option value= "1960">1960</option>
									<option value= "1961">1961</option>
									<option value= "1962">1962</option>
									<option value= "1963">1963</option>
									<option value= "1964">1964</option>
									<option value= "1965">1965</option>
									<option value= "1966">1966</option>
									<option value= "1967">1967</option>
									<option value= "1968">1968</option>
									<option value= "1969">1969</option>
									<option value= "1970">1970</option>
									<option value= "1971">1971</option>
									<option value= "1972">1972</option>
									<option value= "1973">1973</option>
									<option value= "1974">1974</option>
									<option value= "1975">1975</option>
									<option value= "1976">1976</option>
									<option value= "1977">1977</option>
									<option value= "1978">1978</option>
									<option value= "1979">1979</option>
									<option value= "1980">1980</option>
									<option value= "1981">1981</option>
									<option value= "1982">1982</option>
									<option value= "1983">1983</option>
									<option value= "1984">1984</option>
									<option value= "1985">1985</option>
									<option value= "1986">1986</option>
									<option value= "1987">1987</option>
									<option value= "1988">1988</option>
									<option value= "1989">1989</option>
									<option value= "1990">1990</option>
									<option value= "1991">1991</option>
									<option value= "1992">1992</option>
									<option value= "1993">1993</option>
									<option value= "1994">1994</option>
									<option value= "1995">1995</option>
									<option value= "1996">1996</option>
									<option value= "1997">1997</option>
									<option value= "1998">1998</option>
									<option value= "1999">1999</option>
									<option value= "2000">2000</option>
									<option value= "2001">2001</option>
									<option value= "2002">2002</option>
									<option value= "2003">2003</option>
									<option value= "2004">2004</option>
									<option value= "2005">2005</option>
									<option value= "2006">2006</option>
									<option value= "2007">2007</option>
									<option value= "2008">2008</option>
									<option value= "2009">2009</option>
									<option value= "2010">2010</option>
									<option value= "2011">2011</option>
									<option value= "2012">2012</option>
									<option value= "2013">2013</option>
									<option value= "2014">2014</option>
								</select>
                        

                    
					</div>
                </div>
				
							
                <div class="form-group">
                    <label for="InputEmail">Enter Email</label>
                    <div class="input-group">
                        <input type="email" class="form-control" id="InputEmailFirst" name="email" placeholder="Enter Email" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="InputEmail">Enter Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="InputPasswordFirst" name="password" placeholder="At least 8 characters" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputEmail">Confirm Password</label>
                    <div class="input-group">
                        <input type="password" class="form-control" id="InputPasswordSecond" name="confirm_password" placeholder="Re-enter the password" required>
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
            </div>
        </form>
    </div>
</div>



<script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="js/bootstrap.js"></script>
</body>

</html>