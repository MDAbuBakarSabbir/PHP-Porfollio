<?php
// session_start();
    include("extends/header.php");
    $woner_query = "SELECT * FROM woner";
    $connect = mysqli_query($db,$woner_query);
    $woner = mysqli_fetch_assoc($connect);

    $logo_query = "SELECT * FROM logos";
    $connect = mysqli_query($db,$logo_query);
    $logos = mysqli_fetch_assoc($connect);

    $main_image = "SELECT * FROM woner";
    $connect = mysqli_query($db,$main_image);
    $woner_image = mysqli_fetch_assoc($connect);

    $logos_query = "SELECT * FROM logos";
    $connect = mysqli_query($db,$logos_query);
    $logo = mysqli_fetch_assoc($connect);
?>
<title>Profile</title>
<div class="row">
    <div class="col">
        <div class="page-description">
            <h1>Profile</h1>
        </div>

                <?php if (isset($_SESSION['updatesuccess'])) { ?>
                <div class="alert alert-custom" role="alert">
                    <div class="custom-alert-icon icon-success"><i class="material-icons-outlined">done</i></div>
                    <div class="alert-content">
                    <span class="alert-title"><?= $_SESSION['author_name']; ?></span>
                    <span class="alert-title"><?= $_SESSION['updatesuccess']; ?></span>
                    </div>
                 </div>
                <?php } unset($_SESSION['updatesuccess'])?>


                <form action="menuScript/profile.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Upload Favicon and Logo</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                <div class="col-6">
                                    <picture class="d-block my-4">
                                    <?php if($logo['favicon'] == 'favicon.png'){?>
                                        <img id="port_show_img" src="../frontend/img/logo/default/favicon.png" style="width:100px; height: 100px; object-fit:contain">
                                        <?php }else{ ?>
                                            <img id="port_show_img" src="../frontend/img/logo/uploads/<?= $logo['favicon'] ?>" style="width:100px; height: 100px; object-fit:contain">
                                        <?php } ?>                                    
                                    </picture>
                                        <label for="settingsPhoneNumber" class="form-label">Favicon Upload</label>
                                        <input onchange="document.querySelector('#port_show_img').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" aria-describedby="emailHelp" name="favicon">
                                        <div id="emailHelp" class="form-text">Image size : height: 635px,width: 434px for better output</div>
                                    <div class="d-grid gap-2 col mx-auto my-3">
                                        <button class="btn btn-primary" name="faviconbtn" type="submit">Update</button>
                                    </div>
                                </div>

                                <!-- Upload logo  -->

                                    <div class="col-6">
                                    <picture class="d-block my-4">
                                        <?php if($logo['logo'] == 'logo.png'){?>
                                        <img id="port_show_top_img" src="../frontend/img/logo/default/logo.png" alt="" style="width:100px; height: 100px; object-fit:contain">
                                        <?php }else{ ?>
                                        <img id="port_show_top_img" src="../frontend/img/logo/uploads/<?= $logo['logo'] ?>" alt="" style="width:100px; height: 100px; object-fit:contain">
                                        <?php } ?>
                                    </picture>
                                    <label for="settingsPhoneNumber" class="form-label">Upload Logo</label>
                                    <input onchange="document.querySelector('#port_show_top_img').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" aria-describedby="emailHelp" name="logo">
                                        <div id="emailHelp" class="form-text">Image size : height: 850px, width: 600px for better output</div>
                                        <?php if (isset($_SESSION['firstimg_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['firstimg_error']?></div>
                                        <?php } unset($_SESSION['firstimg_error']);?>                 
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="logobtn" type="submit">Upload</button>
                                        </div> 
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>
        <div class="row">
            <div class="col">
                        <!-- Name and Description Update section  -->
                        <form action="menuScript/profile.php" method="POST">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Update Your Information</h4>
                                <!-- <a href="editServices.php" class="text-primary fa-2x"><i class="material-icons">edit_square</i>Edit</a> -->
                                <button name="profileEditbtn" class="btn btn-primary"><i class="material-icons">edit_square</i>Edit</button>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">

                                        <label for="settingsInputFirstName" class="form-label">Full Name</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['name_error'])) ? 'is-invalid' : ''?>" name="profilename" value="<?= $woner['name']?>" disabled>


                                        <label for="settingsInputLastName" class="form-label my-2">Short Description </label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['descrip_error'])) ? 'is-invalid' : ''?>" name="shortdes" value="<?= $woner['short_des']?>" disabled>




                                    </div>

                                    <div class="col-md-6">
                                        <label for="settingsPhoneNumber" class="form-label">Phone Number</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['Phone_error'])) ? 'is-invalid' : ''?>" name="phone_no" value="<?= $woner['phone']?>" disabled>


                                        <label for="settingsInputEmail" class="form-label my-2">Email address</label>
                                        <input type="email" class="form-control <?= (isset($_SESSION['email_error'])) ? 'is-invalid' : ''?>" name="email_up" aria-describedby="settingsEmailHelp"value="<?= $woner['email']?>" disabled>



                                    </div>
                                    <div class="col">
                                        <label for="settingsInputEmail" class="form-label my-2">Address</label>
                                        <input type="text" class="form-control <?= (isset($_SESSION['address_error'])) ? 'is-invalid' : ''?>" name="address" aria-describedby="settingsEmailHelp" value="<?= $woner['address']?>" disabled>

                                    </div>                                    
                                </div>
                            </div>
                        </div>
                        </form>
                        
                        <!-- Picture  Update section  -->
                        
                        <form action="menuScript/profile.php" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Update Picture and Logo</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                    <picture class="d-block my-4">
                                        <?php if($woner_image['first_img'] == 'top.png'){?>
                                        <img id="port_show_top_img" src="../frontend/img/profile/default/top.png" alt="" style="width:100px; height: 100px; object-fit:contain">
                                        <?php }else{ ?>
                                        <img id="port_show_top_img" src="../frontend/img/profile/uploads/<?= $woner_image['first_img'] ?>" alt="" style="width:100px; height: 100px; object-fit:contain">
                                        <?php } ?>
                                    </picture>
                                    <label for="settingsPhoneNumber" class="form-label">Top Picture</label>
                                    <input onchange="document.querySelector('#port_show_top_img').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" aria-describedby="emailHelp" name="Top_img">
                                        <div id="emailHelp" class="form-text">Image size : height: 850px, width: 600px for better output</div>
                                        <?php if (isset($_SESSION['firstimg_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['firstimg_error']?></div>
                                        <?php } unset($_SESSION['firstimg_error']);?>                 
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="firstimgubtn" type="submit">Upload</button>
                                        </div> 
                                    </div>
                                <!------------About me picture update ------------>
                                    <div class="col-6">
                                    <picture class="d-block my-4">
                                    <?php if($woner_image['aboutme_img'] == 'aboutme_img.png'){?>
                                        <img id="port_show_img" src="../frontend/img/profile/default/aboutme.png" style="width:100px; height: 100px; object-fit:contain">
                                        <?php }else{ ?>
                                        <img id="port_show_img" src="../frontend/img/profile/uploads/<?= $woner_image['aboutme_img'] ?>" style="width:100px; height: 100px; object-fit:contain">
                                        <?php } ?>
                                    </picture>
                                    <label for="settingsPhoneNumber" class="form-label">About ME Picture</label>
                                    <input onchange="document.querySelector('#port_show_img').src = window.URL.createObjectURL(this.files[0])" type="file" class="form-control" aria-describedby="emailHelp" name="about_img">
                                        <div id="emailHelp" class="form-text">Image size : height: 635px,width: 434px for better output</div>

                                        <?php if (isset($_SESSION['aboutimg_error'])) {?>
                                        <div class="form-text m-b-md text-danger"><?= $_SESSION['aboutimg_error']?></div>
                                        <?php } unset($_SESSION['aboutimg_error']);?>
                                        <div class="d-grid gap-2 col mx-auto my-3">
                                            <button class="btn btn-primary" name="aboutimgubtn" type="submit">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </form>

                        <!-- About Me section  -->
        <div class="row">
            <div class="col">
                <form action="menuScript/profile.php" method="POST">
                <div class="card">
                    <div class="card-header">
                        <h4>Update About Me Description</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <label for="settingsAbout" class="form-label">Introduction</label>
                                <textarea class="form-control" name="aboutme_des"  maxlength="10000" rows="4" aria-describedby="settingsAboutHelp" style="height: 165px;" placeholder="Introduction About your Self.."></textarea>
                                <div id="emailHelp" class="form-text">Brief information about you to display on profile (max: 500 characters)</div> 
                                <?php if (isset($_SESSION['aboutme_des_error'])) {?>
                                <div class="form-text m-b-md text-danger"><?= $_SESSION['aboutme_des_error']?></div>
                                <?php } unset($_SESSION['aboutme_des_error']);?>           
                                <div class="d-grid gap-2 col mx-auto my-4">
                                    <button class="btn btn-primary" name="aboutdesubtn" type="submit">Update</button>
                                </div>
                            </div>                          
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>

        
    </div>
</div>


<?php
include("extends/footer.php");

?>