<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h3 class="title">Your Profile</h3>
            <form class = "form-horizontal" action="<?php echo URL; ?>customers/updatecustomer" method="POST">
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">First Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="firstname" value="<?php echo htmlspecialchars($customer->firstname, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Last Name</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="lastname" value="<?php echo htmlspecialchars($customer->lastname, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="email" value="<?php echo htmlspecialchars($customer->email, ENT_QUOTES, 'UTF-8'); ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="password" name="password" value="<?php echo htmlspecialchars($customer->password, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Phone Number</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="phone" value="<?php echo htmlspecialchars($customer->phone, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Street Address</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="street" value="<?php echo htmlspecialchars($customer->street, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">City</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="city" value="<?php echo htmlspecialchars($customer->city, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                    <label for='name' class="col-sm-2 control-label">Zip</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="zipcode" value="<?php echo htmlspecialchars($customer->zipcode, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                </div>
                <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer->id, ENT_QUOTES, 'UTF-8'); ?>" />
                <input type="submit" name="submit_update_customer" value="Update" class="btn btn-primary pull-right"/>
        </div>
        </form>
    </div>
</div>
</div>