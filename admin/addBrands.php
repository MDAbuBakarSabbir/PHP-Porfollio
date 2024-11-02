<?php
include("extends/header.php");
include("icons/icons.php");
?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <p>Add Brand</p>
            </div>
            <div class="card-body">
                <form action="menuScript/brands.php" method="POST" enctype="multipart/form-data" >
                <label for="exampleInputEmail1" class="form-label">Brand Name</label>
                <input type="text" class="form-control" name="brand_name" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Brand Link</label>
                <input type="text" name="link" class="form-control" aria-describedby="emailHelp">

                <picture class="d-block my-4">
                    <img id="port_show_img" src="" alt="" style="width:100px; height: 100px; object-fit:contain">
                </picture>
                <label for="exampleInputEmail1" class="form-label">Brand Image</label>
                <input onchange="document.querySelector('#port_show_img').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" aria-describedby="emailHelp" name="image">
                    <div class="d-grid gap-2 my-3">
                        <button name="addbrands" class="btn btn-primary" type="submit"><i class="material-icons">add</i>Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>












