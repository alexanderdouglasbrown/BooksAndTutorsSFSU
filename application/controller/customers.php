<?php

/**
 * Class Customers
 *
 * Please note:
 * Don't use the same name for class and method, as this might trigger an (unintended) __construct of the class.
 * This is really weird behaviour, but documented here: http://php.net/manual/en/language.oop5.decon.php
 *
 */
class Customers extends Controller {

    /**
     * PAGE: index
     * This method handles what happens when you move to http://yourproject/customers/index
     */
    public function index() {
        $categories = $this->homemodel->getAllCategories();
        // load views. within the views we can echo out $customers and $amount_of_customers easily
        require APP . 'view/_templates/header.php';
        require APP . 'view/customers/index.php';
        require APP . 'view/_templates/footer.php';
    }

    /**
     * ACTION: addCustomer
     * This method handles what happens when you move to http://yourproject/customers/addcustomer
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "add a customer" form on customers/index
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to customers/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function addCustomer() {
        // if we have POST data to create a new customer entry
        if (isset($_POST["submit_add_customer"])) {
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $phone = $_POST["phone"];
            $street = $_POST["street"];
            $city = $_POST["city"];
            $zipcode = $_POST["zipcode"];
            $salt = "saltedpass4team4";
            $saltedpassword = md5($salt . $_POST["password"]);
            // do addCustomer() in model/customerModel.php
            $this->customermodel->addCustomer('customer', $firstname, $lastname, $email, $saltedpassword, $phone, $street, $city, $zipcode);
        }

        // where to go after customer has been added
        header('location: ' . URL . 'signin');
    }

    /**
     * ACTION: deleteCustomer
     * This method handles what happens when you move to http://yourproject/customers/deletecustomer
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "delete a customer" button on customers/index
     * directs the user after the click. This method handles all the data from the GET request (in the URL!) and then
     * redirects the user back to customers/index via the last line: header(...)
     * This is an example of how to handle a GET request.
     * @param int $customer_id Id of the to-delete customer
     */
    public function deleteCustomer($customer_id) {
        // if we have an id of a customer that should be deleted
        if (isset($customer_id)) {
            // do deleteCustomer() in model/customerModel.php
            $this->customermodel->deleteCustomer('customer', $customer_id);
        }

        // where to go after customer has been deleted
        header('location: ' . URL . 'customers/index');
    }

    /**
     * ACTION: editCustomer
     * This method handles what happens when you move to http://yourproject/customers/editcustomer
     * @param int $customer_id Id of the to-edit customer
     */
    public function editCustomer($customer_id) {
        $categories = $this->homemodel->getAllCategories();
        // if we have an id of a customer that should be edited
        if (isset($customer_id)) {
            // do getCustomer() in model/customerModel.php
            $customer = $this->customermodel->getCustomer('customer', $customer_id);
            // in a real application we would also check if this db entry exists and therefore show the result or
            // redirect the user to an error page or similar
            // load views. within the views we can echo out $customer easily
            require APP . 'view/_templates/header.php';
            require APP . 'view/customers/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            // redirect user to customers index page (as we don't have a customer_id)
            header('location: ' . URL . 'customers/index');
        }
    }

    /**
     * ACTION: updateCustomer
     * This method handles what happens when you move to http://yourproject/customers/updatecustomer
     * IMPORTANT: This is not a normal page, it's an ACTION. This is where the "update a customer" form on customers/edit
     * directs the user after the form submit. This method handles all the POST data from the form and then redirects
     * the user back to customers/index via the last line: header(...)
     * This is an example of how to handle a POST request.
     */
    public function updateCustomer() {       
        // if we have POST data to create a new Customer entry
        if (isset($_POST["submit_update_customer"])) {
            $salt = "saltedpass4team4";
            $saltedpassword = md5($salt . $_POST["password"]);
            // do updateCustomer() from model/customerModel.php
            $this->customermodel->updateCustomer('customer', $_POST["firstname"], $_POST["lastname"], $_POST["email"], $saltedpassword, $_POST["phone"], $_POST["street"], $_POST["city"], $_POST["zipcode"], $_POST["customer_id"]);
        }

        // where to go after customer has been added
        header('location: ' . URL . 'home/index');
    }

}
