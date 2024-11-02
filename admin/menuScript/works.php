<?php 
include("../config/database_conn.php");

if (isset($_POST['addworkbtn'])) {
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $description = $_POST['description'];
    $workimage = $_FILES['workimage']['name'];
    $explode = explode('.', $workimage);
    $extension = end($explode);
    $tmp_name = $_FILES['workimage']['tmp_name'];

    if (!$title && !$sub_title && !$description && !$workimage) {

        $_SESSION['port_success'] = "Portfolio filed Empty";
        header('location: ../addWorks.php');
    }else{
        $newname = $title . '-'. date('d-m-Y').'-'.rand(0,9999).'.'.$extension;
        $localpath = '../../frontend/img/recent_works/uploads/'.$newname;

        if(move_uploaded_file($tmp_name,$localpath)){
        $add_query = "INSERT INTO recent_works(title, sub_title, description, image) VALUES('$title','$sub_title','$description','$newname')";
        mysqli_query($db, $add_query); 
        $_SESSION['port_success'] = "Portfolio Addes Successfull";
        header('location: ../recent_works.php');
        }
    }
}



if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $port_query = "SELECT * FROM recent_works WHERE id='$id'";
    $connect = mysqli_query($db,$port_query);
    $port = mysqli_fetch_assoc($connect);

    if($port['image']){
        $oldname = $port['image'];
        $existspath = '../../frontend/img/review/uploads/'.$oldname;

        if(file_exists($existspath)){
            unlink($existspath);
        }
    }

    $delete_query = "DELETE FROM recent_works WHERE id='$id'";
    mysqli_query($db,$delete_query);
    $_SESSION['port_success'] = "Portfolio Delete Successfull";

    header('location: ../recent_works.php');
}

if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];

    $getQuery = "SELECT * FROM recent_works WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $recent_works = mysqli_fetch_assoc($connect);


    if($recent_works['status'] == 'deactive'){
        $update_query = "UPDATE recent_works SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['recent_works'] = "Service Status Successfull";
        header('location: ../recent_works.php');
    }else{
        $update_query = "UPDATE recent_works SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['recent_works'] = "Service Status Successfull";
        header('location: ../recent_works.php');
    }
}


?>