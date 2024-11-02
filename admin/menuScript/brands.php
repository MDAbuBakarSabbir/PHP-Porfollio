<?php
    session_start();
    include("../config/database_conn.php");

    if (isset($_POST['addbrands'])) {
       $name = $_POST['brand_name'];
       $link = $_POST['link'];
       $image = $_FILES['image']['name'];
 
       $explode = explode('.',$image);
       $extension = end($explode);
       
       $tmp_name = $_FILES['image']['tmp_name'];

       if(!$name && !$link && !$image){
        $_SESSION['error'] = "reviews add failed";
        header("location: ../addBrands.php");
       }else{

        $newname = $name . '-'. date('d-m-Y').'-'.rand(0,9999).'.'.$extension;

        $localpath = '../../frontend/img/brand/uploads/'.$newname;

        if(move_uploaded_file($tmp_name,$localpath)){
            $insert_query = "INSERT INTO brands (name,image,link) VALUES ('$name','$newname','$link')";

            mysqli_query($db,$insert_query);

            $_SESSION['success'] = "New Brand Add Successfull";

            header('location: ../brands.php');
        }

       }

    }

    if (isset($_POST['update'])) {
        if(isset($_GET['update'])){
        $id = $_GET['editid'];
        $name = $_POST['name'];
        $link = $_POST['link'];
        $image = $_FILES['image']['name'];
        $explode = explode('.',$image);
       $extension = end($explode);
       $tmp_name = $_FILES['image']['tmp_name'];

       if($name && $link && $image){
        $newname = $name . '-'. date('d-m-Y').'-'.rand(0,9999).'.'.$extension;

        $localpath = '../../frontend/img/brand/uploads/'.$newname;

        if(move_uploaded_file($tmp_name,$localpath)){
            $update_query = "UPDATE brands SET image ='$newname',name ='$name', link ='$link' WHERE id='$id'";
            mysqli_query($db,$update_query);
            $_SESSION['success'] = "Brand Update Successfull";
            header('location: ../brands.php');
        }
       }else{
        $_SESSION['error'] = "Brand Update Failed";
            header('location: ../editBrands.php');
       }
    }
    }

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $port_query = "SELECT * FROM brands WHERE id='$id'";
        $connect = mysqli_query($db,$port_query);
        $port = mysqli_fetch_assoc($connect);
    
        if($port['image']){
            $oldname = $port['image'];
            $existspath = '../../frontend/img/brand/uploads/'.$oldname;
    
            if(file_exists($existspath)){
                unlink($existspath);
            }
        }
    
        $delete_query = "DELETE FROM brands WHERE id='$id'";
        mysqli_query($db,$delete_query);
        $_SESSION['success'] = "Brand Delete Successfull";
    
        header('location: ../brands.php');
    }

    if(isset($_GET['statusid'])){
        $id = $_GET['statusid'];
    
        $getQuery = "SELECT * FROM brands WHERE id='$id'";
        $connect = mysqli_query($db,$getQuery);
        $brands = mysqli_fetch_assoc($connect);
    
    
        if($brands['status'] == 'deactive'){
            $update_query = "UPDATE brands SET status='active' WHERE id='$id'";
            mysqli_query($db,$update_query);
            $_SESSION['success'] = "brand Status Successfull";
            header('location: ../brands.php');
        }else{
            $update_query = "UPDATE brands SET status='deactive' WHERE id='$id'";
            mysqli_query($db,$update_query);
            $_SESSION['success'] = "brand Status Successfull";
            header('location: ../brands.php');
        }
    }
    
?>
