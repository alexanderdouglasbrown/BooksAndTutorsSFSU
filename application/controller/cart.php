        
<?php

class Cart extends Controller {    

    public function index() {
        $categories = $this->homemodel->getAllCategories();
        require APP . 'view/_templates/header.php';        
        $cart_items = $this->cartmodel->getCartItems($_SESSION['CurrentUser']); 
        $products = array();
        foreach ($cart_items as $item) {
            $nextProduct = $this->itemmodel->getProduct($item->product_id);
            $nextProduct->qty = $item->item_qty;
            array_push($products, $nextProduct);
        }
        require APP . 'view/cart/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function createInvoice() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_POST["submit_create_invoice"])) {
            $cart_items = $this->cartmodel->getCartItems($_SESSION['CurrentUser']);
            $invoiceData = Cart::calcInvoice($cart_items, $this);

            if ($invoiceData['total'] > 0) {
                //TODO: create notice that cart is empty
                $this->cartmodel->createInvoice($_SESSION['CurrentUser'], $invoiceData);
            }
        }
        header('location: ' . URL . 'cart/index');
    }

    public function itemButton() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_POST["Update"])) {
            $this->cartmodel->updateCartItem($_SESSION['CurrentUser'], $_POST["pid"], $_POST["qty"]);
        } else if (isset($_POST["Delete"])) {
            $this->cartmodel->deleteCartItem($_SESSION['CurrentUser'], $_POST["pid"]);
        }
        header('location: ' . URL . 'cart/index');
    }

    public function addItem() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_POST["submit_add_item"])) {
            $this->cartmodel->addCartItem($_SESSION['CurrentUser'], $_POST["pid"], $_POST["qty"]);
            header('location: ' . URL . 'cart/index');
        }
        if (isset($_POST["submit_buyitnow"])) {
            $this->cartmodel->addCartItem($_SESSION['CurrentUser'], $_POST["pid"], $_POST["qty"]);
            header('location: ' . URL . 'cart/index');
        }
    }

    public function removeItem() {
        if (!isset($_SESSION)) {
            session_start();
        }
        // if we have an id of a song that should be deleted
        if (isset($_POST["submit_delete_item"])) {
            $this->cartmodel->deleteCartItem($_SESSION['CurrentUser'], $_POST["pid"]);
        }
        header('location: ' . URL . 'cart/index');
    }

    public static function calcInvoice($cart_items, $thisClass) {
        $time_stamp = date("Y-m-d H:i:s");
        $invoice_data = array("date" => $time_stamp, "total" => 0, "shipping" => 0, "tax" => 0, "g_total" => 0);
        foreach ($cart_items as $item) {
            //TODO: check if item is out of stock, decriment
            //TODO: need to update shipping cost
            //$invoice_data["shipping"] = 1;
            //Add up item costs
            $product = $thisClass->itemmodel->getProduct($item->product_id);
            $invoice_data["total"] += $product->price * $item->item_qty;
        }

        //TODO: check proper tax value
        $invoice_data["tax"] = $invoice_data["total"] * 0.0;
        $invoice_data["g_total"] = $invoice_data["total"] + $invoice_data["shipping"] + $invoice_data["tax"];

        return $invoice_data;
    }

}

?>
