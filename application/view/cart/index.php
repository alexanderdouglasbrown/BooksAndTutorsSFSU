<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h3 class="title">Shopping Cart</h3>
            <?php foreach ($products as $product) { ?>
                <div class="thumbnail">                                                                          
                    <div class="caption">
                        <a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">                            
                            <div class="search-image">
                                <?php
                                if (isset($product->img1))
                                    echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '" />';
                                ?>                                   
                            </div>
                            <div class="search-data">
                                <h4>
                                    <?php
                                    if (isset($product->name))
                                        echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8');
                                    ?></a></h4>
                                <form action="<?php echo URL; ?>cart/itemButton" method="POST">
                                    <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
                                    <br />
                                    <label for='pid' >Quantity </label>
                                    <input type='text' class="quantity-text" name='qty' id='qty' value=<?php echo $product->qty; ?> required />
                                    <br />
                                    <input type="hidden" name="pid" value=<?php echo $product->id; ?>>
                                    <input type="submit" name='Update' value="Update Qty" class="btn btn-default"/>
                                    <input type="submit" name='Delete' value="Delete" class="btn btn-danger"/>
                                </form>
                      <!--<p><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></p>-->
                            </div>
                    </div>
                </div>
                <!--</div>-->
            <?php } ?>

            <br />
            <form action="<?php echo URL; ?>payment" method="GET">
                <input type='submit' name='payment' value="Checkout" class="btn btn-primary pull-right" />
            </form>
        </div>
    </div>
</div>
