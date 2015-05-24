 <div height="200">
      <div class="col-xs-12" style="text-align:center !important;float:left;">
         <h1> <span class="label label-danger" >Select Active Tournament </span> </h1>
      </div>
    </div>

    <div>
        <table>
            <tr height="20"></tr>
            <form method="post" action="activeTournament_proc">
                <?php 
                foreach($tournaments as $a)
                {
                    echo '<tr>
                        <td width="510"></td>
                        <td>
                            <h2><span class="label label-primary"><input type="radio" name="tournament" value='.$a['tournament_id'].'> '.$a['tournament_name'].'</span></h2><br>
                        </td>
                    </tr>';
                }
                    
                    echo '<tr>
                        <td></td>
                        <td>
                            <input type="submit" name="submit" id="submit" value="Submit" class="btn btn-info pull-right">
                        </td>>
                    </tr>
                    <tr height="25"></tr>';
                ?>
            </form>
        </table>
    </div>

    <script src="js/jquery-1.11.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
