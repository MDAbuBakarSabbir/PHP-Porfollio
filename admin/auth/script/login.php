<?php
session_start();
include("../../config/database_conn.php");

if(isset($_POST['loginbtn'])){
    $email = $_POST['loginemail'];
    $password = $_POST['loginpassword'];
    $flag = false;

    if (!$email || !$password) {
        $flag = true;
        $_SESSION['login_error'] = "Please Enter Email and Password!!";
        header("location:../login.php");
    }
    
    if ($flag == false) {
        $encrypt = md5($password);
        $login_quary = "SELECT COUNT(*) AS 'validate' FROM admins WHERE email = '$email' AND password = '$encrypt' AND status='active'";
        $conection = mysqli_query($db, $login_quary);
        $login_result = mysqli_fetch_assoc($conection);

        if ($login_result['validate'] == 1) {
            $login_quary = "SELECT * FROM admins WHERE email = '$email'";
            $db_conection = mysqli_query($db, $login_quary);
            $author = mysqli_fetch_assoc($db_conection);

            $_SESSION["author_id"] = $author["id"];
            $_SESSION["author_name"] = $author["name"];
            $_SESSION["author_phone"] = $author["phone"];
            $_SESSION["author_email"] = $author["email"];
            header("location:../../index.php");
        }else {
            $_SESSION['login_error'] = " Your Email or Password does not match!";
            header("location: ../login.php");
            die();
    }
    }
}
?>