<?php 
include ("config/database_conn.php");
include ("extends/header.php");

$skill_list_query = "SELECT * FROM skills";
$skills = mysqli_query($db,$skill_list_query);
?>

<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Skills</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <div class="d-grid gap-2 d-flex justify-content-between">
                <p>Skills List</p>
                <form action="addskills.php" method="POST">
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
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Ability</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php
            $num = 1;
            foreach ($skills as $skill) {?>
                <th scope="row"><?= $num++?></th>               
                <td><?=($skill['name'])?></td>
                <td><?=($skill['descrption'])?></td>
                <td><?=($skill['ability'])?></td>
                <td>
                <a href="menuScript/skills.php?statusid=<?= $skill['id'] ?>" class="<?= ($skill['status'] == 'deactive') ? 'badge bg-danger' : 'badge bg-success' ?> text-white"><?= $skill['status'] ?></a>
                </td>
                <td>
                        <div class="d-flex justify-content-around align-items-center"> 
                            <a href="editSkills.php?editid=<?= $skill['id'] ?>" class="text-primary fa-2x">
                            <i class="material-icons">edit_square</i>
                            </a>
                            <a href="menuScript/skills.php?deleteid=<?= $skill['id'] ?>" class="text-danger fa-2x">
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