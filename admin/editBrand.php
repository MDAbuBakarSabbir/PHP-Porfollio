<?php
include("extends/header.php");
$id = $_GET['editid'];
$brands_query = "SELECT * FROM brands WHERE id='$id' ";
$connect = mysqli_query($db,$brands_query);
$brands = mysqli_fetch_assoc($connect);
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Edit Customer Reviews</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <p>Edit Customer Reviews</p>
            </div>
            <div class="card-body">
                <form action="menuScript/brands.php" method="POST" enctype="multipart/form-data">
                <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                <input type="text" class="form-control" name="customer_name" aria-describedby="emailHelp" value="<?= $brands['name'] ?>">

                <label for="exampleInputEmail1" class="form-label">Brand Link</label>
                <input type="text" name="position" class="form-control" aria-describedby="emailHelp" value="<?= $brands['link']?>">

                <picture class="d-block my-4">
                    <img id="port_show_img" src="../frontend/img/brand/uploads/<?= $brands['image'] ?>" alt="" style="width:100px; height: 100px; object-fit:contain">
                </picture>
                <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                <input onchange="document.querySelector('#port_show_img').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" aria-describedby="emailHelp" name="workimage">
                    <div class="d-grid gap-2 my-3">
                        <button name="update" class="btn btn-primary" type="submit"><i class="material-icons">add</i>Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>












