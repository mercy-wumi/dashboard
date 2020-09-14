<?php  
define('HOST', 'localhost');  
define('USER', 'root');  
define('PASS', '');  
define('DB', 'vennitdashboard');  
// class DB  
  
// {  

//     function __construct() {  
//         // $con = mysql_connect(HOST, USER, PASS) or die('Connection Error! '.mysql_error());  
//         // mysql_select_db(DB, $con) or die('DB Connection Error: ->'.mysql_error());  
    

//         $conn = new mysqli(HOST, USER, PASS);

//         // Check connection
//         if ($conn->connect_error) {
//           die("Connection failed: " . $conn->connect_error);
//         }
//         echo "Connected successfully";

//     }
// }  
  
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



        // $checkuser = mysql_query("Select id from users where email='$email'"); 

        // $result = mysql_num_rows($checkuser);  
        // if ($result == 0) {  
        //     $register = mysql_query("Insert into users (firstname, lastname, email, password) values ('$firstname','$lastname','$email','$pass')") or die(mysql_error());  
        //     return $register;  
        // } else {  
        //     return false;  
        // }  
    }  
  
    public  
  
    function login($email, $pass) {  
        $pass = md5($pass);  
        $check = mysqli_query("Select * from users where email='$email' and password='$pass'");  
        $data = mysqli_fetch_array($check);  
        $result = mysqli_num_rows($check);  
        if ($result == 1) {  
            $_SESSION['login'] = true;  
            $_SESSION['id'] = $data['id'];  
            return true;  
        } else {  
            return false;  
        }  
    }  
  
    public  
  
    function firstname($id) {  
        $result = mysqli_query("Select * from users where id='$id'");  
        $row = mysqli_fetch_array($result);  
        echo $row['firstname'];  
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