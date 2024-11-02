<?php
include("extends/header.php");
include("icons/icons.php");
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Add Skills</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <p>Add Skills</p>
            </div>
            <div class="card-body">
                <form action="menuScript/skills.php" method="POST">
                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" class="form-control" name="skill_title" aria-describedby="emailHelp">

                
                <label for="exampleInputEmail1" class="form-label">Short Description</label>
                <textarea type="text" class="form-control" name="description" ></textarea>

                <label for="exampleInputEmail1" class="form-label">Ability</label>
                <input type="text" name="ability" class="form-control" aria-describedby="emailHelp">
                    <div class="d-grid gap-2 my-3">
                        <button name="addskillbtn" class="btn btn-primary" type="submit"><i class="material-icons">add</i>Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>












