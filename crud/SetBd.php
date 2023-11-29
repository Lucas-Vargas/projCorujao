<?php

    class DataBase{
        
        private $host = "localhost";
        private $db_name = "corujao";
        private $username = "root";
        private $password = "";
        public $conn;

        public function getConnection(){
            try{
                $this->conn = new PDO("mysql:host=" .$this->host .";dbname = ".$this->db_name,
                $this->username, $this->password);
            }
            catch(PDOException $exception){
                echo"erro de conexão: ".$exception->getMessage();
            }
            return $this->conn;
        }
}   