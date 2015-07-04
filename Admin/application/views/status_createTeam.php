	<?php
		if($success==true)
		{
			echo '<div class="alert alert-success">
				<strong><span class="glyphicon glyphicon-ok"></span> Team Created Successfully!!! </strong>
			 </div>';
		}
		else
		{
			echo '<div class="alert alert-danger">
				<strong><span class="glyphicon glyphicon-remove"></span> Team Already Exists. Try Again... </strong>
			 </div>';
		}

	?>

	</body>
</html>