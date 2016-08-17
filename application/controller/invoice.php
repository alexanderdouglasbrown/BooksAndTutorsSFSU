<?php

if (!isset($_SESSION)) {
    session_start();
}
?>
<?php

class Invoice extends Controller {

//SELECT customer_id, cart_id, order_date, total, shipping_cost, tax, grand_total
    public function index() {
        $categories = $this->homemodel->getAllCategories();
        $invoice = $this->invoicemodel->getInvoice($_SESSION['CurrentUser']);
        $customer = $this->customermodel->getCustomer('customer', $_SESSION['CurrentUser']);
        $invoice_items = $this->cartmodel->getCartItemsCID($invoice->cart_id);

        $products = array();
        foreach ($invoice_items as $item) {
            $nextProduct = $this->itemmodel->getProduct($item->product_id);
            $nextProduct->qty = $item->item_qty;
            array_push($products, $nextProduct);
        }

        require APP . 'view/_templates/header.php';
        require APP . 'view/invoice/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function getInvoice() {
        $invoice = $this->invoicemodel->getInvoice($_SESSION['CurrentUser']);
        $customer = $this->customermodel->getCustomer('customer', $_SESSION['CurrentUser']);
        require APP . 'view/_templates/header.php';
        require APP . 'view/invoice/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function sendbuyerConfirmation() {

        $email_from = "izaacg@mail.sfsu.edu";
        $email_to = "izaacg@mail.sfsu.edu";
        $email_subject = "Books and Tutors Invoice";
        $email_message = "invoice";
        $headers = 'From: ' . $email_from . "\r\n" . 'Reply-To: ' . $email_from . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
    }

    public function sendSellerConfirmation() {

        $email_from = "izaacg@mail.sfsu.edu";
        $email_to = "izaacg@mail.sfsu.edu";
        $email_subject = "Books and Tutors Payment";
        $email_message = "your item was sold";
        $headers = 'From: ' . $email_from . "\r\n" . 'Reply-To: ' . $email_from . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
        @mail($email_to, $email_subject, $email_message, $headers);
    }

}

?>
