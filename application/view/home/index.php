<!-- Page Content -->
<div class="container">
    <div class="row">
        <div>
            <?php if ((isset($_GET["searchinput"]) != "") xor ( isset($_GET["sortby"]) != "")) : ?>
                <label class='home-label'>Showing results for <span style="color:#E2AF2D">"<?php echo htmlspecialchars(str_replace("%", "", $_SESSION['searchword'])) ?>"</span></label>
                <form action="<?php echo URL; ?>home/sort" method="GET" class="nav-form pull-right">
                    <label class='home-label'>Sort by</label>
                    <select name='sortby' class="sort-select" onchange='this.form.submit()' id="sort_menu">
                        <option <?php
                        if (isset($_GET['sortby']) && $_GET['sortby'] == "best-match") {
                            echo "selected='selected'";
                        }
                        ?> value="best-match">Best match</option>
                        <option <?php
                        if (isset($_GET['sortby']) && $_GET['sortby'] == "date-old-new") {
                            echo "selected='selected'";
                        }
                        ?> value="date-old-new">Date: Oldest to Newest</option>
                        <option <?php
                        if (isset($_GET['sortby']) && $_GET['sortby'] == "date-new-old") {
                            echo "selected='selected'";
                        }
                        ?> value="date-new-old">Date: Newest to Oldest</option>
                        <option <?php
                        if (isset($_GET['sortby']) && $_GET['sortby'] == "price-low-high") {
                            echo "selected='selected'";
                        }
                        ?> value="price-low-high">Price: Lowest to Highest</option>
                        <option <?php
                        if (isset($_GET['sortby']) && $_GET['sortby'] == "price-high-low") {
                            echo "selected='selected'";
                        }
                        ?> value="price-high-low">Price: Highest to Lowest</option>
                    </select>
                    <noscript><input type='submit' name='submit_sort' value="Submit" id="searchButton" /></noscript>
                </form>
            <?php else : ?>
                <h3 class='title'>New at Books and Tutors SFSU</h3>
            <?php endif ?>

        </div>
    </div>
    <div class="row">
        <?php
        if (isset($_GET["s"])) {
            $s = $_GET["s"];
        } else {
            $s = 0;
        }
        $f = $s + 11;
        $activepage = $s;
        $len = count($products);
        foreach (array_slice($products, $s) as $product) {
            if ($s > $f)
                break;
            if ($product->stock_qty > 0) {
                ?>
                <div class="col-sm-6 col-lg-4">
                        <?php if ($product->category_id != 2) : ?>
                        <div class="thumbnail">    
                            <?php else : ?>
                            <div class="thumbnail tutor-back">  
        <?php endif; ?>
                            <div class="caption">
                                <a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">                            
                                    <div class="search-image">
                                        <?php
                                        if (isset($product->img1))
                                            echo '<img src="data:image/jpeg;base64,' . base64_encode($product->img1) . '" />';
                                        ?>                                   
                                    </div></a>
                                <div class="search-data">
                                    <a href="<?php echo URL . 'item/showitem/' . htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>">
                                        <h5>
        <?php if ($product->category_id == 2) : ?>
                                                <span class="tutor-tag">
                                                    Tutor: 
                                                </span>
                                            <?php endif; ?>
                                            <?php
                                            if (isset($product->name))
                                                echo htmlspecialchars($product->name, ENT_QUOTES, 'UTF-8');
                                            ?></a></h5>
                                    <h5>
                                        <?php if (isset($product->price)) echo "$" . htmlspecialchars($product->price, ENT_QUOTES, 'UTF-8'); ?>
                                    <?php if ($product->category_id == 2) : ?>
                                            / hour</h5>
        <?php else : ?>
                                        </h5>
                                        <span class = "quantity"><?php if (isset($product->stock_qty)) echo htmlspecialchars($product->stock_qty, ENT_QUOTES, 'UTF-8'); ?> available</span>
                                            <?php if (isset($_SESSION['CurrentUser'])) : ?>
                                            <form action="<?php echo URL; ?>cart/additem" method="POST">
                                                <?php else : ?>
                                                <form action="<?php echo URL; ?>signin">
            <?php endif; ?>
                                                <br />
                                                <input type="hidden" name="pid" value="<?php echo htmlspecialchars($product->id, ENT_QUOTES, 'UTF-8'); ?>" />
                                                <input type="hidden" name="qty" value= 1 />
                                                <input type="submit" name="submit_buyitnow" value="Add to Cart" class = "btn btn-warning"/>
                                            </form>
        <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                $s++;
            }
            ?>
        </div>
        <br />
    </div>   
    <div class="text-center">
        <nav aria-label="Page navigation">
            <ul class="pagination"> 
                
                 <?php
                 $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                for ($x = 0; $x < ceil($len/12); $x++) {                    
                    if ($x == $activepage/12){  
                        echo "<li class='page-item active";
                        echo "'><a class='page-link'";
                    }else{
                        echo "<li class='page-item";
                        echo "'><a class='page-link'";
                    }
                    echo " href='" . $actual_link . "&s=" . $x*12 . "'>";
                    echo $x+1;
                    echo "</a></li>";            
                }
                ?>                                               
            </ul>
        </nav>                
    </div
   