<?php
echo'

  <div class="col-xs-12" style="text-align:center !important;float:left;">
    <h3> <span class="label label-success" > Results </span> </h3>
  </div>


<div>
      <div class="col-md-2"></div>
      <div class="col-md-8"> 
        <table class="table table-hover table-bordered">
          <thead>
            <th>Time</th>
            <th>Team 1</th>
            <th>Runs</th>
            <th>Overs</th>
			<th>Team 2</th>
			<th>Runs</th>
            <th>Overs</th>
          </thead>
          <tbody>';
          $c2="active";
          $c3="success";
          $c4="info";
          $c1="warning";
          $c=1;$d="";
          foreach ($result as $r) {
            if($c%4==0)$d=$c1;
            else if($c%4==1)$d=$c2;
            else if($c%4==2)$d=$c3;
            else if($c%4==3)$d=$c4;
          echo'  <tr class='.$d.'>
              <td>'.$r['Time'].'</td>
              <td>'.$r['Home Team'].'</td>
              <td>'.$r['RUNS'].'/'.$r['Wickets'].'</td>
              <td>'.$r['Overs'].'.'.$r['Balls'].'</td>
			  <td>'.$r['Away Team'].'</td>
			   <td>'.$r['RUNS2'].'/'.$r['Wickets2'].'</td>
              <td>'.$r['Overs2'].'.'.$r['Balls2'].'</td>
			  
              
            </tr>';
            $c++;
          }
          echo'</tbody>
        </table>
      </div>
      <div class="col-md-2"></div>
  </div>
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>';
?>