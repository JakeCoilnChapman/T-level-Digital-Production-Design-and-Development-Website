<?php
include "Connection.php";
if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $pass = $_POST['password'];

    if (empty($uname)) {
        header("Location: CarMax_Homepage.php?error=User Name is required");
        exit();
    }else if (empty($pass)){
        header("Location: CarMax_Homepage.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM users WHERE Username='$uname' AND password='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result)){
            echo "Hello";
        }

    }
}else{
    header("Location: CarMax_Homepage.php");
    exit();
    }
?>