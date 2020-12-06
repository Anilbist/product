<?php
class Datab{
    // specify your own database credentials
    private $host = "localhost";
    private $db_name = "product1";
    private $username = "root";
    private $password = "";
    public $conn;
   
    // get the database connection
    public function connect(){
   
        // $this->conn = null;
   
        try{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        }catch(PDOException $e){
            echo "Connection error: " . $e->getMessage();
        }
   
        return $this->conn;
    }
}

?>