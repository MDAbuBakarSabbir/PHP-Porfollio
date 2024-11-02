<?php
session_start();
include("../config/database_conn.php");

if (isset($_POST['addadminbtn'])) {
    $name = $_POST['adminName'];
    $phone = $_POST['adminPhone'];
    $email = $_POST['adminEmail'];
    $password = $_POST['adminPassword'];
    $c_password = $_POST['c_Password'];
    $flag = false;

    $name_regex = '/^(?! $)[a-zA-Z ]*$/';
    // $phone_regex = '/^?(01[3-9]\d{11})*$/';
    $email_regex = '/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/';
    $password_regex = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}/';


    if (!$name) {
        $flag = true;
        $_SESSION['name'] = $name;
        $_SESSION['name_error'] = "Aamin Name Requried!!";
        header("location: ../add_admin.php");
    }elseif (!preg_match($name_regex,$name)) {
        $flag = true;
        $_SESSION['name'] = $name;
        $_SESSION['name_error'] = "This Name Can Not Be Taken!!";
        header("location: ../add_admin.php");
    }
    
    if (!$phone) {
        $flag = true;
        $_SESSION['phone_error'] = "Aamin Phone Number Requried!!";
        header("location: ../add_admin.php");
    }
    // elseif (!preg_match($phone_regex,$phone)) {
    //     $flag = true;
    //     $_SESSION['phone_error'] = "This Number Can Not Be Taken!";
    //     header("location: ../add_admin.php");
    // }
    
    if (!$email) {
        $flag = true;
        $_SESSION['email_error'] = "Aamin Email Requried!!";
        header("location: ../add_admin.php");
    }elseif (!preg_match($email_regex,$email)) {
        $flag = true;
        $_SESSION['email_error'] = "This Email Can Not Be Taken!!";
        header("location: ../add_admin.php");
    }
    
    if (!$password ) {
        $flag = true;
        $_SESSION['pass_error'] = "Aamin password Requried!!";
        header("location: ../add_admin.php");
    }elseif (!preg_match($password_regex,$password)) {
        $flag = true;
        $_SESSION['pass_error'] = "This Email Can Not Be Taken!!";
        header("location: ../add_admin.php");
    }
    
    if (!$c_password){
        $flag = true;
        $_SESSION['c_pass_error'] = "Aamin Password Requried!!";
        header("location: ../add_admin.php");
    }
    // elseif ($c_Password != $password) {
    //     $flag = true;
    //     $_SESSION['c_pass_error'] = "Password And Confirm Password Does Not Match";
    //     header("location: ../add_admin.php");
    // }
    

    if ($flag == false) {
        $p_encrypt = md5($password);
        $addadmin_query = "INSERT INTO admins (name, phone, email,password) VALUES ('$name','$phone','$email','$p_encrypt')";
        mysqli_query($db, $addadmin_query);
        $_SESSION['success'] = "New Admin Add Successfull";
        header("location: ../add_admin.php");
    }else{
        
        header("location: ../add_admin.php");
    }

    

}
?>