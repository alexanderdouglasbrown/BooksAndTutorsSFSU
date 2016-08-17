 

<?php

class Payment extends Controller {

    public function index() {
        if (!isset($_SESSION)) {
            session_start();
        }
        $categories = $this->homemodel->getAllCategories();
        $customer = $this->customermodel->getCustomer('customer', $_SESSION['CurrentUser']);
        $cart_items = $this->cartmodel->getCartItems($_SESSION['CurrentUser']);
        $products = $this->getProducts($cart_items);

        require APP . 'controller/cart.php';
        $invoiceData = Cart::calcInvoice($cart_items, $this);

        require APP . 'view/_templates/header.php';
        require APP . 'view/payment/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function getProducts($cart_items) {
        if (!isset($_SESSION)) {
            session_start();
        }
        $products = array();
        foreach ($cart_items as $item) {
            $nextProduct = $this->itemmodel->getProduct($item->product_id);
            if ($nextProduct->stock_qty >= $item->item_qty) {
                $nextProduct->qty = $item->item_qty;
            } else {
                $nextProduct->qty = $nextProduct->stock_qty;
                $item->item_qty = $nextProduct->stock_qty;
                $this->cartmodel->updateCartItem($_SESSION['CurrentUser'], $item->product_id, $nextProduct->stock_qty);
                $nextProduct->missing = True;
            }
            array_push($products, $nextProduct);
        }
        return $products;
    }

    public function createInvoice() {
        if (!isset($_SESSION)) {
            session_start();
        }
        if (isset($_POST["submit_create_invoice"])) {
            $cart_items = $this->cartmodel->getCartItems($_SESSION['CurrentUser']);

            $products = $this->getProducts($cart_items);

            require APP . 'controller/cart.php';
            $invoiceData = Cart::calcInvoice($cart_items, $this);

            foreach ($products as $product) {
                if (isset($product->missing)) {
                    $customer = $this->customermodel->getCustomer('customer', $_SESSION['CurrentUser']);
                    require APP . 'view/_templates/header.php';
                    require APP . 'view/payment/index.php';
                    require APP . 'view/_templates/footer.php';
                    return;
                }
            }

            if ($invoiceData['total'] > 0) {
                foreach ($cart_items as $item) {
                    $nextProduct = $this->itemmodel->getProduct($item->product_id);
                    $new_qty = $nextProduct->stock_qty - $item->item_qty;
                    $this->productsmodel->updateProductQty($item->product_id, $new_qty);
                }
                //TODO: fix to make sure there is an error message
                $this->cartmodel->createInvoice($_SESSION['CurrentUser'], $invoiceData);
            }
        }

        header('location: ' . URL . 'invoice/index');
    }

}
?>
