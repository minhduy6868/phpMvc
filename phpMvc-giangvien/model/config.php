<?php 
class dbConfig {
    private $host = "localhost"; 
    private $name = "root"; 
    private $password = "";
    private $db = "qlhocphan";

    protected $conn = null;

    public function __construct() {
       try{
        $this->conn = new PDO(
            "mysql:host=$this->host; 
            dbname=$this->db",
            $this->name,
            $this->password);
       } catch(PDOException $e){ 
        echo "lỗi kết nối " + $e->getMessage();
    
             
    }
}
}
?>