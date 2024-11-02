<?php
// session_start();
    include("extends/header.php");
    $woner_query = "SELECT * FROM woner";
    $connect = mysqli_query($db,$woner_query);
    $woner = mysqli_fetch_assoc($connect);

?>
<title>Profile</title>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Profile</h1>
        </div>
                <?php if (isset($_SESSION['infoup_error'])) { ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">cancel</i></div>
                    <div class="alert-content">
                    <span class="alert-title"><?= $_SESSION['author_name']; ?></span>
                    <span class="alert-title"><?= $_SESSION['infoup_error']; ?></span>
                    </div>
                 </div>
                <?php } unset($_SESSION['infoup_error'])?>
        <div class="row">
            <div class="col">
                        <!-- Name and Description Update section  -->
                        <div class="card">
                        <form action="menuScript/profile.php" method="POST">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Update Your Information</h4>
                            </div>
                            <div class="card-body">
                            
                                <div class="row">
                                    <div class="col-md-6">

                                        <label for="settingsInputFirstName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : ''?>" name="profilename" value="<?= $woner['name']?>">

                                        <label for="settingsInputLastName" class="form-label my-2">Short Description </label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['descrip_error'])) ? 'is-invalid' : ''?>" name="shortdes" value="<?= $woner['short_des']?>">

                                    </div>

                                    <div class="col-md-6">
                                        <label for="settingsPhoneNumber" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['Phone_error'])) ? 'is-invalid' : ''?>" name="phone_no" value="<?= $woner['phone']?>">


                                        <label for="settingsInputEmail" class="form-label my-2">Email address</label>
                                        <input type="email" class="form-control <?= (isset($_SESSION['email_error'])) ? 'is-invalid' : ''?>" name="email_up" aria-describedby="settingsEmailHelp" value="<?= $woner['email']?>">

                                    </div>
                                    <div class="col">
                                        <label  class="form-label my-2">Address</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['address_error'])) ? 'is-invalid' : ''?>" name="address" aria-describedby="settingsEmailHelp" value="<?= $woner['address']?>">
                                    </div>                                    
                                </div>
                                <div class="d-grid gap-2 col mx-auto my-3">
                                    <button class="btn btn-primary" name="infoupbtn" type="submit">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                      

<?php
include("extends/footer.php");

?>