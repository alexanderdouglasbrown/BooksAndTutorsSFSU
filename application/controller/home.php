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
class Home extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/home/index (which is the default page btw)
     */
    public function index() {
        $categories = $this->homemodel->getAllCategories();
        $products = $this->homemodel->getAllProducts();
        $products = $this->homemodel->sortby('id', 'DESC');
        $_SESSION['searchword'] = "";
        $_SESSION['category_id'] = 0;
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';         
        require APP . 'view/_templates/footer.php';       
    }

    public function sort() {
        $categories = $this->homemodel->getAllCategories();
        $searchword = $_SESSION['searchword'];
        $category_id = $_SESSION['category_id'];
        $sortby = $_GET["sortby"];

        if ($sortby == "best-match") {
            if ($searchword == "" && $category_id == 0) {
                $products = $this->homemodel->sortbyBestmatch('name', 'ASC');
            } elseif ($searchword != "" && $category_id == 0) {
                $products = $this->homemodel->sortbyBestmatchW('name', 'ASC', $searchword);
            } elseif ($searchword != "" && $category_id != 0) {
                $products = $this->homemodel->sortbyBestmatchWc('name', 'ASC', $searchword, $category_id);
            }
        }
        if ($sortby == "date-old-new") {
            if ($searchword == "" && $category_id == 0) {
                $products = $this->homemodel->sortby('id', 'ASC');
            } elseif ($searchword != "" && $category_id == 0) {
                $products = $this->homemodel->sortbyW('id', 'ASC', $searchword);
            } elseif ($searchword != "" && $category_id != 0) {
                $products = $this->homemodel->sortbyWc('id', 'ASC', $searchword, $category_id);
            }
        }
        if ($sortby == "date-new-old") {
            if ($searchword == "" && $category_id == 0) {
                $products = $this->homemodel->sortby('id', 'DESC');
            } elseif ($searchword != "" && $category_id == 0) {
                $products = $this->homemodel->sortbyW('id', 'DESC', $searchword);
            } elseif ($searchword != "" && $category_id != 0) {
                $products = $this->homemodel->sortbyWc('id', 'DESC', $searchword, $category_id);
            }
        }
        if ($sortby == "price-low-high") {
            if ($searchword == "" && $category_id == 0) {
                $products = $this->homemodel->sortby('price', 'ASC');
            } elseif ($searchword != "" && $category_id == 0) {
                $products = $this->homemodel->sortbyW('price', 'ASC', $searchword);
            } elseif ($searchword != "" && $category_id != 0) {
                $products = $this->homemodel->sortbyWc('price', 'ASC', $searchword, $category_id);
            }
        }
        if ($sortby == "price-high-low") {
            if ($searchword == "" && $category_id == 0) {
                $products = $this->homemodel->sortby('price', 'DESC');
            } elseif ($searchword != "" && $category_id == 0) {
                $products = $this->homemodel->sortbyW('price', 'DESC', $searchword);
            } elseif ($searchword != "" && $category_id != 0) {
                $products = $this->homemodel->sortbyWc('price', 'DESC', $searchword, $category_id);
            }
        }
        require APP . 'view/_templates/header.php';
        require APP . 'view/home/index.php';
        require APP . 'view/_templates/footer.php';
    }

}
