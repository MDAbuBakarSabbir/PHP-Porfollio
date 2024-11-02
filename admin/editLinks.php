<?php

include 'extends/header.php';

include 'icons/icons.php';


if(isset($_GET['editid'])){
    $id = $_GET['editid'];
    $getQuery = "SELECT * FROM links WHERE id='$id'";
    $connect = mysqli_query($db,$getQuery);
    $links = mysqli_fetch_assoc($connect);
}


?>


<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Update <?= $links['name'] ?> Link</h4> 
            </div>
            <div class="card-body">
                <form action="menuScript/links.php?update=<?= $links['id'] ?>" method="POST">
                    <label for="exampleInputEmail1" class="form-label my-2">Social Name</label>
                    <input name="socialname" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $links['name'] ?>">
                    <label for="exampleInputEmail1" class="form-label my-2">Social Link</label>
                    <input name="link" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $links['link'] ?>">
                    <label for="exampleInputEmail1" class="form-label my-2">Icon</label>
                    <input name="icon" type="text" readonly class="form-control" id="hudai" aria-describedby="emailHelp" value="<?= $links['icon'] ?>">
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