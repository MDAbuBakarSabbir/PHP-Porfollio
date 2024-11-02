<?php

include 'extends/header.php';

include 'icons/icons.php';


if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $getQuery = "SELECT * FROM experience WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $experience = mysqli_fetch_assoc($connect);
}


?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Update Experience - <?= $experience['title'] ?></h4>
            </div>
            <div class="card-body">
                <form action="menuScript/experience.php?update=<?= $experience['id'] ?>" method="POST">
                    <label for="exampleInputEmail1" class="form-label my-2">Title</label>
                    <input name="title" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $experience['title'] ?>">
                    <label for="exampleInputEmail1" class="form-label my-2">Number</label>
                    <input name="number" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $experience['number'] ?>">
                    <label for="exampleInputEmail1" class="form-label my-2">Icon</label>
                    <input name="icon" type="text" readonly class="form-control" id="hudai" aria-describedby="emailHelp" value="<?= $experience['icon'] ?>">
                    <div class="card my-2">
                        <div class="card-body fa-2x" style="overflow-y: scroll; overflow-x:hidden; height:300px;">
                            <?php foreach ($icons as $icon): ?>
                                <span class="m-2">
                                    <i onclick="myFun(event)" class="<?= $icon ?>"></i>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <button type="submit" name="update" class="btn btn-primary mt-3"><i class="material-icons">add</i>Update</button>
                </form>
            </div>
        </div>
    </div>
</div>



<script>
    $input = document.querySelector('#hudai');

    function myFun(e) {
        $input.value = e.target.classList.value;
    }
</script>

<?php

include 'extends/footer.php';

?>