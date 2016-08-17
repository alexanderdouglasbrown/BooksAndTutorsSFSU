<?php

class CartModel {

    public $cartmodel = null;

    function __construct() {

        include_once APP . 'dbcalls/sqlcalls.php';
        $this->cartmodel = new Sqlcalls();
    }

    public function createInvoice($usr_id, $invoice_data) {
        $cid = $this->getUserCart($usr_id);

        //add an invoice entry to the invoice table                
        $parameters = array(':customer_id' => $usr_id,
            ':cart_id' => $cid,
            ':order_date' => $invoice_data['date'],
            ':total' => $invoice_data['total'],
            ':shipping_cost' => $invoice_data['shipping'],
            ':tax' => $invoice_data['tax'],
            ':grand_total' => $invoice_data['g_total']);
        $this->cartmodel->addEntry("invoice", $parameters);

        //make the cart an invoice            
        $tar = array(':id' => $cid);
        $val = array(':name' => "invoice");
        return $this->cartmodel->updateEntry("cart", $val, $tar);
    }

    public function getUserCart($usr_id) {
        $val = array(":id");
        $target = array(":name" => "current", ":customer_id" => $usr_id);
        $cid = $this->cartmodel->getEntry("cart", $val, $target);

        if ($cid == NULL) {
            $val2 = array(":id");
            $target2 = array();
            $max_cid = count($this->cartmodel->getAllEntries("cart", $val2, $target2));
            $cid = $max_cid + 1;
            $parameters3 = array(':id' => $cid, ':customer_id' => $usr_id, ':name' => "current");
            $this->cartmodel->addEntry("cart", $parameters3);
            return $cid;
        } else {
            return $cid->id;
        }
    }

    public function addCartItem($uid, $pid, $qty) {
        $cid = $this->getUserCart($uid);

        $val = array(":cart_id", ":product_id", ":item_qty");
        $target = array(":cart_id" => $cid, ":product_id" => $pid);
        $checkforprod_incart = $this->cartmodel->getEntry("cart_item", $val, $target);
        if (isset($checkforprod_incart->cart_id)) {
            $newqty = $checkforprod_incart->item_qty + $qty;
            $target = array(":cart_id" => $cid, ":product_id" => $pid);
            $val = array(":item_qty" => $newqty);
            return $this->cartmodel->updateEntry("cart_item", $val, $target);            
        } else {            
            $parameters = array(':cart_id' => $cid, ':product_id' => $pid, ':item_qty' => $qty);
            return $this->cartmodel->addEntry("cart_item", $parameters);
        }
    }

    public function deleteCartItem($uid, $pid) {
        $cid = $this->getUserCart($uid);
        $pars = array(":cart_id" => $cid, ":product_id" => $pid);
        return $this->cartmodel->deleteEntry("cart_item", $pars);
    }

    public function getCartItems($uid) {
        $cid = $this->getUserCart($uid);
        $val = array(":cart_id", ":product_id", ":item_qty");
        $target = array(":cart_id" => $cid);
        return $this->cartmodel->getAllEntries("cart_item", $val, $target);
    }

    public function getCartItemsCID($cid) {
        $val = array(':cart_id', ':product_id', ':item_qty');
        $target = array(':cart_id' => $cid);
        return $this->cartmodel->getAllEntries("cart_item", $val, $target);
    }

    public function getAmountOfCartItems($cid) {
        return $this->cartmodel->getAmountOfCartItems($cid);
    }

    public function updateCartItem($uid, $pid, $qty) {
        $cid = $this->getUserCart($uid);
        $target = array(":cart_id" => $cid, ":product_id" => $pid);
        $val = array(":item_qty" => $qty);
        return $this->cartmodel->updateEntry("cart_item", $val, $target);
    }

}
