<?php 
include ("config/database_conn.php");
include ("extends/header.php");

$brands_query = "SELECT * FROM brands";
$brands = mysqli_query($db, $brands_query);
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Brands</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-grid gap-2 d-flex justify-content-between">
                <p>Brand List</p>
                <form action="addBrands.php" method="POST">
                    <a href="addBrands.php" class="btn btn-primary"><i class="material-icons">add</i>Add</a>
                </form>
                </div>
                
            </div>
            <div class="card-body">
            <div class="example-content">
            <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $num = 1;
             foreach ($brands as $brand) {?>
                <th scope="row"><?= $num++?></th>               
                <td><?=($brand['image'])?></td>
                <td><?=($brand['name'])?></td>
                <td>
                    <a href="menuScript/brands.php?statusid=<?= $brand['id'] ?>" class="<?= ($brand['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $brand['status'] ?></a>
                </td>
                <td>
                    <div class="d-flex justify-content-around align-items-center"> 
                        <a href="editBrand.php?editid=<?= $brand['id'] ?>" class="text-primary fa-2x">
                        <i class="material-icons">edit_square</i>
                        </a>
                        <a href="menuScript/brands.php?deleteid=<?= $brand['id'] ?>" class="text-danger fa-2x">
                            <i class="fa fa-trash-o"></i>
                        </a>
                    </div>
                </td>
            </tr>
            <?php }?>
        </tbody>
    </table>
</div>
            </div>
        </div>
    </div>
</div>