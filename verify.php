<?php
//session_start();
define('HOST', 'localhost');  
define('USER', 'root');  
define('PASS', '');  
define('DB', 'vennitdashboard');  
 

$conn = new mysqli(HOST, USER, PASS, DB);

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $sql = "select * from users where token='$token'";
    $resultquery = $conn->query($sql);
    if($resultquery->num_rows > 0){
        $resultrow = $resultquery->fetch_assoc();
        $updatequery = "UPDATE users SET verified=1 WHERE token='$token'";
        $queryresult = $conn->query($updatequery);
        echo "Account verified";
    }
    else{
        echo "user not found";
    }
}
else{
    echo "no token provided";
}


?>
