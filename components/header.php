<?php


$db_name = 'mysql:host=localhost:3306;dbname=joblance';
$user_name = 'root';
$user_password = 'ishan@1999';

$conn = new PDO($db_name, $user_name, $user_password);


if(isset($_COOKIE['user_id'])){
   $user_id = $_COOKIE['user_id'];
}else{
   $user_id = '';
}
?>

<!doctype html>
<html lang="zxx">

<!-- Mirrored from templates.hibootstrap.com/jovie/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 01 Apr 2023 11:07:38 GMT -->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />

    <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />

    <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />

    <link rel="stylesheet" href="assets/css/boxicon.min.css" />

    <link rel="stylesheet" href="assets/fonts/flaticon/flaticon.css" />

    <link rel="stylesheet" href="assets/css/magnific-popup.css" />

    <link rel="stylesheet" href="assets/css/meanmenu.css" />

    <link rel="stylesheet" href="assets/css/nice-select.css" />

    <link rel="stylesheet" href="assets/css/style.css" />

    <link rel="stylesheet" href="assets/css/dark.css" />

    <link rel="stylesheet" href="assets/css/responsive.css" />

    <title>JobLance</title>

    <link rel="icon" type="image/png" href="assets/img/favicon.png">
</head>

<body>

    <div class="loader-content">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="sk-circle">
                    <div class="sk-circle1 sk-child"></div>
                    <div class="sk-circle2 sk-child"></div>
                    <div class="sk-circle3 sk-child"></div>
                    <div class="sk-circle4 sk-child"></div>
                    <div class="sk-circle5 sk-child"></div>
                    <div class="sk-circle6 sk-child"></div>
                    <div class="sk-circle7 sk-child"></div>
                    <div class="sk-circle8 sk-child"></div>
                    <div class="sk-circle9 sk-child"></div>
                    <div class="sk-circle10 sk-child"></div>
                    <div class="sk-circle11 sk-child"></div>
                    <div class="sk-circle12 sk-child"></div>
                </div>
            </div>
        </div>
    </div>


    <div class="navbar-area">

        <div class="mobile-nav">
            <a href="index.html" class="logo">
                <img src="assets/img/logo.png" alt="logo">
            </a>
        </div>

        <div class="main-nav">
            <div class="container">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.html">
                        <img src="assets/img/logo.png" alt="logo">
                    </a>
                    <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                        <ul class="navbar-nav m-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle active">Home</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="index.html" class="nav-link active">Home One</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-two.html" class="nav-link">Home Two</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-three.html" class="nav-link">Home Three</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-four.html" class="nav-link">Home Four</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="index-five.html" class="nav-link">Home Five</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="about.html" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle">Jobs</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="find-job.html" class="nav-link">Find A Job</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="post-job.html" class="nav-link">Post A Job</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="job-list.html" class="nav-link">Job List</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="job-grid.html" class="nav-link">Job Grid</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="job-details.html" class="nav-link">Job Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle">Candidates</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="candidate.html" class="nav-link">Candidates</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="candidate-details.html" class="nav-link">Candidates Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle">Pages</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="company.html" class="nav-link">Company</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="pricing.html" class="nav-link">Pricing</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link dropdown-toggle">Profile</a>
                                        <ul class="dropdown-menu">
                                            <li class="nav-item">
                                                <a href="account.html" class="nav-link">Account</a>
                                            </li>
                                            <li class="nav-item">
                                                <a href="#" class="nav-link dropdown-toggle">Member</a>
                                                <ul class="dropdown-menu">
                                                    <li class="nav-item">
                                                        <a href="sign-in.html" class="nav-link">Sign In</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="user-signup.php" class="nav-link">Sign Up</a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="reset-password.html" class="nav-link">Reset
                                                            Password</a>
                                                    </li>
                                                </ul>
                                            <li>
                                            <li class="nav-item">
                                                <a href="resume.html" class="nav-link">Resume</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="404.html" class="nav-link">404 Page</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="testimonial.html" class="nav-link">Testimonials</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="faq.html" class="nav-link">FAQ</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">Catagories</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="privacy-policy.html" class="nav-link">Privacy & Policy</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="terms-condition.html" class="nav-link">Terms & Conditions</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link dropdown-toggle">Blog</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item">
                                        <a href="blog.html" class="nav-link">Blog</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog-two-2.html" class="nav-link">Blog Two</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="blog-details.html" class="nav-link">Blog Details</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="contact.html" class="nav-link">Contact Us</a>
                            </li>
                        </ul>
                        <?php if(!$user_id == ''){ ?>
                            <div class="other-option">
                            <a href="user-profile.php" class="signup-btn">View Profile</a>
                            <a href="user-sign-out.php" class="signin-btn">Sign out</a>
                        </div>
                            <?php }else{ ?>
                        <div class="other-option">
                            <a href="user-signup.php" class="signup-btn">Sign Up</a>
                            <a href="user-sign-in.php" class="signin-btn">Sign In</a>
                        </div>
                        <?php } ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>