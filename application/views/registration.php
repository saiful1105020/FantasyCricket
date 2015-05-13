

 <div class="container">
    <div class="row">
        <form name="registrationForm" method = "post" action="<?php echo site_url('home/register_proc'); ?>" role="form">
            <div class="col-lg-6">
                <div class="well well-sm"><strong><span class="glyphicon glyphicon-asterisk"></span>Required Field</strong></div>
                <div class="form-group">
                    <label for="InputName">Enter Name</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="user_name" id="InputName" placeholder="Enter Name" required>
                        <span class="input-group-addon"><span class="glyphicon glyphicon-asterisk"></span></span>
                    </div>
                </div>
                <div class="form-group"  style= "float:left">
                    <label for="InputCountry">Country</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="country" id="InputCountry" placeholder="Enter Country" >
                        <span class="input-group-addon"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="InputDate">Enter Year</label>
                    <div class="input-group">
                        <input type="date" class="form-control" id="InputDate" name="birthday" placeholder="Enter Birthdate" >
                        <span class="input-group-addon"></span>
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



<script type="text/javascript" src="<?php echo base_url("assets/js/jquery-1.11.2.min.js"); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/js/bootstrap.js"); ?>"></script>
</body>

</html>