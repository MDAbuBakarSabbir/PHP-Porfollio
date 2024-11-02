<?php
include("extends/header.php");
include("icons/icons.php");

if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $getQuery = "SELECT * FROM recent_works WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $recent_works = mysqli_fetch_assoc($connect);
}
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Edit Work</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <p>Edit Work</p>
            </div>
            <div class="card-body">
                <form action="menuScript/works.php" method="POST" enctype="multipart/form-data" >

                <label for="exampleInputEmail1" class="form-label">Title</label>
                <input type="text" class="form-control" name="skill_title" aria-describedby="emailHelp" value="<?= $recent_works['title'] ?>">

                <label for="exampleInputEmail1" class="form-label">Sub Title</label>
                <input type="text" class="form-control" name="skill_title" aria-describedby="emailHelp" value="<?= $recent_works['sub_title'] ?>">

                
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="description"><?= $recent_works['description'] ?></textarea>

                <picture class="d-block my-4">
                    <img id="port_show_img" src="../frontend/img/recent_works/uploads/<?= $recent_works['image'] ?>" alt="" style="width:100px; height: 100px; object-fit:contain">
                </picture>
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input onchange="document.querySelector('#port_show_img').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" aria-describedby="emailHelp" name="workimage">

                    <div class="d-grid gap-2 my-3">
                        <button name="update" class="btn btn-primary" type="submit"><i class="material-icons">add</i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>












