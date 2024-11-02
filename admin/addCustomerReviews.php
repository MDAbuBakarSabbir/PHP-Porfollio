<?php
include("extends/header.php");
include("icons/icons.php");
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Add Customer Reviews</h1>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <p>Add Customer Reviews</p>
            </div>
            <div class="card-body">
                <form action="menuScript/reviews.php" method="POST" enctype="multipart/form-data">
                <label for="exampleInputEmail1" class="form-label">Customer Name</label>
                <input type="text" class="form-control" name="customer_name" aria-describedby="emailHelp">

                <label for="exampleInputEmail1" class="form-label">Customer Position</label>
                <input type="text" name="position" class="form-control" aria-describedby="emailHelp">
                
                <label for="exampleInputEmail1" class="form-label">Description</label>
                <textarea type="text" class="form-control" name="description" ></textarea>
                <picture class="d-block my-4">
                        <img id="port_show_img" src="../../public/uploads/default/default.jpg" alt="" style="width:100px; height: 100px; object-fit:contain">
                    </picture>
                <label for="exampleInputEmail1" class="form-label">Image</label>
                <input onchange="document.querySelector('#port_show_img').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" aria-describedby="emailHelp" name="reviewimage">

                    <div class="d-grid gap-2 my-3">
                        <button name="reviewubtn" class="btn btn-primary" type="submit"><i class="material-icons">add</i>Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>












