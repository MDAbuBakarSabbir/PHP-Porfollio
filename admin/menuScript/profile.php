<?php
include("../config/database_conn.php");
session_start();

if (isset($_POST['profileEditbtn'])) {
    header("location: ../editProfile.php");
}


if (isset($_POST["faviconbtn"])) {
    $favicon = $_FILES['favicon']['name'];
    $explode = explode('.', $favicon);
    $extension = end($explode);
    $tmp_name = $_FILES['favicon']['tmp_name'];
    if ($favicon) {
        $newname = 'favicon' . '-' . date('d-m-Y') .'-'.rand(0,999).'.'. $extension;
        $localpath = '../../frontend/img/logo/uploads/' . $newname;
        $old_query = "SELECT * FROM links";
        $connect = mysqli_query($db, $old_query);
        $logo = mysqli_fetch_assoc($connect);
        if(move_uploaded_file($tmp_name, $localpath)){
            $logo_query = "UPDATE links SET logo='$favicon'";
            mysqli_query($db, $logo_query);
            $_SESSION['updatesuccess'] = "Favicon Update Successfull";
            header("../profile.php");;
        }
    }else{
        $_SESSION['error'] = "Image Not Found!!";
    header("location: ../profile.php");  
    }

}


if (isset($_POST["logobtn"])) {
    $logo = $_FILES['logo']['name'];
    $explode = explode('.', $logo);
    $extension = end($explode);
    $tmp_name = $_FILES['logo']['tmp_name'];
    if ($logo) {
        $newname = 'logo' . '-' . date('d-m-Y') .'-'.rand(0,999).'.'. $extension;
        $localpath = '../../frontend/img/logo/uploads/' . $newname;
        $old_query = "SELECT * FROM links";
        $connect = mysqli_query($db, $old_query);
        $logo = mysqli_fetch_assoc($connect);
        if(move_uploaded_file($tmp_name, $localpath)){
            $logo_query = "UPDATE links SET logo='$logo'";
            mysqli_query($db, $logo_query);
            $_SESSION['updatesuccess'] = "Logo Update Successfull";
            header("../profile.php");
        }
    }else{
        $_SESSION['error'] = "Image Not Found!!";
    header("location: ../profile.php");  
    }

}
if (isset($_POST['infoupbtn'])) {
   $name = $_POST['profilename'];
   $shortdes = $_POST['shortdes'];
   $phone = $_POST['phone_no'];
   $email = $_POST['email_up'];
   $address = $_POST['address'];

   if ($name && $shortdes && $phone && $email && $address) {
        $info_update_query = "UPDATE woner SET name = '$name',phone ='$phone',email = '$email',short_des = '$shortdes',address = '$address'";
        mysqli_query($db, $info_update_query);
        $_SESSION['updatesuccess'] = "Information Update Successfull";
        header("location: ../profile.php");
   }else{
    $_SESSION['error'] = "Field can not be empty!!";
    header("location: ../editProfile.php");
   }

}



if (isset($_POST['firstimgubtn'])) {
    $Top_img = $_FILES['Top_img']['name'];
    $explode = explode('.',$Top_img);
    $extension = end($explode);
    
    $tmp_name = $_FILES['Top_img']['tmp_name'];

    if(!$Top_img){
     $_SESSION['error'] = "Image not found";
     header("location: ../profile.php");
    }else{

     $newname =  'top-image' . '-' . date('d-m-Y').'-'.rand(0,9999).'.'.$extension;

     $localpath = '../../frontend/img/profile/uploads/'.$newname;

     $old_query = "SELECT * FROM main_image ";
     $connect = mysqli_query($db,$old_query);
     $top_img = mysqli_fetch_assoc($connect);


     if(move_uploaded_file($tmp_name,$localpath)){
         $topimg_query = "UPDATE woner SET first_img ='$newname'";

         mysqli_query($db,$topimg_query);

         $_SESSION['updatesuccess'] = "New Image Upload Successfull";

         header('location: ../profile.php');
     }

    }

 }
if (isset($_POST['aboutimgubtn'])) {
    $aboutme_image = $_FILES['about_img']['name'];
    $explode = explode('.',$aboutme_image);
    $extension = end($explode);
    
    $tmp_name = $_FILES['about_img']['tmp_name'];

    if(!$aboutme_image){
     $_SESSION['error'] = "Image Not Found";
     header("location: ../profile.php");
    }else{

     $newname = 'About me image' . '-' .  date('d-m-Y').'-'.rand(0,9999).'.'.$extension;

     $localpath = '../../frontend/img/profile/uploads/'.$newname;

     if(move_uploaded_file($tmp_name,$localpath)){
         $about_query = "UPDATE woner SET aboutme_img ='$newname'";

         mysqli_query($db,$about_query);

         $_SESSION['updatesuccess'] = "About ME Image Upload Successfull";

         header('location: ../profile.php');
     }

    }

 }
if (isset($_POST['aboutdesubtn'])) {
    $aboutme_des = $_POST['aboutme_des'];
    if ($aboutme_des) {
        $insert_query = "UPDATE woner SET aboutme_des = '$aboutme_des'";
        mysqli_query($db, $insert_query);
        $_SESSION['updatesuccess'] = "Description Add Successfull";
        header("location: ../profile.php");
    }else{
        header("location: ../profile.php");
    }

 }


?>