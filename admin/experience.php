<?php 
include ("config/database_conn.php");
include ("extends/header.php");
$experience = "SELECT * FROM experience";
$exps = mysqli_query($db,$experience);
// $services = mysqli_fetch_assoc($connect);
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Expericence</h1>
        </div>
    </div>
</div>

<?php if(isset($_SESSION['success'])){ ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                <div class="alert-content">
                    <span class="alert-title">SUCCESSFULL</span>
                    <span class="alert-text"><?= $_SESSION['success'] ?></span>
                </div>
            </div>
            <?php }unset($_SESSION['success']);?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <p>Experience List</p>
                <form action="addExp.php" method="POST">
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
                <th scope="col">Number</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $num = 1;
            foreach ($exps as $exp) {?>
                <th scope="row"><?= $num++?></th>               
                <td><i class="fa-2x <?= $exp['icon'] ?>"></i></td>
                <td><?= $exp['title']?></td>
                <td><?= $exp['number']?></td>
                <td>
                <a href="menuScript/experience.php?statusid=<?= $exp['id'] ?>" class="<?= ($exp['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $exp['status'] ?></a>
                </td>
                <td>
                        <div class="d-flex justify-content-around align-items-center"> 
                            <a href="editExp.php?editid=<?= $exp['id'] ?>" class="text-primary fa-2x">
                            <i class="material-icons">edit_square</i>
                            </a>
                            <a href="menuScript/experience.php?deleteid=<?= $exp['id'] ?>" class="text-danger fa-2x">
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
