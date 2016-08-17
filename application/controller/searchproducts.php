<?php

if (!isset($_SESSION)) {
    session_start();
}
?> 

<?php

/**
 * Class Home
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Searchproducts extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index() {
        $categories = $this->homemodel->getAllCategories();
        $searchword = '%' . $_GET["searchinput"] . '%';
        $category_id = $_GET["category_id"];
        $_SESSION['searchword'] = '%' . $_GET["searchinput"] . '%';
        $_SESSION['category_id'] = $_GET["category_id"];
        if ($searchword != "") {
            if ($category_id == 0) {
                $products = $this->searchproductsmodel->searchProductW($searchword);
            } else {
                $products = $this->searchproductsmodel->searchProductWc($searchword, $category_id);
            }
        }
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function getuserProducts($customer_id) {
        $categories = $this->homemodel->getAllCategories();
        $products = $this->searchproductsmodel->getuserProducts($customer_id);
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/products/userproducts.php';
        require APP . 'view/_templates/footer.php';
    }

}
