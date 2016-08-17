<div class="container">
    <h2>LIST OF ITEMS</h2>
    <!-- main content output -->
    <div class="box">
        <table style="width:20%">
            <tr>
                <td><form action="<?php echo URL; ?>home/sortbypriceAsc" method="POST">
                        <input type='submit' name='submit_sortbyprice_product' value="$ low/high" id="searchButton" />
                    </form></td>
                <td><form action="<?php echo URL; ?>home/sortbypriceDesc" method="POST">
                        <input type='submit' name='submit_sortbyprice_product' value="$ high/low" id="searchButton" />
                    </form></td>
            </tr>
        </table> 
        <table>
            <thead style="background-color: #ddd; font-weight: bold;">
                <tr>
                    <td>Image1</td>
                    <td>Item</td>
                    <td>Description</td>
                    <td>Price</td>
                    <td>Stock Quantity</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product) { ?>
                    <tr>
                        <td><?php if (isset($product->img1) && $product->img1 != "") echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '"  height="42" width="42" />'; ?></td>
                        <td><?php if (isset($product->name)) echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($product->description)) echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($product->price)) echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?></td>
                        <td><?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
