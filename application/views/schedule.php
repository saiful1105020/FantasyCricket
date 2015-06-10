<?php
echo'
<div class="col-xs-12" style="text-align:center !important;float:left;">
    <h3> <span class="label label-primary" > Upcoming Matches </span> </h3>
  </div>
<div>
      <div class="col-md-3"></div>
      <div class="col-md-6">
        <table class="table table-striped">
          <thead>
            <th>Time</th>
            <th>Team 1</th>
            <th>Team 2</th>
          </thead>
          <tbody>';
		  foreach($fixture as $f)
		  {
		  echo '
            <tr>
              <td>'.$f['Time'].'</td>
              <td>'.$f['home_team_name'].'</td>
              <td>'.$f['away_team_name'].'</td>
            </tr>';
			}
          echo'</tbody>
        </table>
      </div>
      <div class="col-md-3"></div>
  </div>
    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>';
?>