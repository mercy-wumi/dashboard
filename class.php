<?php  

define('HOST', 'localhost');  
define('USER', 'root');  
define('PASS', '');  
define('DB', 'vennitdashboard');  
 
require_once 'sendEmails.php';

  
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
  
    function register($firstname, $lastname, $email, $token, $pass) {
        $conn = $this->conn;
        $token = bin2hex(random_bytes(50)); // generate unique token 
        $pass = md5($pass);
        $sql = "Select id from users where email='$email'";

        $result = $conn->query($sql);

        if($result->num_rows <= 0)
        {
            $sql = "INSERT INTO `users` (firstname, lastname, email, token, password) VALUES ('$firstname','$lastname','$email','$token','$pass') ";
            if ($conn->query($sql) === TRUE) {

            //TO DO: send verification email to user
            sendVerificationEmail($email, $token);

            $_SESSION['id'] = $user_id;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $firstname;
            $_SESSION['verified'] = false;
            $_SESSION['email'] =  $email;
            $_SESSION['message'] = 'You are logged in!';
            $_SESSION['type'] = 'alert-success';
            
            header("location:index.php"); 
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