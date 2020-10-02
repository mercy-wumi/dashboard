<?php  
define('HOST', 'localhost');  
define('USER', 'root');  
define('PASS', '');  
define('DB', 'vennitdashboard');  
 
  
class User  
  
{  
    public  
    $conn = "";
    function __construct() {  
        $conn = new mysqli(HOST, USER, PASS, DB);
        $this->conn = $conn;

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        //echo "Connected successfully"; 
    }  
  
    public  
  
    function register($firstname, $lastname, $email, $pass) {
        $conn = $this->conn;  
        $pass = md5($pass);
        $sql = "Select id from users where email='$email'";

        $result = $conn->query($sql);

        if($result->num_rows <= 0)
        {
            $sql = "INSERT INTO `users` (firstname, lastname, email, password) VALUES ('$firstname','$lastname','$email','$pass') ";
            if ($conn->query($sql) === TRUE) {
              //echo "New record created successfully";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }

    }  
  
    public  
  
    function login($email, $pass) {  
        $pass = md5($pass);  
        $conn = $this->conn;

        $sql = "Select * from users where email='$email' and password='$pass'";
        $rs = $conn->query($sql);
        $row = $rs->fetch_assoc();


        if($rs->num_rows == 1) { // if users email and password found in database
            $_SESSION['login'] = true;
            $_SESSION['id'] = $row['id'];
            return true;
        } else {
            return false;
        }

    }  
  
    public  
  
    function firstname($id) {
        $conn = $this->conn;
        $rst = "Select * from users where id ='$id'"; 
        $resultId = $conn->query($rst);
        $rowId = $resultId->fetch_assoc();
        echo $rowId['firstname'];

        }  
  
    public  
  
    function session() {  
        if (isset($_SESSION['login'])) {  
            return $_SESSION['login'];  
        }  
    }  
  
    public  
  
    function logout() {  
        $_SESSION['login'] = false;  
        session_destroy();  
    }  
}  
  
?> 