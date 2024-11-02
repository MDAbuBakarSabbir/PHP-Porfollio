<?php
session_start();
include("../config/database_conn.php");

if (isset($_POST['adminimgbtn'])) {
    $id = $_GET['adminid'];
    $image = $_FILES['adminimgbtn']['name'];
    $explode = explode('.', $image);
    $extension = end($explode);
    $tmp_name = $_FILES['adminimgbtn']['tmp_name'];

    if ($image) {
        $newname = $id . '-'. date('d-m-Y').'-'.rand(0,9999).'.'.$extension;
        $localpath = '../assets//images/profile/uploads/'.$newname;

        if(move_uploaded_file($tmp_name,$localpath)){
        $add_query = "UPDATE `admins` SET image ='$newname' WHERE id= '$id'";
        mysqli_query($db, $add_query); 
        $_SESSION['success'] = "Image Update Successfull";
        header('location: ../settings.php');
        }
    } else {
        $_SESSION['error'] = "Error";
    header("location: ../settings.php");
    }

    
    $_SESSION['edit'] = " ";
    header("location: ../settings.php");
}

if (isset($_POST['admininfobtn'])) {
    $id = $_GET['infoid'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];

    if ($name && $phone && $email) {
        $info_update_query = "UPDATE admins SET name ='$name', phone ='$phone', email ='$email' WHERE id='$id'";
        mysqli_query($db, $info_update_query);
        $_SESSION["sucess"] = "Update Sucessfull";
        header("location: ../settings.php");
    }else{
    $_SESSION['error'] = "Error";
    header("location: ../settings.php");
    }
}

if (isset($_POST['passupbtn'])) {
    $id = $_GET['passid'];
    $oldpassword = $_POST['oldpassword'];
    $newpassword = $_POST['newpassword'];
    $c_newpassword = $_POST['c_newpassword'];

    if ($oldpassword && $newpassword && $c_newpassword) {

    $oldencript_pass = md5($oldpassword);
    $pass_query = "SELECT COUNT(*) AS 'validate' FROM admins WHERE id='$id' AND password='$oldencript_pass'";
    $conection = mysqli_query($db, $pass_query);
    $pass_result = mysqli_fetch_assoc($conection);
    
    if ($pass_result['validate'] == 1) {
        if ($newpassword == $c_newpassword) {
            $new_encript_pass = md5($newpassword);
            $update_query = "UPDATE `admins` SET password='new_encript_pass' WHERE id='$id'";
            mysqli_query($db, $update_query);
            $_SESSION['success'] = "Password Change Successfull";
            header("location: ../settings.php");
        }else{
            $_SESSION['pass_error'] = "Password and Confirm Password does not match!";
    header("location: ../settings.php");
        }        
    }else{
        $_SESSION['pass_error'] = "Old Password does not match!!";
    header("location: ../settings.php");
    }

}else{
    $_SESSION['pass_error'] = "Old Password requried!!";
    header("location: ../settings.php");
}
}

?>