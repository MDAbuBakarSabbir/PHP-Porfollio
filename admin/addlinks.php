<?php
include("extends/header.php");
include("icons/icons.php");
?>

<?php if(isset($_SESSION['link_error'])){ ?>
<div class="alert alert-custom" role="alert">
    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">cancel</i></div>
    <div class="alert-content">
        <span class="alert-title">LINK ADD UNSUCCESSFULL</span>
        <span class="alert-text"><?= $_SESSION['link_error'] ?></span>
    </div>
</div>
<?php }unset($_SESSION['link_error']);?>

<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <p>Add Link</p>
            </div>
            
            

            <div class="card-body">
                <form action="menuScript/links.php" method="POST">
                <label for="exampleInputEmail1" class="form-label">Social Media Name </label>
                <input type="text" class="form-control" name="socialname" aria-describedby="emailHelp">
                <label for="exampleInputEmail1" class="form-label">Social Link</label>
                <input type="text" class="form-control" name="link" aria-describedby="emailHelp">              
                <label for="exampleInputEmail1" class="form-label my-2">Social Icon</label>
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
                        <button name="addlinkbtn" class="btn btn-primary" type="submit"><i class="material-icons">add</i>Add</button>
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












