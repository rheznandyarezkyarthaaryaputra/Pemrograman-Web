<?php
class Database{
    private $host = "Localhost";
    private $username = "root";
    private $password = "";
    private $database = "prakwebdb";
    public $conn;

    public function __construct(){
        $this->conn = new mysqli($this->host, $this->username,$this->password,$this->database);
        if($this->conn->connect_error){
            die("Connection failed: ".$this->conn->connect_error);
        }
    }
}