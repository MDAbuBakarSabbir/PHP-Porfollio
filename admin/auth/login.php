<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="author" content="stacks">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/plugins/perfectscroll/perfect-scrollbar.css" rel="stylesheet">
    <link href="../assets/plugins/pace/pace.css" rel="stylesheet">
    <link href="../assets/css/main.min.css" rel="stylesheet">
    <link href="../assets/css/custom.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/images/neptune.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/neptune.png">
</head>
<body class="pace-done no-loader"><div class="pace pace-inactive"><div class="pace-progress" style="transform: translate3d(100%, 0px, 0px);" data-progress-text="100%" data-progress="99">
  <div class="pace-progress-inner"></div>
</div>
<div class="pace-activity"></div></div>
    <div class="app app-auth-sign-in align-content-stretch d-flex flex-wrap justify-content-center">
        <div class="app-auth-container">
            <div class="logo">
                <a href="../index.php">SAVALON TECHNOLOGIES</a>
            </div>
            <?php if(isset($_SESSION['login_error'])){ ?>
            <div class="alert alert-custom" role="alert">
                <div class="custom-alert-icon icon-danger"><i class="material-icons-outlined">cancel</i></div>
                <div class="alert-content">
                    <span class="alert-title">LOGIN UNSUCCESSFULL</span>
                    <span class="alert-text"><?= $_SESSION['login_error'] ?></span>
                </div>
            </div>
            <?php }unset($_SESSION['login_error']);?>
            <form action="script/login.php" method="POST">
                <div class="auth-credentials m-b-xxl">
                    <label for="signInEmail" class="form-label">Email address</label>
                    <input type="text" class="form-control m-b-md" name="loginemail" aria-describedby="signInEmail" placeholder="example@gmail.com">

                    <label for="signInPassword" class="form-label">Password</label>
                    <input type="password" class="form-control" name="loginpassword" aria-describedby="signInPassword" placeholder="●●●●●●●●">
                </div>
                <div class="auth-submit">
                    <button type="submit" name="loginbtn" class="btn btn-primary">Login</button>
                </div>
            </form>
    
    <!-- Javascripts -->
    <script src="../assets/plugins/jquery/jquery-3.5.1.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/plugins/perfectscroll/perfect-scrollbar.min.js"></script>
    <script src="../assets/plugins/pace/pace.min.js"></script>
    <script src="../assets/js/main.min.js"></script>
    <script src="../assets/js/custom.js"></script>

</body>
</html>