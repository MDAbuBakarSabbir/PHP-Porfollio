<?php
    session_start();
    include("../config/database_conn.php");

    if (isset($_POST['reviewubtn'])) {
       $customer_name = $_POST['customer_name'];
       $position = $_POST['position'];
       $description = $_POST['description'];
       $reviewimage = $_FILES['reviewimage']['name'];
    //    print_r($image);
    //    die();
       $explode = explode('.',$reviewimage);
       $extension = end($explode);
       
       $tmp_name = $_FILES['reviewimage']['tmp_name'];

       if(!$customer_name && !$position && !$description && !$reviewimage){
        $_SESSION['error'] = "reviews add failed";
        header("location: ../addCustomerReviews.php");
       }else{

        $newname = $customer_name . '-'. date('d-m-Y').'-'.rand(0,9999).'.'.$extension;

        $localpath = '../../frontend/img/reviews/uploads/'.$newname;

        if(move_uploaded_file($tmp_name,$localpath)){
            
            $insert_query = "INSERT INTO customers_reviews (image,name,position,description) VALUES ('$newname','$customer_name','$position','$description')";

            mysqli_query($db, $insert_query);

            $_SESSION['review_success'] = "New Review Add Successfull";

            header('location: ../customer_reviews.php');
        }

       }

    }

    if (isset($_POST['upreviewsbtn'])) {
        if(isset($_GET['upreviewsbtn'])){
        $id = $_GET['editid'];
        $customer_name = $_POST['customer_name'];
        $position = $_POST['position'];
        $description = $_POST['description'];
        $image = $_FILES['image']['name'];
        $explode = explode('.',$image);
       $extension = end($explode);
       $tmp_name = $_FILES['image']['tmp_name'];

       if($customer_name && $position && $description && $image){
        $newname = $customer_name . '-'. date('d-m-Y').'-'.rand(0,9999).'.'.$extension;

        $localpath = '../../frontend/img/reviews/uploads/'.$newname;

        if(move_uploaded_file($tmp_name,$localpath)){
            $update_query = "UPDATE `customers_reviews` SET image =' $newname',`name`=' $customer_name',`position`=' $position',`description`=' $description' WHERE id='$id'";

            mysqli_query($db,$update_query);

            $_SESSION['review_success'] = "Review Update Successfull";

            header('location: ../customer_reviews.php');
        }
       }
    }
    }

    if(isset($_GET['deleteid'])){
        $id = $_GET['deleteid'];
        $port_query = "SELECT * FROM customers_reviews WHERE id='$id'";
        $connect = mysqli_query($db,$port_query);
        $port = mysqli_fetch_assoc($connect);
    
        if($port['image']){
            $oldname = $port['image'];
            $existspath = '../../frontend/img/review/uploads/'.$oldname;
    
            if(file_exists($existspath)){
                unlink($existspath);
            }
        }
    
        $delete_query = "DELETE FROM customers_reviews WHERE id='$id'";
        mysqli_query($db,$delete_query);
        $_SESSION['port_success'] = "Portfolio Delete Successfully Complete";
    
        header('location: ../customer_reviews.php');
    }

    if(isset($_GET['statusid'])){
        $id = $_GET['statusid'];
    
        $getQuery = "SELECT * FROM customers_reviews WHERE id='$id'";
        $connect = mysqli_query($db,$getQuery);
        $service = mysqli_fetch_assoc($connect);
    
    
        if($service['status'] == 'deactive'){
            $update_query = "UPDATE customers_reviews SET status='active' WHERE id='$id'";
            mysqli_query($db,$update_query);
            $_SESSION['reviews_success'] = "Service Status Successfully Complete";
            header('location: ../customer_reviews.php');
        }else{
            $update_query = "UPDATE customers_reviews SET status='deactive' WHERE id='$id'";
            mysqli_query($db,$update_query);
            $_SESSION['reviews_success'] = "Service Status Successfully Complete";
            header('location: ../customer_reviews.php');
        }
    }
    
?>
