<?php

class ItemModel {

    public $itemmodel = null;

    function __construct() {
        include_once APP . 'dbcalls/sqlcalls.php';
        $this->itemmodel = new Sqlcalls();
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
        return $this->itemmodel->getEntry("product", $val, $target);
    }

    public function getTutors($column, $order, $searchword) {
        $searchword = '%' . $searchword . '%';
        $val = array(':customer_id',
            ':product_id',
            ':name',
            ':description',
            ':price',
            ':img1');
        $target = array(':name' => $searchword);
        return $this->itemmodel->getAllEntriesAdv2("tutor", $val, $target, $column, $order);
    }

}
