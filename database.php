<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

class Database {
    private $servername = '127.0.0.1';
    private $username = 'root';
    private $password = 's@ndhya1133';
    private $database = 'pinwheel';
    private $port = 33066; 
    private $con;

    public function db_connect() {
        $this->con = new mysqli($this->servername, $this->username, $this->password, $this->database, $this->port);
        
        if ($this->con->connect_error) {
            die("Connection failed: " . $this->con->connect_error);
        }
        return $this->con;
    }

    public function db_close() {
        if ($this->con) {
            $this->con->close();
        }
    }
}

$obj = new Database();
$conn = $obj->db_connect();
echo "✅ Connected successfully!";
$obj->db_close();
?>
