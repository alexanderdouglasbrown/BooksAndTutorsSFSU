<?php

class Controller {

    /**
     * @var null Database Connection
     */
    public $db = null;

    /**
     * @var null Model
     */
    public $cartmodel = null;
    public $customermodel = null;
    public $homemodel = null;
    public $productsmodel = null;
    public $searchproductsmodel = null;
    public $siginmodel = null;
    public $itemmodel = null;
    public $invoicemodel = null;

    /**
     * Whenever controller is created, open a database connection too and load "the model".
     */
    function __construct() {
        $this->loadCartModel();
        $this->loadCustomerModel();
        $this->loadhomeModel();
        $this->loadproductsModel();
        $this->loadsearchproductsModel();
        $this->loadsigninModel();
        $this->loaditemModel();
        $this->loadinvoiceModel();
    }

    public function loadCartModel() {
        require APP . 'model/cart.php';
        // create new "model" (and pass the database connection)
        $this->cartmodel = new CartModel();
    }

    public function loadcustomerModel() {
        require APP . 'model/customers.php';
        // create new "model" (and pass the database connection)
        $this->customermodel = new CustomerModel();
    }

    public function loadhomeModel() {
        require APP . 'model/home.php';
        // create new "model" (and pass the database connection)
        $this->homemodel = new HomeModel();
    }

    public function loadproductsModel() {
        require APP . 'model/products.php';
        // create new "model" (and pass the database connection)
        $this->productsmodel = new ProductsModel();
    }

    public function loadsearchproductsModel() {
        require APP . 'model/searchproducts.php';
        // create new "model" (and pass the database connection)
        $this->searchproductsmodel = new SearchProductsModel();
    }

    public function loadsigninModel() {
        require APP . 'model/signin.php';
        // create new "model" (and pass the database connection)
        $this->signinmodel = new SigninModel();
    }

    public function loaditemModel() {
        require APP . 'model/item.php';
        // create new "model" (and pass the database connection)
        $this->itemmodel = new ItemModel();
    }

    public function loadinvoiceModel() {
        require APP . 'model/invoice.php';
        // create new "model" (and pass the database connection)
        $this->invoicemodel = new InvoiceModel();
    }

}
