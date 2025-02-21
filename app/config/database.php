<?php
class Database {
    private $host = "localhost";
    private $dbname = "asm2";
    private $username = "root";
    private $password = "";
    public $conn;

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname;charset=utf8", 
                                  $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Lỗi kết nối database: " . $e->getMessage());
        }
    }

    public function query($sql) {
        return $this->conn->query($sql);
    }

    public function execute($sql) {
        return $this->conn->exec($sql);
    }

    public function prepare($sql) {
        return $this->conn->prepare($sql);
    }

    
}
?>
