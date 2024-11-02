<?php
include("../config/database_conn.php");
if (isset($_GET['statusid'])) {

    $id = $_GET['statusid'];
    $status_query = "SELECT * FROM admins WHERE id='$id'";
    $connect = mysqli_query($db, $status_query);
    $status = mysqli_fetch_assoc($connect);

    if ($status['status'] == 'deactive') {
        $status_update = "UPDATE admins SET status = 'active' WHERE id='$id'";
        mysqli_query($db, $status_update);
        header("location: ../index.php");
    }else{
        $status_update = "UPDATE admins SET status = 'deactive' WHERE id='$id'";
        mysqli_query($db, $status_update);
        header("location: ../index.php");

    }
}

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];
    $delete_query = "DELETE FROM admins WHERE id='$id'";
    mysqli_query($db, $delete_query);
    header("location: ../index.php");
}

?>