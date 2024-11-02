<?php 
include ("config/database_conn.php");
include ("extends/header.php");

$customer_reviews_query = "SELECT * FROM customers_reviews";
$customers_reviews = mysqli_query($db, $customer_reviews_query);
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Customer Reviews</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-grid gap-2 d-flex justify-content-between">
                <p>Customer Reviews</p>
                <form action="add.php" method="POST">
                    <a href="addCustomerReviews.php" class="btn btn-primary"><i class="material-icons">add</i>Add</a>
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
                <th scope="col">Position</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $num = 1;
             foreach ($customers_reviews as $customer_review) {?>
                <th scope="row"><?= $num++?></th>               
                    <td><?=($customer_review['image'])?></td>
                    <td><?=($customer_review['name'])?></td>
                    <td><?=($customer_review['position'])?></td>
                    <td><?=($customer_review['description'])?></td>
                    <td>
                        <a href="menuScript/reviews.php?statusid=<?= $customer_review['id'] ?>" class="<?= ($customer_review['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $customer_review['status'] ?></a>
                    </td>
                    <td>
                        <div class="d-flex justify-content-around align-items-center"> 
                            <a href="editReviews.php?editid=<?= $customer_review['id'] ?>" class="text-primary fa-2x">
                            <i class="material-icons">edit_square</i>
                            </a>
                            <a href="menuScript/reviews.php?deleteid=<?= $customer_review['id'] ?>" class="text-danger fa-2x">
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