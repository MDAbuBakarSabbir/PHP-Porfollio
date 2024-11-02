<?php 
include ("config/database_conn.php");
include ("extends/header.php");
$servicelist_query = "SELECT * FROM services";
$services = mysqli_query($db,$servicelist_query);
// $services = mysqli_fetch_assoc($connect);
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Services</h1>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['service_success'])){ ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">SERVICE UPDATE SUCCESSFULL</span>
                    <span class="alert-text"><?= $_SESSION['service_success'] ?></span>
                </div>
            </div>
            <?php }unset($_SESSION['service_success']);?>

<?php if(isset($_SESSION['service_error'])){ ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">cancel</i></div>
                <div class="alert-content">
                    <span class="alert-title">SERVICE ADD UNSUCCESSFULL</span>
                    <span class="alert-text"><?= $_SESSION['service_error'] ?></span>
                </div>
            </div>
            <?php }unset($_SESSION['service_error']);?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <p>Service List</p>
                <form action="addService.php" method="POST">
                    <button name="editbtn" class="btn btn-primary"><i class="material-icons">add</i>Add</button>
                </form>
            </div>
            <div class="card-body">
            <div class="example-content">
            <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Icon</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $num = 1;
            foreach ($services as $service) {?>
                <th scope="row"><?= $num++?></th>               
                <td><i class="fa-2x <?= $service['icon'] ?>"></i></td>
                <td><?= $service['title']?></td>
                <td><?= $service['description']?></td>
                <td>
                <a href="menuScript/services.php?statusid=<?= $service['id'] ?>" class="<?= ($service['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $service['status'] ?></a>
                </td>
                <td>
                        <div class="d-flex justify-content-around align-items-center"> 
                            <a href="editServices.php?editid=<?= $service['id'] ?>" class="text-primary fa-2x">
                            <i class="material-icons">edit_square</i>
                            </a>
                            <a href="menuScript/services.php?deleteid=<?= $service['id'] ?>" class="text-danger fa-2x">
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
