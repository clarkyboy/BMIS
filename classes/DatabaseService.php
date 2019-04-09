<?php

    class Database {
         //member variables
        private $servername = "localhost";
        private $username = "root";
        private $password = "";
        private $database = "brgyatyourdoorstep";
        public $conn;
        
        //Constructor
        public function __construct(){
            $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->database);
            
            if($this->conn->connect_error){
                die("Connection error: " . $this->conn->connect_error);
            }
            return $this->conn;
        }
    }

?>