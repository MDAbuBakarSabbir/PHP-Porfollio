<?php
session_start();
include("../config/database_conn.php");

if (isset($_POST['addexp'])) {
    $title = $_POST['title'];
    $number = $_POST['number'];
    $icon = $_POST['icon'];

    if (!$title && !$number && !$icon ) {
        $_SESSION['error'] = "Error";
        header("location: ../addExp.php");
    }else {
        $exp_query = "INSERT INTO experience(icon, title, number) VALUES ('$icon','$title','$number')";
        mysqli_query($db, $exp_query);
        $_SESSION['success'] = "Experience Add successfull";
        header("location: ../experience.php");
    }
}

if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];

    $getQuery = "SELECT * FROM experience WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $experience = mysqli_fetch_assoc($connect);


    if($experience['status'] == 'deactive'){
        $update_query = "UPDATE experience SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['success'] = "Experience Status Successfull"; 
        header('location: ../experience.php');
    }else{
        $update_query = "UPDATE experience SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['success'] = "Experience Status Successfull"; 
        header('location: ../experience.php');
    }
}



if(isset($_POST['update'])){
    if(isset($_GET['update'])){
        $id = $_GET['update'];
    
        $title = $_POST['title'];
        $number = $_POST['number'];
        $icon = $_POST['icon'];
    
        if($title && $number && $icon){
            $query_update = "UPDATE experience SET title='$title',number='$number',icon='$icon' WHERE id='$id'";
            mysqli_query($db,$query_update);
            $_SESSION['success'] = "Experience Update Successfull"; 
            header('location: ../experience.php');
        }
    
    }
}


if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM experience WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['success'] = "Experience Delete Successfull"; 
    header('location: ../experience.php');
}

?>