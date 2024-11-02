<?php
include("extends/header.php");
$query = "SELECT * FROM links";
$links = mysqli_query($db, $query);
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Social Links</h1>
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

<?php if(isset($_SESSION['error'])){ ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">cancel</i></div>
                <div class="alert-content">
                    <span class="alert-title">SERVICE ADD UNSUCCESSFULL</span>
                    <span class="alert-text"><?= $_SESSION['error'] ?></span>
                </div>
            </div>
            <?php }unset($_SESSION['error']);?>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <p>Social Link List</p>
                <form action="addlinks.php" method="POST">
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
                <th scope="col">Name</th>
                <th scope="col">Link</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $num = 1;
            foreach ($links as $link) {?>
                <th scope="row"><?= $num++?></th>               
                <td><i class="fa-2x <?= $link['icon'] ?>"></i></td>
                <td><?= $link['name']?></td>
                <td><?= $link['link']?></td>
                <td>
                <a href="menuScript/links.php?statusid=<?= $link['id'] ?>" class="<?= ($link['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $link['status'] ?></a>
                </td>
                <td>
                        <div class="d-flex justify-content-around align-items-center"> 
                            <a href="editLinks.php?editid=<?= $link['id'] ?>" class="text-primary fa-2x">
                            <i class="material-icons">edit_square</i>
                            </a>
                            <a href="menuScript/links.php?deleteid=<?= $link['id'] ?>" class="text-danger fa-2x">
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
