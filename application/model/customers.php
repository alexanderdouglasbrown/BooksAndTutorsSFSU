<?php

class CustomerModel {

    public $customermodel = null;

    function __construct() {

        include_once APP . 'dbcalls/sqlcalls.php';
        $this->customermodel = new Sqlcalls();
    }

    /**
     * Add a customer to database    
     */
    public function addCustomer($table, $firstname, $lastname, $email, $password, $phone, $street, $city, $zipcode) {
        $parameters = array(':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':password' => $password,
            ':phone' => $phone,
            ':street' => $street,
            ':city' => $city,
            ':zipcode' => $zipcode);
        return $this->customermodel->addEntry($table, $parameters);
    }

    /**
     * Delete a customer in the database  
     * @param int $customer_id Id of customer
     */
    public function deleteCustomer($table, $customer_id) {
        $parameters = array(':customer_id' => $customer_id);
        return $this->customermodel->deleteEntry($table, $parameters);
    }

    /**
     * Get a customer from database
     */
    public function getCustomer($table, $customer_id) {
        $val = array(':id',
            ':firstname',
            ':lastname',
            ':email',
            ':password',
            ':phone',
            ':street',
            ':city',
            ':zipcode');
        $target = array(':id' => $customer_id);
        return $this->customermodel->getEntry($table, $val, $target);
    }

    /**
     * Update a customer in database     
     */
    public function updateCustomer($table, $firstname, $lastname, $email, $password, $phone, $street, $city, $zipcode, $customer_id) {
        $val = array(':firstname' => $firstname,
            ':lastname' => $lastname,
            ':email' => $email,
            ':password' => $password,
            ':phone' => $phone,
            ':street' => $street,
            ':city' => $city,
            ':zipcode' => $zipcode);
        $target = array(':id' => $customer_id);
        return $this->customermodel->updateEntry($table, $val, $target);
    }

}
