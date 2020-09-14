<?php
define('HOST', 'localhost');  
define('USER', 'root');  
define('PASS', '');  
define('DB', 'vennitdashboard');

$conn = new mysqli(HOST, USER, PASS, DB);

        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        }
        echo "Connected successfully"; 


        $sql = "INSERT INTO `users` (firstname, lastname, email, password) VALUES ('mercy','lastname','email','pass') ";
        $res = $conn->query($sql);
        print_r($res);