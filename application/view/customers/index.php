<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h3 class="title">Account Registration</h3>
            <br />
            <form name="customer_form" class="form-horizontal" action="<?php echo URL; ?>customers/addcustomer" method="POST">
                <h4 class="title">About You</h4>
                <br />
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type='text' name='firstname' id='firstname' value="" required /> 
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type='text' name='lastname' id='lastname' value="" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input class="form-control" type='text' name='phone' id='phone' value="" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" type='text' name='email' id='email' value="" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type='password' name='password' id='password' value="" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Verify Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type='password' name='confirmpw' id='confirmpw' value="" required />
                    </div>
                </div>
                <hr />
                <h4 class="title">Shipping Information</h4>
                <br />
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Street Address</label>
                    <div class="col-sm-10">
                        <input class="form-control" type='text' name='street' id='street' value="" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">City</label>
                    <div class="col-sm-4">
                        <input class="form-control" type='text' name='city' id='city' value="" required />
                    </div>
                    <label for='name' class="col-sm-2 control-label">Zip</label>
                    <div class="col-sm-4">
                        <input class="form-control" type='text' name='zipcode' id='zipcode' value="" required />
                    </div>
                </div>
                <input type='submit' name='submit_add_customer' value='Submit' class="btn btn-primary" onclick="validateEmail()"/>
            </form>
        </div>
    </div>
</div>

<!-- Script that validates password and email -->
<script>
    var password = document.getElementById("password");
    var confirm_password = document.getElementById("confirmpw");
    function validatePassword() {
        if (password.value !== confirm_password.value) {
            confirm_password.setCustomValidity("Passwords must match!");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

    function validateEmail() {
        var email = document.getElementById("email");
        var domain1 = /^\w+([-+.]\w+)*@mail.sfsu.edu$/; // accepts common characters before @ symbol
        var domain2 = /^\w+([-+.]\w+)*@sfsu.edu$/;
        if (email.value.match(domain1) || email.value.match(domain2)) {
            email.setCustomValidity('');
        } else {
            email.setCustomValidity("Email must be from SFSU!")
        }
        email.onchange = validateEmail;
    }
</script>
