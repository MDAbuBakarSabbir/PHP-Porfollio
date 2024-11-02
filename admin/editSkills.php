<?php
include("extends/header.php");
include("icons/icons.php");

if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $getQuery = "SELECT * FROM skills WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $skills = mysqli_fetch_assoc($connect);
}
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Edit Skills</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <p>Edit Skills</p>
            </div>
            <div class="card-body">
                <form action="menuScript/skills.php" method="POST">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" class="form-control" name="skill_title" aria-describedby="emailHelp" value="<?= $skills['name'] ?>">

                
                <label for="exampleInputEmail1" class="form-label">Short Description</label>
                <textarea type="text" class="form-control" name="description"><?= $skills['descrption'] ?></textarea>

                <label for="exampleInputEmail1" class="form-label">Ability</label>
                <input type="text" name="ability" class="form-control" aria-describedby="emailHelp" value="<?= $skills['ability'] ?>">
                    <div class="d-grid gap-2 my-3">
                        <button name="editskillbtn" class="btn btn-primary" type="submit"><i class="material-icons">add</i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>












