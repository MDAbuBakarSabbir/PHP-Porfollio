<?php 
include ("config/database_conn.php");
include ("extends/header.php");

$adminlist_query = "SELECT * FROM admins";
$admins = mysqli_query($db,$adminlist_query);

?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Dashboard</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-8">
        <div class="card">
            <div class="card-header">
                Admins List
            </div>
            <div class="card-body">
            <div class="example-content">
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Full Name</th>
                <th scope="col">Email</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $num = 1;
            $id = $_SESSION['author_id'];
                                
            foreach ($admins as $admin) {
                if($admin['id'] == $id){
                    continue;
                }
                ?>
                <th scope="row"><?= $num++?></th>               
                <td><?= $admin['name']?></td>
                <td><?= $admin['email']?></td>
                <td>
                <a href="menuScript/dashboard.php?statusid=<?= $admin['id'] ?>" class="<?= ($admin['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $admin['status'] ?></a>
                </td>
                <td>
                <div class="d-flex justify-content-around align-items-center"> 
                    <a href="menuScript/dashboard.php?deleteid=<?= $admin['id'] ?>" class="text-danger fa-2x">
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

<div class="row">

</div>




<?php 
    include ("extends/footer.php");
?>
                   