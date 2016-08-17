<div class="container">
    <h3 class="title"><?php
        if (isset($product->name))
            echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8');
        ?>
    </h3>
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm-4">
            <div class="row carousel-holder">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <?php
                        if ((isset($product->img2) && $product->img2 != "") || (isset($product->img3) && $product->img3 != "") || (isset($product->img4) && $product->img4 != ""))
                            echo "<li data-target = '#carousel-example-generic' data-slide-to = '0' class='active'></li>";
                        if (isset($product->img2) && $product->img2 != "")
                            echo "<li data-target = '#carousel-example-generic' data-slide-to = '1'></li>";
                        if (isset($product->img3) && $product->img3 != "")
                            echo "<li data-target = '#carousel-example-generic' data-slide-to = '2'></li>";
                        if (isset($product->img4) && $product->img4 != "")
                            echo "<li data-target = '#carousel-example-generic' data-slide-to = '3'></li>";
                        ?>
                    </ol>
                    <div class="carousel-inner">
                        <?php
                        if (isset($product->img1) && $product->img1 != "") {
                            echo "<div class='item active'>";
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '" class = "slide-image img-responsive"/>';
                            echo "</div>";
                        }
                        ?>
                        <?php
                        if (isset($product->img2) && $product->img2 != "") {
                            echo "<div class='item'>";
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img2) . '" class = "slide-image img-responsive"/>';
                            echo "</div>";
                        }
                        ?>
                        <?php
                        if (isset($product->img3) && $product->img3 != "") {
                            echo "<div class='item'>";
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img3) . '" class = "slide-image img-responsive"/>';
                            echo "</div>";
                        }
                        ?>
                        <?php
                        if (isset($product->img4) && $product->img4 != "") {
                            echo "<div class='item'>";
                            echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img4) . '" class = "slide-image img-responsive"/>';
                            echo "</div>";
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-1"></div>
        <div class ="col-sm-5">
            <h4>
                <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>            
                <?php if ($product->category_id == 2) : ?>
                    / hour
                <?php endif; ?></h4>
            <?php if (isset($_SESSION['CurrentUser'])) : ?>
                <form action="<?php echo URL; ?>cart/additem" method="POST">
                <?php else : ?>
                    <form action="<?php echo URL; ?>signin" method="GET">
                    <?php endif; ?>                    
                    <?php if ($product->category_id != 2) : ?> 
                        <span class = "quantity"><?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?> available</span>
                        <br /> <br />
                        <label for='qty' >Quantity: </label>
                        <input type='text' name='qty' value="1" class="quantity-text" required />
                        <br />
                        <input type="hidden" name="pid" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                        <input type="submit" name="submit_add_item" value="Add to Cart" class = "btn btn-warning" />     
                    <?php endif; ?> 
                    <br /><br />
                    <p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>
                    <?php if (($tutors != NULL) && $product->category_id != 2): ?>
                        <p><strong>Recommended Tutors:</strong></p>
                        <table>
                        <tbody>
                            <?php foreach ($tutors as $tutor) { ?>
                                <tr class="tutor-image">
                                    <td style="text-align: center"><a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($tutor->product_id, ENT_QUOTES, 'UTF-8'); ?>">                                                            
                                            <?php
                                            if (isset($tutor->img1))
                                                echo '<img src="data:image/jpeg;base64,' . base64_encode($tutor->img1) . '"  />';
                                            ?>                                   
                                        </a></td>
                                    <td>
                                        <a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($tutor->product_id, ENT_QUOTES, 'UTF-8'); ?>">
                                            <?php if (isset($tutor->name)) echo htmlspecialchars($tutor->name, ENT_QUOTES, 'UTF-8'); ?>
                                        </a>
                                    </td>                                              
                                </tr>
                            <?php } ?>
                        <?php endif; ?>   
                    </tbody>
                        </table>
                </form> 
                <?php if ($product->category_id == 2) : ?>                    
                    <br />
                    <h3 class="title">Contact</h3>
                    <p>Please use the form below to contact this tutor</p>
                    <form class="form-horizontal" name="contactform" method="POST" action="<?php echo URL; ?>item/emailtutor">
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-10">
                                <input  class="form-control" type="text" name="first_name" maxlength="50" size="30" value = "<?php if (isset($customer->firstname)) echo htmlspecialchars($customer->firstname, ENT_QUOTES, 'UTF-8'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-10">
                                <input  class="form-control" type="text" name="last_name" maxlength="50" size="30" value = "<?php if (isset($customer->lastname)) echo htmlspecialchars($customer->lastname, ENT_QUOTES, 'UTF-8'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input  class="form-control" type="text" name="email" maxlength="80" size="30" value = "<?php if (isset($customer->email)) echo htmlspecialchars($customer->email, ENT_QUOTES, 'UTF-8'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10">
                                <input  class="form-control" type="text" name="telephone" maxlength="30" size="30" value = "<?php if (isset($customer->phone)) echo htmlspecialchars($customer->phone, ENT_QUOTES, 'UTF-8'); ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label  class="col-sm-2 control-label">Comments</label>
                            <div class="col-sm-10">
                                <textarea  class="form-control" name="comments" maxlength="1000" cols="25" rows="6" required></textarea>
                            </div>
                        </div>
                        <input type="submit" value="Submit" class="btn btn-primary pull-right">   
                    </form>           
                <?php endif; ?>
        </div>
        <div class="col-sm-1"></div>
    </div>
</div>