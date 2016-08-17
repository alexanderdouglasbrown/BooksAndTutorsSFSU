<div class="container"> 
    <div class="row">
        <div class="col-sm-5">    
            <form class="form-horizontal" action="<?php echo URL; ?>signin/signincustomer" method="POST">
                <h4 class="title">Registered Customers</h4>  
                <div class="form-group">
                    <div class="form-group">
                        <label for='name' class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input class="form-control" type='text' name='email' id='email' value="" required />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for='name' class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input class="form-control" type='password' name='password' id='password' value="" required />
                        </div>
                    </div>
                    <div class="remember">
                        <?php
                        if (isset($_GET["msg"]) && $_GET["msg"] == 'failed') {
                            echo "<p><font color='red'>You entered an invalid SF State ID or Password.</font></p>";
                        }
                        ?>
<!--                        <p id="login-form-remember">
                            <label for="modlgn_remember"><a href="#">Forget Your Password? </a></label>
                        </p>-->
                        <input type="submit" name="signincustomer" value="Login" class="btn btn-primary pull-right">
                        <div class="clear"></div>                                       
                    </div>
                </div>
            </form>
            <br /><br />
        </div>
        <div class="col-sm-2"></div>
        <div class="col-sm-5">
            <h4 class="title">New Customers</h4>
            <p>By Registering, you agree that you've read and accepted our  <a href="<?php echo URL . 'signin/useragreement' ?>">User Agreement</a>, 
                you're at least 18 years old, and you consent to our <a href="<?php echo URL . 'signin/privacynotice' ?>">Privacy Notice</a>.</p>
            <div class="button1">                
                <a href="<?php echo URL; ?>customers"><input type="submit" name="Submit" value="Create an Account" class="btn btn-default pull-right"></a>
            </div>
        </div>
    </div>
</div>