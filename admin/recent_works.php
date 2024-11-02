<?php 
include ("config/database_conn.php");
include ("extends/header.php");

$recent_work_query = "SELECT * FROM recent_works";
$recent_works = mysqli_query($db,$recent_work_query);
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Recent Works</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-grid gap-2 d-flex justify-content-between">
                <p>Recent Work List</p>
                <form action="addWorks.php" method="POST">
                    <button name="editbtn" class="btn btn-primary"><i class="material-icons">add</i>Add</button>
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
                <th scope="col">Title</th>
                <th scope="col">Sub Title</th>
                <th scope="col">Description</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $num = 1;
            foreach ($recent_works as $recent_work) {?>
                <th scope="row"><?= $num++?></th>               
                <td><?=($recent_work['image'])?></td>
                <td><?=($recent_work['title'])?></td>
                <td><?= $recent_work['sub_title']?></td>
                <td><?=($recent_work['description'])?></td>
                <td>
                <a href="menuScript/works.php?statusid=<?= $recent_work['id'] ?>" class="<?= ($recent_work['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $recent_work['status'] ?></a>
                </td>
                <td>
                        <div class="d-flex justify-content-around align-items-center"> 
                            <a href="editWork.php?editid=<?= $recent_work['id'] ?>" class="text-primary fa-2x">
                            <i class="material-icons">edit_square</i>
                            </a>
                            <a href="menuScript/works.php?deleteid=<?= $recent_work['id'] ?>" class="text-danger fa-2x">
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