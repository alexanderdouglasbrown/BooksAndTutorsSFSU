<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h3 class="title">Update an Item</h3>  
            <form class = "form-horizontal" action="<?php echo URL; ?>products/updateproduct" method="POST">
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Item</label>
                    <div class="col-sm-10">
                        <input class="form-control" type="text" name="name" value="<?php echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                </div>

                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="price" value="<?php echo htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                    <label for='name' class="col-sm-2 control-label">Quantity</label>
                    <div class="col-sm-4">
                        <input class="form-control" type="text" name="stock_qty" value="<?php echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?>" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="4" type="text" name="description" required><?php echo htmlspecialchars($product->description, ENT_QUOTES, 'UTF-8'); ?></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for='name' class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select name='category_id' class="sell-category" required>
                            <?php
                            foreach ($categories as $category) {
                                if (isset($category->name)) {
                                    echo "<option value =" . htmlspecialchars($category->id, ENT_QUOTES, 'UTF-8') . " ";
                                    if ($product->category_id == $category->id){
                                        echo "selected";
                                    }
                                    echo ">". htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8') . "</option>";                                         
                                }  
                            }
                            ?>                            
                        </select>
                    </div>
                </div>
                <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                <input type="submit" name="submit_update_product" value="Update" class="btn btn-primary center-block" />
            </form>
            <div class="clearfix"></div>
            <hr>
            <div class="col-sm-12">
                <form action="<?php echo URL; ?>products/updateproductImg1" method="POST" enctype="multipart/form-data">
                    <label for='image1' >Image 1</label>
                    <input type="file" name="imageToUpload1" id="imageToUpload1"required />
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                    <input type="submit" name="submit_update_productImg1" value="Update" class = "btn btn-warning btn-xs img-update" />
                </form>
                <br />
                <form action="<?php echo URL; ?>products/updateproductImg2" method="POST" enctype="multipart/form-data">
                    <label for='image2' >Image 2 <span style="color:blue">(Optional)</span></label>
                    <input type="file" name="imageToUpload2" id="imageToUpload2">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                    <input type="submit" name="submit_update_productImg2" value="Update" class = "btn btn-warning btn-xs img-update" />
                </form>
                <br />
                <form action="<?php echo URL; ?>products/updateproductImg3" method="POST" enctype="multipart/form-data">
                    <label for='image3' >Image 3 <span style="color:blue">(Optional)</span></label>
                    <input type="file" name="imageToUpload3" id="imageToUpload3">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                    <input type="submit" name="submit_update_productImg3" value="Update" class = "btn btn-warning btn-xs img-update" />
                </form>
                <br />
                <form action="<?php echo URL; ?>products/updateproductImg4" method="POST" enctype="multipart/form-data">
                    <label for='image4' >Image 4 <span style="color:blue">(Optional)</span></label>
                    <input type="file" name="imageToUpload4" id="imageToUpload4">
                    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                    <input type="submit" name="submit_update_productImg4" value="Update" class = "btn btn-warning btn-xs img-update" />
                </form>
            </div>
        </div>
    </div>
</div>
