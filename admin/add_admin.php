<?php 
    include ("extends/header.php");
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Add Admins</h1>
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
                    <span class="alert-title">UNSUCCESSFULL</span>
                    <span class="alert-text"><?= $_SESSION['error'] ?></span>
                </div>
            </div>
            <?php }unset($_SESSION['error']);?>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-body">
            <form action="menuScript/add_admin.php" method="POST">
                <label for="exampleInputEmail1" class="form-label">Full Name</label>
                <input type="text" class="form-control <?= (isset($_SESSION['name_error'])) ? 'is-invalid':'';unset($_SESSION['name_error']); ?>"  name="adminName" placeholder="Full Name">

                <?php if(isset($_SESSION['name_error'])){ ?>
                    <div id="emailHelp" class="form-text m-b-md text-danger"><span><?= $_SESSION['name_error'] ?>*</span></div>
                <?php }unset($_SESSION['name_error']);?>


                <label for="exampleInputEmail1" class="form-label">Phone</label>
                <input type="text" class="form-control <?= (isset($_SESSION['phone_error'])) ? 'is-invalid':'';unset($_SESSION['phone_error']); ?>"  name="adminPhone" placeholder="Phone">
                
                <?php if(isset($_SESSION['phone_error'])){ ?>
                    <div id="emailHelp" class="form-text m-b-md text-danger"><span><?= $_SESSION['name_error'] ?>*</span></div>
                <?php }unset($_SESSION['phone_error']);?>

                <label for="exampleInputEmail1" class="form-label">Email</label>
                <input type="text" class="form-control <?= (isset($_SESSION['email_error'])) ? 'is-invalid':'';unset($_SESSION['email_error']); ?>" name="adminEmail" placeholder="Email">

                <?php if(isset($_SESSION['email_error'])){ ?>
                    <div id="emailHelp" class="form-text m-b-md text-danger"><?= $_SESSION['email_error'] ?>*</div>
                <?php }unset($_SESSION['email_error']);?>

                <label for="exampleInputEmail1" class="form-label">Password</label>
                <input type="password" class="form-control <?= (isset($_SESSION['pass_error'])) ? 'is-invalid':'';unset($_SESSION['pass_error']); ?>"  name="adminPassword" placeholder="Password">

                <?php if(isset($_SESSION['pass_error'])){ ?>
                    <div id="emailHelp" class="form-text m-b-md text-danger"><?= $_SESSION['pass_error'] ?>*</div>
                <?php }unset($_SESSION['pass_error']);?>

                <label for="exampleInputEmail1" class="form-label">Confirm Password</label>
                <input type="password" class="form-control <?= (isset($_SESSION['c_pass_error'])) ? 'is-invalid':'';unset($_SESSION['c_pass_error']); ?>"  name="c_Password" placeholder="Confirm Password">

                <?php if(isset($_SESSION['c_pass_error'])){ ?>
                    <div id="emailHelp" class="form-text m-b-md text-danger"><?= $_SESSION['c_pass_error'] ?>*</div>
                <?php }unset($_SESSION['c_pass_error']);?>

                <div class="d-grid gap-2 my-3">
                    <button class="btn btn-primary" name="addadminbtn" type="submit">Add Admin</button>
                </div>
            </form>
            </div>
        </div>
    </div>
</div>

<?php 
    include ("extends/footer.php");
?>
