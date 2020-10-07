<?php
session_start();

include_once 'class.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $conn = $this->conn;

        $sql = "Select * from users where token='$token' LIMIT 1";
        $rs = $conn->query($sql);

        if($rs->num_rows > 0) {
            
            $row = $rs->fetch_assoc();
            $queryupdate = "UPDATE users SET verified=1 WHERE token='$token'";
            if ($conn->query($sql, $queryupdate)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['firstname'] = $user['firstname'];
            $_SESSION['lastname'] = $user['lastname'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = true;
            $_SESSION['message'] = "Your email address has been verified successfully";
            $_SESSION['type'] = 'alert-success';
            header('location: index.php');
            exit(0);
        }
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}
?>