
<?php

include '../config/database_conn.php';
session_start();


if(isset($_POST['addservice'])){
    $title = $_POST['service_title'];
    $description = $_POST['service_des'];
    $icon = $_POST['icon'];

    if (!$title && !$description && !$icon) {
        $_SESSION['addservice_error'] = "Please Add somethig in input box"; 
        header('location: ../addService.php');
    }else{
        $query = "INSERT INTO services(title,description,icon) VALUES ('$title','$description','$icon')";
        mysqli_query($db,$query);
        $_SESSION['service_success'] = "Service Insert Successfull"; 
        header('location: ../services.php');
   }
}
	

if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];

    $getQuery = "SELECT * FROM services WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $service = mysqli_fetch_assoc($connect);


    if($service['status'] == 'deactive'){
        $update_query = "UPDATE services SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['service_success'] = "Service Status Successfully Complete"; 
        header('location: ../services.php');
    }else{
        $update_query = "UPDATE services SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['service_success'] = "Service Status Successfully Complete"; 
        header('location: ../services.php');
    }
}



if(isset($_POST['update'])){
    if(isset($_GET['update'])){
        $id = $_GET['update'];
    
        $title = $_POST['title'];
        $description = $_POST['description'];
        $icon = $_POST['icon'];
    
        if($title && $description && $icon){
            $query_update = "UPDATE services SET title='$title',description='$description',icon='$icon' WHERE id='$id'";
            mysqli_query($db,$query_update);
            $_SESSION['service_success'] = "Service Update Successfully Complete"; 
            header('location: ../services.php');
        }
    
    }
}


if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM services WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['service_delete'] = "Service Delete Successfully Complete"; 
    header('location: ../services.php');
}


?>