<?php

class Sqlcalls {

    /**
     * @var null Database Connection
     */
    public $db = null;

    function __construct() {
        $this->openDatabaseConnection();
    }

    /**
     * Open the database connection with the credentials from application/config/config.php
     */
    private function openDatabaseConnection() {
        // set the (optional) options of the PDO connection. in this case, we set the fetch mode to
        // "objects", which means all results will be objects, like this: $result->user_name !
        // For example, fetch mode FETCH_ASSOC would return results like this: $result["user_name] !
        // @see http://www.php.net/manual/en/pdostatement.fetch.php
        $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

        // generate a database connection, using the PDO connector
        // @see http://net.tutsplus.com/tutorials/php/why-you-should-be-using-phps-pdo-for-database-access/
        $this->db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
    }

    //INSERT       

    /**
     * Add a row of values to a table in the database    
     * @param string $table table name
     * @param array $pars parameters  
     */
    public function addEntry($table, $pars) {
        $first = True;
        $values = "(";
        $dot_values = "(";
        foreach ($pars as $key => $value) {
            if ($first) {
                $first = False;
            } else {
                $values = $values . ", ";
                $dot_values = $dot_values . ", ";
            }
            $dot_values = $dot_values . $key;
            $values = $values . ltrim($key, ':');
        }
        $sql = "INSERT INTO " . $table . " " . $values . ") VALUES " . $dot_values . ")";
        //echo $sql; exit();
        $query = $this->db->prepare($sql);
        $query->execute($pars);
    }

    //UPDATE

    /**
     * Update a table in database
     * @param string $table table name
     * @param array $val values
     * @param array $target    
     */
    public function updateEntry($table, $val, $target) {
        $sql = "UPDATE " . $table . " SET ";
        //Set values
        $first = True;
        foreach ($val as $key => $value) {
            if ($first) {
                $first = False;
            } else {
                $sql = $sql . ", ";
            }
            $sql = $sql . " " . ltrim($key, ':') . " = " . $key;
        }
        //Set target
        $sql = $sql . " WHERE";
        $first = True;
        foreach ($target as $key => $value) {
            if ($first) {
                $first = False;
            } else {
                $sql = $sql . " AND ";
            }
            $sql = $sql . " " . ltrim($key, ':') . " = " . $key;
        }
        $query = $this->db->prepare($sql);
        $pars = array_merge($val, $target);
        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $pars);  exit();
        $query->execute($pars);
    }

    //SELECT       

    public function getAllEntriesAdv($table, $val, $target) {
        $sql = "SELECT ";
        //Set values
        $first = True;
        foreach ($val as $key) {
            if ($first) {
                $first = False;
            } else {
                $sql = $sql . ", ";
            }
            $sql = $sql . ltrim($key, ':');
        }

        $sql = $sql . " FROM " . $table;

        if (count($target) > 0) {
            //Set target
            $sql = $sql . " WHERE";
            $first = True;
            foreach ($target as $key => $value) {
                if ($first) {
                    $first = False;
                } else {
                    $sql = $sql . " AND";
                }
                $sql = $sql . " " . ltrim($key, ':') . " like " . $key;
            }
        }
        $query = $this->db->prepare($sql);
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $target);  exit();
        $query->execute($target);
        return $query->fetchAll();
    }

    public function getAllEntriesAdv2($table, $val, $target, $column, $order) {
        $sql = "SELECT ";
        //Set values
        $first = True;
        foreach ($val as $key) {
            if ($first) {
                $first = False;
            } else {
                $sql = $sql . ", ";
            }
            $sql = $sql . ltrim($key, ':');
        }

        $sql = $sql . " FROM " . $table;

        if (count($target) > 0) {
            //Set target
            $sql = $sql . " WHERE";
            $first = True;
            foreach ($target as $key => $value) {
                if ($first) {
                    $first = False;
                } else {
                    $sql = $sql . " AND";
                }
                $sql = $sql . " " . ltrim($key, ':') . " like " . $key;
            }
        }

        $sql = $sql . " ORDER BY " . $column . " " . $order;
        $query = $this->db->prepare($sql);
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $target);  exit();
        $query->execute($target);
        return $query->fetchAll();
    }

    public function getInvoice($parameters) {

        $sql = "SELECT customer_id, cart_id, order_date, total, shipping_cost, tax, grand_total FROM invoice WHERE customer_id = :customer_id ORDER BY cart_id DESC LIMIT 1";
        $query = $this->db->prepare($sql);
        //echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();
        $query->execute($parameters);
        return $query->fetch();
    }

    public function getEntry($table, $val, $target) {
        $sql = "SELECT ";
        //Set values
        $first = True;
        foreach ($val as $key) {
            if ($first) {
                $first = False;
            } else {
                $sql = $sql . ", ";
            }
            $sql = $sql . ltrim($key, ':');
        }

        $sql = $sql . " FROM " . $table;

        if (count($target) > 0) {
            //Set target
            $sql = $sql . " WHERE";
            $first = True;
            foreach ($target as $key => $value) {
                if ($first) {
                    $first = False;
                } else {
                    $sql = $sql . " AND";
                }
                $sql = $sql . " " . ltrim($key, ':') . " = " . $key;
            }
        }

        $query = $this->db->prepare($sql);
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $target);  exit();
        $query->execute($target);
        return $query->fetch();
    }

    public function getAllEntries($table, $val, $target) {
        $sql = "SELECT ";
        //Set values
        $first = True;
        foreach ($val as $key) {
            if ($first) {
                $first = False;
            } else {
                $sql = $sql . ", ";
            }
            $sql = $sql . ltrim($key, ':');
        }

        $sql = $sql . " FROM " . $table;

        if (count($target) > 0) {
            //Set target
            $sql = $sql . " WHERE";
            $first = True;
            foreach ($target as $key => $value) {
                if ($first) {
                    $first = False;
                } else {
                    $sql = $sql . " AND";
                }
                $sql = $sql . " " . ltrim($key, ':') . " = " . $key;
            }
        }
        $query = $this->db->prepare($sql);
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $target);  exit();
        $query->execute($target);
        return $query->fetchAll();
    }

    //DELETE

    public function deleteEntry($table, $pars) {
        $sql = "DELETE FROM " . $table . " WHERE";
        $first = True;
        foreach ($pars as $key => $value) {
            if ($first) {
                $first = False;
            } else {
                $sql = $sql . " AND ";
            }
            $sql = $sql . " " . ltrim($key, ':') . " = " . $key;
        }
        $query = $this->db->prepare($sql);
        $query->execute($pars);
    }

}
