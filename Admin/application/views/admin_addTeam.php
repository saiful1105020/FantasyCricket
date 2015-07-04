

    <div height="100">
      <div class="col-xs-12" style="text-align:center !important;float:left;">
         <h1> <span class="label label-danger" >Add A New Team </span> </h1>
      </div>
    </div>

    <div>
      <form method="POST" action="createTeam">
     <table style="width:90%">
      <?php
        if($players==0)
        {
          echo '
                <tr height="60"></tr>
                <tr>
                <td ></td>
                <td><strong>Team Name: <br></strong><input type="text" name="team_name" required></td>                
                <td width="100"><strong>No. of Team Memeber: </strong><br> <input type="number" name="players" min="0" required></td>
                <td width="200">
                    <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info">
                </td>
                </tr>';
        }?>
      </form>
      <form method="POST" action="createTeam_proc">
      <?php
          if($players>0){
          echo '<tr height="60"></tr>
          <tr>
          <td ></td>
          <td><strong>Team Name: </strong><h4 style="color:#0000CC">'.$team_name.'</h4></td>
          <td width="100"><strong>No. of Team Memeber: </strong><h4 style="color:#0000CC">'.$players.'</td>
          </tr>';}

      for($count=1;$count<=$players;$count++){
        $name_var="name".$count;
        $cat_var="cat".$count;
        $price_var="price".$count;

        echo'<tr height="30"></tr>
        <tr>
          <td width="30"></td>
          <td> '.$count.' </td>
          <td>Player Name: <br><input type="text" name= '.$name_var.' required></td>
          <td><br>
            <div class="dropdown" >
              <select name='.$cat_var.' role="menu" aria-labelledby="dLabel" required width="50">
                <option value="BAT">Batsman</option>
                <option value="BOWL">Bowler</option>
                <option value="ALL">All-Rounder</option>
                <option value="WK">Wicket-Keeper</option>
              </select>
            </div>
          </td>
          <!--<td>Category: <br><input type="text" name='.$cat_var.' required></td> -->
          <td>Price: <br><input type="number" name='.$price_var.' min="500" max="1500" required></td>
        </tr>';
      }?>
     <!--  <tr height="30"></tr>
      <tr>
        <td width="30"></td>
        <td>Player Name: <input type="text"></td>
        <td>Category: <input type="text"></td>    
        <td>Price: <input type="text"></td>
      </tr>
      <tr height="30"></tr>
      <tr>
        <td width="30"></td>
        <td>Player Name: <input type="text"></td>
        <td>Category: <input type="text"></td>    
        <td>Price: <input type="text"></td>
      </tr>-->

      <tr height="30"></tr>
      <tr>         
        <td width="200"></td>
        <td width="200"></td>
        <?php
        if($players>0)
        {
          echo '<td width="200">
            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
          </td>';
        }
        ?>
      </tr>
      <tr height="30"></tr>
    </table>
  </form>
    </div>


  </body>
</html>
