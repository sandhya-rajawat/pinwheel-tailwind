<?php
class Database {
    private $servername = 'localhost';
    private $username = 'root';
    private $password = 's@ndhya1133';
    private $database = 'pinwheel';
    private $con; 

    public function db_connect() {
        $this->con = mysqli_connect($this->servername, $this->username, $this->password, $this->database);
        
      
        if (!$this->con) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $this->con;
    }

    public function db_close() {
        if ($this->con) {
            mysqli_close($this->con);
        }
    }
}

$obj = new Database();
$conn = $obj->db_connect();
echo "Connected successfully";

$obj->db_close();
?>
