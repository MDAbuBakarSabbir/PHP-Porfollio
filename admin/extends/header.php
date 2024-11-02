<?php
session_start();
include ("config/database_conn.php");
if (!isset($_SESSION["author_id"])) {
        header("location: auth/login.php");
     }

      $_SERVER['PHP_SELF'];
     $explode = explode('/', $_SERVER['PHP_SELF']);
     $id = $_SESSION["author_id"];
     $link = end($explode);
     $adimg_query = "SELECT * FROM admins WHERE id='$id'";
     $conection = mysqli_query($db, $adimg_query);
     $user = mysqli_fetch_assoc($conection);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    
    <!-- Title -->
    <title>Dashboard</title>

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="assets/plugins/pace/pace.css" rel="stylesheet">

    
    <!-- Theme Styles -->
    <link href="assets/css/main.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">

    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/SAVALON.png" />
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/SAVALON.png" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="app align-content-stretch d-flex flex-wrap">
        <div class="app-sidebar">
            <div class="logo">
                <a href="index.html" class="logo-icon"><span class="logo-text">SAVALON TECHNOLOGIES</span></a>
                <div class="sidebar-user-switcher user-activity-online">
                    <a href="#">
                    <?php if ($user['image'] == 'default.png') { ?>
                        <img src="../assets/images/profile/default/default.png" alt="img">
                        <?php }else{  ?>
                        <img src="assets\images\profile/uploads/<?= $user['image'] ?>">
                        <?php } ?>
                        <span class="activity-indicator"></span>
                        <span class="user-info-text"><?= $_SESSION["author_name"] ?><br><span class="user-state-info">ACTIVE NOW</span></span>
                    </a>
                </div>
            </div>
            <div class="app-menu">
                <ul class="accordion-menu">
                    <!-- <li class="sidebar-title">
                        Apps
                    </li> -->
                    <li class="<?= $link == 'index.php'?'active-page':''?>">
                        <a href="index.php" class="active"><i class="material-icons-two-tone">dashboard</i>Dashboard</a>
                    </li>
                    <li class="<?= $link == 'profile.php'?'active-page':''?>">
                        <a href="profile.php" class="active"><i class="material-icons-two-tone">person</i>Profile</a>
                    </li>
                    <li class="<?= $link == 'links.php'?'active-page':''?>">
                        <a href="links.php" class="active"><i class="material-icons-two-tone">link</i>Social Links</a>
                    </li>
                    <li class="<?= $link == 'skills.php'?'active-page':''?>">
                        <a href="skills.php" class="active"><i class="material-icons-two-tone">engineering</i>Skills</a>
                    </li>
                    <li class="<?= $link == 'services.php'?'active-page':''?>">
                        <a href="services.php" class="active"><i class="material-icons-two-tone">design_services</i>Services</a>
                    </li>
                    <li class="<?= $link == 'recent_works.php'?'active-page':''?>">
                        <a href="recent_works.php" class="active"><i class="material-icons-two-tone">work_history</i>Recents Works</a>
                    </li>
                    <li class="<?= $link == 'experience.php'?'active-page':''?>">
                        <a href="experience.php" class="active"><i class="material-icons-two-tone">dashboard</i>Expericence</a>
                    </li>
                    <li class="<?= $link == 'customer_reviews.php'?'active-page':''?>">
                        <a href="customer_reviews.php" class="active"><i class="material-icons-two-tone">star_half</i>Customer Reviews</a>
                    </li>
                    <li class="<?= $link == 'brands.php'?'active-page':''?>">
                        <a href="brands.php" class="active"><i class="material-icons-two-tone">hive</i>Brands</a>
                    </li>
                    
                    <li>
                        <a href=""><i class="material-icons-two-tone">people</i>Admin<i class="material-icons has-sub-menu">keyboard_arrow_right</i></a>
                        <ul class="sub-menu">
                            <li>
                                <a href="settings.php">Settings</a>
                            </li>
                            <li>
                                <a href="add_admin.php">Add Admin</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="app-container">
            <div class="search">
                <form>
                    <input class="form-control" type="text" placeholder="Type here..." aria-label="Search">
                </form>
                <a href="#" class="toggle-search"><i class="material-icons">close</i></a>
            </div>
            <div class="app-header">
                <nav class="navbar navbar-light navbar-expand-lg">
                    <div class="container-fluid">
                        <div class="navbar-nav" id="navbarNav">
                            <ul class="navbar-nav">

                            </ul>
            
                        </div>
                        <div class="d-flex">
                            <ul class="navbar-nav">
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link " href="add_admin.php">Add Admin</a>
                                </li>
                                <li class="nav-item hidden-on-mobile">
                                    <a class="nav-link" href="extends/logout.php">Logout</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="app-content">
                <div class="content-wrapper">
                    <div class="container"></div>