<?php

class SigninModel {

    public $signinmodel = null;

    function __construct() {

        include_once APP . 'dbcalls/sqlcalls.php';
        $this->signinmodel = new Sqlcalls();
    }

    public function signinCustomer($email, $password) {
        $val = array(':id',
            ':firstname',
            ':lastname',
            ':email',
            ':password',
            ':phone',
            ':street',
            ':city',
            ':zipcode');
        $target = array(':email' => $email, ':password' => $password);
        return $this->signinmodel->getEntry("customer", $val, $target);
    }

}
