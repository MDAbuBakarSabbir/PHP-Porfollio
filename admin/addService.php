<?php
include("extends/header.php");
include("icons/icons.php");
?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <p>Add Service</p>
            </div>
            <?php if(isset($_SESSION['addservice_error'])){ ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">cancel</i></div>
                <div class="alert-content">
                    <span class="alert-title">SERVICE ADD UNSUCCESSFULL</span>
                    <span class="alert-text"><?= $_SESSION['addservice_error'] ?></span>
                </div>
            </div>
            <?php }unset($_SESSION['addservice_error']);?>
            <div class="card-body">
                <form action="menuScript/services.php" method="POST">
                <label for="exampleInputEmail1" class="form-label">Service Title</label>
                <input type="text" class="form-control" name="service_title" aria-describedby="emailHelp">
                <label for="exampleInputEmail1" class="form-label">Service Description</label>
                <textarea type="text" class="form-control" name="service_des" ></textarea>
                <label for="exampleInputEmail1" class="form-label">Service Icon</label>
                <input type="text" name="icon" readonly class="form-control" id="hudai"  aria-describedby="emailHelp">
                <div class="card my-3">
                    <div class="card-body" style="overflow-y: scroll; height:300px;">
                        <div class="fa-2x">
                        <?php foreach($icons as $icon) : ?>
                        <span class="m-2">
                        <i class="<?= $icon ?>" onclick="myFun(event)"></i>
                        </span>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                    <div class="d-grid gap-2 my-3">
                        <button name="addservice" class="btn btn-primary" type="submit"><i class="material-icons">add</i>Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<script>

let hudai = document.querySelector('#hudai');

function myFun(e){
    hudai.value = e.target.classList.value
}

</script>












