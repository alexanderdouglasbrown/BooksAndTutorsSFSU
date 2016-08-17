<!-- main content output -->
<div class="box container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h3 class="title">Your Items for Sale</h3>
            <br />
            <table class="table">
                <thead style="background-color: #ddd; font-weight: bold;">
                    <tr>
                        <td></td>                
                        <td>Item</td>          
                        <td>Price</td>
                        <td>Quantity</td>
                        <td></td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($products as $product) { ?>
                        <tr>
                            <td>
                                <a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <?php if (isset($product->img1) && $product->img1 != "") echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '"  height="42px" />'; ?>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">
                                    <?php if (isset($product->name)) echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>
                                </a>
                            </td>
                            <td>
                                <?php if (isset($product->price)) echo '$' . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td>
                                <?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?>
                            </td>
                            <td>
                                <a href="<?php echo URL . 'products/editproduct/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo URL . 'products/deleteproduct/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
