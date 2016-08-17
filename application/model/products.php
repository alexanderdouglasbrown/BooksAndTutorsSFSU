<?php

class ProductsModel {

    public $productsmodel = null;

    function __construct() {
        include_once APP . 'dbcalls/sqlcalls.php';
        $this->productsmodel = new Sqlcalls();
    }

    public function addProduct($customer_id, $name, $description, $price, $stock_qty, $category_id, $img1, $img2, $img3, $img4) {
        $parameters = array(':customer_id' => $customer_id,
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':stock_qty' => $stock_qty,
            ':category_id' => $category_id,
            ':img1' => $img1,
            ':img2' => $img2,
            ':img3' => $img3,
            ':img4' => $img4);
        return $this->productsmodel->addEntry("product", $parameters);
    }

    public function addTutor($customer_id, $product_id, $name, $description, $price, $img1) {
        $parameters = array(':customer_id' => $customer_id,
            ':product_id' => $product_id,
            ':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':img1' => $img1);
        return $this->productsmodel->addEntry("tutor", $parameters);
    }

    public function deleteProduct($table, $product_id) {
        $parameters = array(':id' => $product_id);
        return $this->productsmodel->deleteEntry($table, $parameters);
    }

    public function updateProduct($name, $description, $price, $stock_qty, $category_id, $product_id) {
        $val = array(':name' => $name,
            ':description' => $description,
            ':price' => $price,
            ':stock_qty' => $stock_qty,
            ':category_id' => $category_id);
        $target = array(':id' => $product_id);
        return $this->productsmodel->updateEntry("product", $val, $target);
    }

    public function updateTutor($name, $description, $price, $product_id) {
        $val = array(':name' => $name,
            ':description' => $description,
            ':price' => $price);
        $target = array(':product_id' => $product_id);
        return $this->productsmodel->updateEntry("tutor", $val, $target);
    }

    public function updateProductImg($imgnumber, $img, $product_id) {
        $val = array($imgnumber => $img);
        $target = array(':id' => $product_id);
        return $this->productsmodel->updateEntry("product", $val, $target);
    }

    public function updateProductQty($product_id, $new_qty) {
        $val = array(':stock_qty' => $new_qty);
        $target = array(':id' => $product_id);
        return $this->productsmodel->updateEntry("product", $val, $target);
    }

    public function getAllProducts() {
        $val = array(':id',
            ':customer_id',
            ':name',
            ':description',
            ':price',
            ':stock_qty',
            ':category_id',
            ':img1',
            ':img2',
            ':img3',
            ':img4');
        $target = array();
        return $this->productsmodel->getAllEntries("product", $val, $target);
    }

    public function getProduct($product_id) {
        $val = array(':id',
            ':customer_id',
            ':name',
            ':description',
            ':price',
            ':stock_qty',
            ':category_id',
            ':img1',
            ':img2',
            ':img3',
            ':img4');
        $target = array(':id' => $product_id);
        return $this->productsmodel->getEntry("product", $val, $target);
    }

    public function getProductbyname($name) {
        $val = array(':id',
            ':customer_id',
            ':name',
            ':description',
            ':price',
            ':stock_qty',
            ':category_id');
        $target = array(':name' => $name);
        return $this->productsmodel->getEntry("product", $val, $target);
    }

}
