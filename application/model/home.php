
<?php

class HomeModel {

    public $homemodel = null;

    function __construct() {

        include_once APP . 'dbcalls/sqlcalls.php';
        $this->homemodel = new Sqlcalls();
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
        return $this->homemodel->getAllEntries("product", $val, $target);
    }
    public function getAllCategories() {
        $val = array(':id', ':name');
        $target = array();
        return $this->homemodel->getAllEntries("category", $val, $target);
    }

    public function sortby($column, $order) {
        $val = array(':id',
            ':customer_id',
            ':name',
            ':description',
            ':price',
            ':stock_qty',
            ':category_id',
            ':img1');
        $target = array();
        return $this->homemodel->getAllEntriesAdv2("product", $val, $target, $column, $order);
    }

    public function sortbyW($column, $order, $searchword) {
        $val = array(':id',
            ':customer_id',
            ':name',
            ':description',
            ':price',
            ':stock_qty',
            ':category_id',
            ':img1');
        $target = array(':name' => $searchword);
        return $this->homemodel->getAllEntriesAdv2("product", $val, $target, $column, $order);
    }

    public function sortbyWc($column, $order, $searchword, $category_id) {
        $val = array(':id',
            ':customer_id',
            ':name',
            ':description',
            ':price',
            ':stock_qty',
            ':category_id',
            ':img1');
        $target = array(':name' => $searchword, ':category_id' => $category_id);
        return $this->homemodel->getAllEntriesAdv2("product", $val, $target, $column, $order);
    }

    public function sortbyBestmatch($column, $order) {
        $val = array(':id',
            ':customer_id',
            ':name',
            ':description',
            ':price',
            ':stock_qty',
            ':category_id',
            ':img1');
        $target = array();
        return $this->homemodel->getAllEntriesAdv2("product", $val, $target, $column, $order);
    }

    public function sortbyBestmatchW($column, $order, $searchword) {
        $val = array(':id',
            ':customer_id',
            ':name',
            ':description',
            ':price',
            ':stock_qty',
            ':category_id',
            ':img1');
        $target = array(':name' => $searchword);
        return $this->homemodel->getAllEntriesAdv2("product", $val, $target, $column, $order);
    }

    public function sortbyBestmatchWc($column, $order, $searchword, $category_id) {
        $val = array(':id',
            ':customer_id',
            ':name',
            ':description',
            ':price',
            ':stock_qty',
            ':category_id',
            ':img1');
        $target = array(':name' => $searchword, ':category_id' => $category_id);
        return $this->homemodel->getAllEntriesAdv2("product", $val, $target, $column, $order);
    }

}
