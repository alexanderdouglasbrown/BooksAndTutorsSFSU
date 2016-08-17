<?php

class InvoiceModel {

    public $invoicemodel = null;

    function __construct() {

        include_once APP . 'dbcalls/sqlcalls.php';
        $this->invoicemodel = new Sqlcalls();
    }

    public function getInvoice($customer_id) {
        $parameters = array(':customer_id' => $customer_id);
        return $this->invoicemodel->getInvoice($parameters);
    }

}
