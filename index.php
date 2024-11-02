<?php
    include("admin/config/database_conn.php");
    include("admin/icons/icons.php");
    $woner_query = "SELECT * FROM woner";
    $woner_connect = mysqli_query($db, $woner_query);
    $woner = mysqli_fetch_assoc($woner_connect);

    $skills_query = "SELECT * FROM skills WHERE status='active'";
    $skills = mysqli_query($db, $skills_query);

    $services_query = "SELECT * FROM services WHERE status='active'";
    $services = mysqli_query($db, $services_query);

    $reviews_query = "SELECT * FROM customers_reviews WHERE status='active'";
    $reviews = mysqli_query($db, $reviews_query);

    $brands_query = "SELECT * FROM brands WHERE status='active'";
    $partner_brands = mysqli_query($db, $brands_query);

    $works_query = "SELECT * FROM recent_works WHERE status='active'";
    $recent_works = mysqli_query($db, $works_query);
    
    $links_query = "SELECT * FROM links WHERE status='active'";
    $social_link = mysqli_query($db, $links_query);

    $exp_query = "SELECT * FROM experience WHERE status='active'";
    $experiences = mysqli_query($db, $exp_query);

    $logo_query = "SELECT * FROM logos";
    $logos = mysqli_query($db, $logo_query);
    $logo = mysqli_fetch_assoc($logos);

    // print_r($recent_works);
    // die();
    // $skills = mysqli_fetch_assoc($skills_connect);
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title><?= $woner['name'] ?></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php if($logo['favicon']== 'favicon.png'){ ?>
        <link rel="shortcut icon" type="image/x-icon" href="frontend/img/favicon.png">
        <?php }else{?>
        <link rel="shortcut icon" type="image/x-icon" href="frontend/img/logo/uploads/<?=$logo['favicon'] ?>">
        <?php }?>
        <!-- Place favicon.ico in the root directory -->

		<!-- CSS here -->
        <link rel="stylesheet" href="frontend/css/bootstrap.min.css">
        <link rel="stylesheet" href="frontend/css/animate.min.css">
        <link rel="stylesheet" href="frontend/css/magnific-popup.css">
        <link rel="stylesheet" href="frontend/css/fontawesome-all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="frontend/css/flaticon.css">
        <link rel="stylesheet" href="frontend/css/slick.css">
        <link rel="stylesheet" href="frontend/css/aos.css">
        <link rel="stylesheet" href="frontend/css/default.css">
        <link rel="stylesheet" href="frontend/css/style.css">
        <link rel="stylesheet" href="frontend/css/responsive.css">
    </head>
    <body class="theme-bg">

        <!-- preloader -->
        <div id="preloader">
            <div id="loading-center">
                <div id="loading-center-absolute">
                    <div class="object" id="object_one"></div>
                    <div class="object" id="object_two"></div>
                    <div class="object" id="object_three"></div>
                </div>
            </div>
        </div>
        <!-- preloader-end -->

        <!-- header-start -->
        <header>
            <div id="header-sticky" class="transparent-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="main-menu">
                                <nav class="navbar navbar-expand-lg">
                                    <?php if($logo['logo'] == 'logo.png'){ ?>
                                    <a href="index.php" class="navbar-brand logo-sticky-none"><img src="frontend/img/logo/default/logo.png" alt=""></a>
                                    <a href="index.php" class="navbar-brand s-logo-none"><img src="frontend/img/logo/default/logo.png" alt=""></a>
                                    <?php }else{ ?>
                                    <a href="index.php" class="navbar-brand logo-sticky-none"><img src="frontend/img/logo/uploads/<?=$logo['logo'] ?>" alt="Logo"></a>
                                    <a href="index.php" class="navbar-brand s-logo-none"><img src="frontend/img/logo/uploads/<?=$logo['logo'] ?>" alt="Logo"></a>
                                    <?php }?>
                                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                                        data-target="#navbarNav">
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                        <span class="navbar-icon"></span>
                                    </button>
                                    <div class="collapse navbar-collapse" id="navbarNav">
                                        <ul class="navbar-nav ml-auto">
                                            <li class="nav-item active"><a class="nav-link" href="#home">Home</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#about">about</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#service">service</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#portfolio">portfolio</a></li>
                                            <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                                        </ul>
                                    </div>
                                    <div class="header-btn">
                                        <a href="#" class="off-canvas-menu menu-tigger"><i class="flaticon-menu"></i></a>
                                    </div>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- offcanvas-start -->
            <div class="extra-info">
                <div class="close-icon menu-close">
                    <button>
                        <i class="far fa-window-close"></i>
                    </button>
                </div>
                <div class="logo-side mb-30">
                    <a href="index-2.html">
                        <img src="frontend/img/logo/logo.png" alt="" />
                    </a>
                </div>
                <div class="side-info mb-30">
                    <div class="contact-list mb-30">
                        <h4>Office Address</h4>
                        <p><?= $woner['address'] ?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Phone Number</h4>
                        <p><?= $woner['phone'] ?></p>
                    </div>
                    <div class="contact-list mb-30">
                        <h4>Email Address</h4>
                        <p><?= $woner['email'] ?></p>
                    </div>
                </div>
                <div class="social-icon-right mt-20">
                    <?php foreach ($social_link as $link) { ?>
                        <a href="<?= $link['link'] ?>"><i class="<?= $link['icon'] ?>"></i></a>
                   <?php } ?>    
                </div>
            </div>
            <div class="offcanvas-overly"></div>
            <!-- offcanvas-end -->
        </header>
        <!-- header-end -->

        <!-- main-area -->
        <main>

            <!-- banner-area -->
            <section id="home" class="banner-area banner-bg fix">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-7 col-lg-6">
                            <div class="banner-content">
                                <h6 class="wow fadeInUp" data-wow-delay="0.2s">HELLO!</h6>
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">I am <?= $woner['name'] ?></h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s"><?= $woner['short_des'] ?></p>
                                <div class="banner-social wow fadeInUp" data-wow-delay="0.8s">
                                    <ul>
                                        <?php foreach ($social_link as $link) { ?>
                                        <li><a href="<?= $link['link'] ?>"><i class="<?= $link['icon'] ?>"></i></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                                <a href="#portfolio" class="btn wow fadeInUp" data-wow-delay="1s">SEE PORTFOLIOS</a>
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-6 d-none d-lg-block">
                            <div class="banner-img text-right">
                                <?php if ($woner['first_img'] == 'top.png') { ?>
                                <img src="frontend/img/profile/default/top.png" alt="">
                                <?php }else{ ?>
                                    <img src="frontend/img/profile/uploads/<?= $woner['first_img'] ?>" alt="img">
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="banner-shape"><img src="frontend/img/shape/dot_circle.png" class="rotateme" alt="img"></div>
            </section>
            <!-- banner-area-end -->

            <!-- about-area-->
            <section id="about" class="about-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="about-img">
                                <?php if ($woner['aboutme_img'] == 'aboutme_img.png') { ?>
                                <img src="frontend/img/profile/default/aboutme.png"  alt="img">
                                <?php }else{ ?>
                                <img src="frontend/img/profile/uploads/<?= $woner['aboutme_img'] ?>"  alt="img">
                                <?php } ?>
                            </div>
                        </div>
                        <div class="col-lg-6 pr-90">
                            <div class="section-title mb-25">
                                <span>Introduction</span>
                                <h2>About Me</h2>
                            </div>
                            <div class="about-content">
                                <p><?= $woner['aboutme_des'] ?></p>
                                <h3>Skills:</h3>
                            </div>
                            <?php foreach($skills as $skill) : ?>
                            <!-- Education Item -->
                            <div class="education">
                                <div class="year"><?= $skill['name'] ?></div>
                                <div class="line"></div>
                                <div class="location">
                                    <span></span>
                                    <div class="progressWrapper">
                                        <div class="progress">
                                            <div class="progress-bar wow slideInLefts" data-wow-delay="0.2s" data-wow-duration="2s" role="progressbar" style="width: <?= $skill['ability'] ?>;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach ?>
                            <!-- End Education Item -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- about-area-end -->

            <!-- Services-area -->
            <section id="service" class="services-area pt-120 pb-50">
				<div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>WHAT WE DO</span>
                                <h2>Services and Solutions</h2>
                            </div>
                        </div>
                    </div>
					<div class="row">
                        <?php foreach ($services as $service) : ?>
						<div class="col-lg-4 col-md-6">
							<div class="icon_box_01 wow fadeInLeft" data-wow-delay="0.2s">
                                <i class="<?= $service['icon'] ?>"></i>
								<h3><?= $service['title'] ?></h3>
								<p>
                                <?= $service['description'] ?>
								</p>
							</div> 
						</div>
                        <?php endforeach ?>
					</div>
				</div>
			</section>
            <!-- Services-area-end -->

            <!-- Portfolios-area -->
            <section id="portfolio" class="portfolio-area primary-bg pt-120 pb-90">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>Portfolio Showcase</span>
                                <h2>My Recent Best Works</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                    <?php foreach($recent_works as $recent_work) : ?>
                        <div class="col-lg-4 col-md-6 pitem">
                            <div class="speaker-box">    
								<div class="speaker-thumb">
									<img src="frontend/img/recent_works/uploads/<?= $recent_work['image']?>" alt="img">
								</div>
								<div class="speaker-overlay">
									<span><?= $recent_work['sub_title'] ?></span>
									<h4><?= $recent_work['title']?></h4>
									<a href="portfolio-single.php?workid=<?= $recent_work['id'] ?>" class="arrow-btn">More information <span></span></a>
								</div>    
							</div>    
                        </div>
                        <?php endforeach; ?>                                                                                          
                    </div>
                </div>
            </section>
            <!-- services-area-end -->


            <!-- fact-area -->
            <section class="fact-area">
                <div class="container">
                    <div class="fact-wrap">
                        <div class="row justify-content-between">
                            <?php foreach ($experiences as $experience) { ?>
                            
                            <div class="col-xl-2 col-lg-3 col-sm-6">
                                <div class="fact-box text-center mb-50">
                                    <div class="fact-icon">
                                        <i class="<?= $experience['icon'] ?>"></i>
                                    </div>
                                    <div class="fact-content">
                                        <h2><span class="count"><?= $experience['number'] ?></span></h2>
                                        <span><?= $experience['title'] ?></span>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </section>
            <!-- fact-area-end -->

            <!-- testimonial-area -->
           
            <section class="testimonial-area primary-bg pt-115 pb-115">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-6 col-lg-8">
                            <div class="section-title text-center mb-70">
                                <span>testimonial</span>
                                <h2>happy customer quotes</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                    
                        <div class="col-xl-9 col-lg-10">
                            <div class="testimonial-active">
                            <?php foreach ($reviews as $review) { ?>
                                <div class="single-testimonial text-center">
                                    <div class="testi-avatar">
                                        <img src="frontend/img/reviews/uploads/<?= $review['image'] ?> " alt="img">
                                    </div>
                                    <div class="testi-content">
                                        <h4><span>“</span><?= $review['description'] ?><span>”</span></h4>
                                        <div class="testi-avatar-info">
                                            <h5><?= $review['name'] ?></h5>
                                            <span><?= $review['position'] ?></span>
                                        </div>
                                    </div>    
                                </div>
                            <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </section>
            
            <!-- testimonial-area-end -->
            
            <!-- brand-area -->
            <div class="barnd-area pt-100 pb-100">
                <div class="container">
                    <div class="row brand-active">
                        <?php foreach ($partner_brands as $brand) { ?>
                        <div class="col-xl-2">
                            <div class="single-brand">
                                <a href="<?= $brand['link'] ?>"><img src="frontend/img/brand/uploads/<?= $brand['image'] ?>" alt="img"></a>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
            <!-- brand-area-end -->

            <!-- contact-area -->
            <section id="contact" class="contact-area primary-bg pt-120 pb-120">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="section-title mb-20">
                                <span>information</span>
                                <h2>Contact Information</h2>
                            </div>
                            <div class="contact-content">
                                <p>Event definition is - somthing that happens occurre How evesnt sentence. Synonym when an unknown printer took a galley.</p>
                                <h5>OFFICE IN <span><?= $woner['address'] ?></span></h5>
                                <div class="contact-list">
                                    <ul>
                                        <li><i class="fas fa-map-marker"></i><span>Address :</span><?= $woner['address'] ?></li>
                                        <li><i class="fas fa-headphones"></i><span>Phone :</span><?= $woner['phone'] ?></li>
                                        <li><i class="fas fa-globe-asia"></i><span>e-mail :</span><?= $woner['email'] ?></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="contact-form">
                                <form action="admin/email/mailAction.php" method="POST">
                                    <input type="text"  placeholder="your name *" name="sender_name" required>
                                    <input type="email" style="text-transform: lowercase;" placeholder="your email *" name="sender_email" required>
                                    <textarea id="message" placeholder="your message *" name="email_body" required></textarea>
                                    <button class="btn" name="emailbtn">SEND</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- contact-area-end -->

        </main>
        <!-- main-area-end -->

        <!-- footer -->
        <footer>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="copyright-text text-center">
                                <p>Copyright© <a href="https://www.facebook.com/profile.php?id=61564344634056"><span>SAVALON TECHNOLOGIES</span></a> | All Rights Reserved</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer-end -->





		<!-- JS here -->
        <script src="frontend/js/vendor/jquery-1.12.4.min.js"></script>
        <script src="frontend/js/popper.min.js"></script>
        <script src="frontend/js/bootstrap.min.js"></script>
        <script src="frontend/js/isotope.pkgd.min.js"></script>
        <script src="frontend/js/one-page-nav-min.js"></script>
        <script src="frontend/js/slick.min.js"></script>
        <script src="frontend/js/ajax-form.js"></script>
        <script src="frontend/js/wow.min.js"></script>
        <script src="frontend/js/aos.js"></script>
        <script src="frontend/js/jquery.waypoints.min.js"></script>
        <script src="frontend/js/jquery.counterup.min.js"></script>
        <script src="frontend/js/jquery.scrollUp.min.js"></script>
        <script src="frontend/js/imagesloaded.pkgd.min.js"></script>
        <script src="frontend/js/jquery.magnific-popup.min.js"></script>
        <script src="frontend/js/plugins.js"></script>
        <script src="frontend/js/main.js"></script>
    </body>

</html>
