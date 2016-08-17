<?php

if (!isset($_SESSION)) {
    session_start();
}
?>

<?php

/**
 * Class Item
 * This is a demo class.
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Item extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/products/index
     */
    public function index() {
        $categories = $this->homemodel->getAllCategories();
        require APP . 'view/_templates/header.php';
        require APP . 'view/item/index.php';
        require APP . 'view/_templates/footer.php';
    }

    public function showItem($product_id) {
        $categories = $this->homemodel->getAllCategories();
        // if we have an id of a product that should be edited
        if (isset($product_id)) {
            // do getProduct() in model/model.php
            if (isset($_SESSION['CurrentUser'])) {
                $customer = $this->customermodel->getCustomer('customer', $_SESSION['CurrentUser']);
            }
            $product = $this->itemmodel->getProduct($product_id);
            $searchwords = explode(" ", $product->description);
            $match = "";
            foreach ($searchwords as $word) {
                $found = strpos($word, "CSC");
                if ($found === FALSE) {
                    
                } else {
                    $match = $word;
                    break;
                }
            }
            $match = rtrim($match, '.');
            $match = rtrim($match, ',');
            if ($match != "") {
                $tutors = $this->itemmodel->getTutors('customer_id', 'ASC', $match);
            } else {
                $tutors = NULL;
            }

            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar
            // load views. within the views we can echo out $customer easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/item/index.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to products index page (as we don't have a customer_id)
            header('location: ' . URL . 'item/index');
        }
    }

    public function emailTutor() {
//        $email_from = "izaacg@mail.sfsu.edu";
//        $email_to = "izaacg@mail.sfsu.edu";
//        $email_subject = "Books and Tutors message to tutor";
//        $email_message = $_POST["comments"];
//        $headers = 'From: '.$email_from."\r\n". 'Reply-To: '.$email_from."\r\n" .
//        'X-Mailer: PHP/' . phpversion();
//        @mail($email_to, $email_subject, $email_message, $headers);

        require APP . 'view/_templates/header.php';
        require APP . 'view/item/messagesent.php';
        require APP . 'view/_templates/footer.php';
    }

}
