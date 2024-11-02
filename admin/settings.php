<?php
include ("extends/header.php");
include ("./icons/icons.php");
$id = $_SESSION["author_id"];
$query = "SELECT * FROM admins WHERE id = '$id'";
$connect = mysqli_query($db, $query);
$admin = mysqli_fetch_assoc($connect);
?>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Settings</h1>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h4>Update Profile Picture</h4>
            </div>
            <div class="card-body">
            <picture class="d-block my-4">
                <?php if($admin['image'] == 'default.png'){?>
                    <img id="port_show_img" src="./assets//images/profile/default/default.png" alt="" style="width:100px; height: 100px; object-fit:contain">
                    <?php }else{ ?>
                    <img id="port_show_img" src="assets//images/profile/uploads/<?= $admin['image'] ?>" alt="" style="width:100px; height: 100px; object-fit:contain">
                    <?php } ?>
            </picture>
            <form action="menuScript/settings.php?adminid=<?= $admin['id'] ?>">
            <label for="exampleInputEmail1" class="form-label">Profile Picture</label>
            <input type="file" class="form-control" name="admin_img" aria-describedby="emailHelp">
            <div class="d-grid gap-2 my-3">
                <button class="btn btn-primary" name="adminimgbtn" type="submit">Upload</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">    
                <h4>Update Your information</h4>
            </div>
            <div class="card-body">        
            <form action="./menuScript/settings.php?infoid=<?= $admin['id'] ?>" method="POST">
                <div class="example-content">
                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $admin['name'] ?>">

                    <label for="exampleInputEmail1" class="form-label">Phone</label>
                    <input type="text" name="phone" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $admin['phone'] ?>">
                    
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $admin['email'] ?>">
                    <div class="d-grid gap-2 my-3">
                        <button class="btn btn-primary" name="admininfobtn" type="submit">Update</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                <h4>Change Your Password</h4>
            </div>
            <div class="card-body">
                <form action="menuScript/settings.php?passid=<?= $admin['id'] ?>" method="POST">
                    <label for="" class="form-label">Old Password</label>
                    <input type="password" name="oldpassword" class="form-control <?= (isset($_SESSION['pass_error'])) ? 'is-invalid':'';unset($_SESSION['pass_error']); ?>"  placeholder="Enter old Password">
                    <?php if(isset($_SESSION['pass_error'])){ ?>
                        <h4>error</h4>
                    <?php }unset($_SESSION['pass_error']); ?>
                    <label for="" class="form-label my-2">New Password</label>
                    <input type="password" name="newpassword" class="form-control <?= (isset($_SESSION['pass_error'])) ? 'is-invalid':'';unset($_SESSION['pass_error']); ?>" placeholder="Enter New Password">
                    <label for="" class="form-label my-2">Confirm New Password</label>
                    <input type="password" name="c_newpassword" class="form-control <?= (isset($_SESSION['pass_error'])) ? 'is-invalid':'';unset($_SESSION['pass_error']); ?>" placeholder="Enter Confirm Password">
                    <div class="d-grid gap-2 my-3">
                        <button class="btn btn-primary" type="submit" name="passupbtn" >Change</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



<?php
include ("extends/footer.php");
?>