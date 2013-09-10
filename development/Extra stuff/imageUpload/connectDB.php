<?php

class DB_Connect {

    function __construct() {
        
    }

    // destructor
    function __destruct() {
        $this->close();
    }

// Connecting to database 
    public function connect() {
        // connecting to mysql
        $con = mysql_connect("localhost", "root", "200971082");
        mysql_select_db("bbdtestdb");
        // return database handler
        return $con;
    }

    // Closing database connection
    public function close() {
        mysql_close();
    }

}

?>
