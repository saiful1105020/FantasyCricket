	<?php
		if($success==true)
		{
			echo '<div class="alert alert-success">
				<strong><span class="glyphicon glyphicon-ok"></span> Tournament Created Successfully!!! </strong>
			 </div>';
		}
		else
		{
			echo '<div class="alert alert-danger">
				<strong><span class="glyphicon glyphicon-remove"></span> Database Error. Try Again... </strong>
			 </div>';
		}

	?>

	</body>
</html>