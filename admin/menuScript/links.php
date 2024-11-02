<?php
session_start();
include("../config/database_conn.php");

if (isset($_POST['addlinkbtn'])) {
    $name = $_POST['socialname'];
    $link = $_POST['link'];
    $icon = $_POST['icon'];

    if (!$name && !$link && !$icon) {
        $_SESSION['link_error'] = "Feild Can Not be Empty";
        header("location: ../addliks.php");
    }else{
        $add_query = "INSERT INTO links(name,link,icon) VALUES ('$$name','$link','$icon')";
        mysqli_query($db, $add_query);
        $_SESSION['success'] = "Link Add Successfull"; 
        header('location: ../links.php');
    }
}

if(isset($_POST['update'])){
    if(isset($_GET['update'])){
        $id = $_GET['update'];
    
        $name = $_POST['socialname'];
        $link = $_POST['link'];
        $icon = $_POST['icon'];
    
        if($name && $link && $icon){
            $query_update = "UPDATE links SET name='$name',link='$link',icon='$icon' WHERE id='$id'";
            mysqli_query($db,$query_update);
            $_SESSION['success'] = "Link Update Successfull"; 
            header('location: ../links.php');
        }
    
    }
}

if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];

    $getQuery = "SELECT * FROM links WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $links = mysqli_fetch_assoc($connect);


    if($links['status'] == 'deactive'){
        $update_query = "UPDATE links SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['success'] = "Link Status Update Successfull"; 
        header('location: ../links.php');
    }else{
        $update_query = "UPDATE links SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['success'] = "Link Status Update Successfull"; 
        header('location: ../links.php');
    }
}


if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM links WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['success'] = "Link Delete Successfull"; 
    header('location: ../links.php');
}
?>