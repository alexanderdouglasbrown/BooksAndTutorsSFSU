<?php

class SearchProductsModel {

    public $searchproductsmodel = null;

    function __construct() {
        include_once APP . 'dbcalls/sqlcalls.php';
        $this->searchproductsmodel = new Sqlcalls();
    }

    public function searchProductW($searchword) {
        $val = array(':id',
            ':customer_id',
            ':name',
            ':description',
            ':price',
            ':stock_qty',
            ':category_id',
            ':img1');
        $target = array(':name' => $searchword);
        return $this->searchproductsmodel->getAllEntriesAdv("product", $val, $target);
    }

    public function searchProductWc($searchword, $category_id) {
        $val = array(':id',
            ':customer_id',
            ':name',
            ':description',
            ':price',
            ':stock_qty',
            ':category_id',
            ':img1');
        $target = array(':name' => $searchword,
            ':category_id' => $category_id);
        return $this->searchproductsmodel->getAllEntriesAdv("product", $val, $target);
    }

    public function getuserProducts($customer_id) {
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
        $target = array(':customer_id' => $customer_id);
        return $this->searchproductsmodel->getAllEntries("product", $val, $target);
    }

}
