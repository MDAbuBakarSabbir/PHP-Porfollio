<?php
include("../config/database_conn.php");

if (isset($_POST['addskillbtn'])) {
   $title = $_POST['skill_title'];
   $description = $_POST['description'];
   $ability = $_POST['ability'];

    if (!$title && !$description && !$ability) {
        $_SESSION['skills_error'] = "Fill in the blanks!!";
        header("location: ../addSkills.php");
    }else{
        $skills_query = "INSERT INTO skills(name, descrption, ability) VALUES ('$title','$description','$ability')";
        mysqli_query($db, $skills_query);
        $_SESSION['skills'] = "Skill Add Sucessfull";
        header("location: ../skills.php");
    }
}

if (isset($_POST['editskillbtn'])) {
    $title = $_POST['skill_title'];
   $description = $_POST['description'];
   $ability = $_POST['ability'];
    $skillsup_query = "UPDATE `skills` SET name ='$title', descrption ='$description',`ability`='$ability'";
        mysqli_query($db, $skillsup_query);
        $_SESSION['skills'] = "Skill Update Sucessfull";
        header("location: ../skills.php");
}


if(isset($_GET['statusid'])){
    $id = $_GET['statusid'];

    $getQuery = "SELECT * FROM skills WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $skills = mysqli_fetch_assoc($connect);


    if($skills['status'] == 'deactive'){
        $update_query = "UPDATE skills SET status='active' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['skills_success'] = "SKill Status Update Successfull"; 
        header('location: ../skills.php');
    }else{
        $update_query = "UPDATE skills SET status='deactive' WHERE id='$id'";
        mysqli_query($db,$update_query);
        $_SESSION['skills_success'] = "Service Status Successfully Complete"; 
        header('location: ../skills.php');
    }
}

?>