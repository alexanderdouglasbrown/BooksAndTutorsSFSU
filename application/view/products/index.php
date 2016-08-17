<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <h3 class="title">Sell an Item</h3>
            <form class = "form-horizontal" action="<?php echo URL; ?>products/addproduct" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="customer_id" value= "<?php echo htmlspecialchars($_SESSION['CurrentUser'], ENT_QUOTES, 'UTF-8'); ?>" />
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Item</label>
                    <div class="col-sm-10">
                        <input type='text' class="form-control" name='name' id='name' value="" required />
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Price</label>
                    <div class="col-sm-4">
                        <input type='text' class="form-control" name='price' id='price' value="" required />
                    </div>
                    <label  class="col-sm-2 control-label">Quantity</label>
                    <div class="col-sm-4">
                        <input type='text' class="form-control" name='stock_qty' id='stock_qty' value="" required />
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                        <textarea rows="4" type='text' class="form-control" name='description' id='description' value="" required></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label  class="col-sm-2 control-label">Category</label>
                    <div class="col-sm-10">
                        <select name='category_id' class="sell-category" required>
                            <?php
                            foreach ($categories as $category) {
                                if (isset($category->name)) {
                                    echo "<option value =" . htmlspecialchars($category->id, ENT_QUOTES, 'UTF-8') . ">" . htmlspecialchars($category->name, ENT_QUOTES, 'UTF-8') . "</option>";
                                }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <hr />
                <div class="form-group">
                    <label  class="col-sm-3 control-label">Image 1 <span style="color:blue;visibility: hidden">(Optional)</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="imageToUpload1" id="imageToUpload1" required />
                    </div>
                </div>
                <div class="form-group">
                    <label for='image2' class="col-sm-3 control-label">Image 2 <span style="color:blue">(Optional)</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="imageToUpload2" id="imageToUpload2">
                    </div>
                </div>
                <div class="form-group">
                    <label for='image2' class="col-sm-3 control-label">Image 3 <span style="color:blue">(Optional)</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="imageToUpload3" id="imageToUpload3">
                    </div>
                </div>
                <div class="form-group">
                    <label for='image2' class="col-sm-3 control-label">Image 4 <span style="color:blue">(Optional)</span></label>
                    <div class="col-sm-9">
                        <input type="file" name="imageToUpload4" id="imageToUpload4">
                    </div>
                </div>
                <input type='submit' name='submit_add_product' value='Submit' class="btn btn-primary pull-right" />    
            </form>
        </div>
    </div>
</div>
