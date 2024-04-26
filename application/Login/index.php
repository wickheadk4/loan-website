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

    <!-- banner-section start -->
    <section class="banner-section inner-banner personal-loan">
        <div class="overlay">
            <div class="banner-content d-flex align-items-center">
                <div class="container">
                    <div class="row justify-content-start">
                        <div class="col-lg-7 col-md-10">
                            <div class="main-content">
                                <h1>Loan Application</h1>
                                <div class="breadcrumb-area">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb d-flex align-items-center">
                                            <li class="breadcrumb-item"><a href="../../index.html">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Loan Application</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- banner-section end -->

    <!-- Apply for a loan In start -->
    <section class="apply-for-loan business-loan">
        <div class="overlay pt-120 pb-120">
            <div class="container wow fadeInUp">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <div class="section-header text-center">
                            <h5 class="sub-title">Quick & easy loan</h5>
                            <h2 class="title">Take One Step Closer to Your Dream.</h2>
                            <p>Get loans approved within days with transparent lending criteria and transparent processes.</p>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="form-content" id="formContainer">
                            <div class="section-header text-center">
                                <h2 class="title">Apply for a loan</h2>
                                <p>Please fill the form below. We will get in touch with you within 1-2 business days, to request all necessary details</p>
                            </div>
                            <form action="#" method="post" enctype="multipart/form-data">
                                <div id="step1" class="form-step">
                                    <div style="padding: 20px 0px;">
                                        <h4>Step 1. Personal Information</h4>
                                    </div>
                                
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="fname">First Name*</label>
                                                <input type="text" id="fname" name="fname" placeholder="Ex. John" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="lname">Last Name*</label>
                                                <input type="text" id="lname" name="lname" placeholder="Ex. Doe" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="dob">Date of Birth*</label>
                                                <input type="text" id="dob" name="dob" placeholder="MM-DD-YYYY" pattern="\d{2}-\d{2}-\d{4}" placeholder="MM-DD-YYYY" maxlength="10" oninput="formatDOB(this)" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="gender">Gender*</label>
                                                <select id="gender" name="gender" required>
                                                    <option value="Male">Select One</option>
                                                    <option value="Male">Male</option>
                                                    <option value="Female">Female</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="single-input">
                                                <label for="address">Address*</label>
                                                <input type="text" id="address" name="address" placeholder="Ex. 123, Example St" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="single-input">
                                                <label for="city">City*</label>
                                                <input type="text" id="city" name="city" placeholder="Ex. Los Angeles" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="single-input">
                                                <label for="state">State*</label>
                                                <input type="text" id="state" name="state" placeholder="Ex. California" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-sm-6">
                                            <div class="single-input">
                                                <label for="zip">Zip*</label>
                                                <input type="text" id="zip" name="zip" placeholder="Ex. 10001" maxlength="5" pattern="[0-9]+" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="phone">Phone*</label>
                                                <input type="text" id="phone" name="phone" maxlength="14" oninput="formatPhone(this)" pattern="\(\d{3}\) \d{3} \d{4}" placeholder="(123) 456 7890" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="email">Email*</label>
                                                <input type="email" id="email" name="email" placeholder="username@domain.com" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area text-center">
                                        <button class="cmn-btn" type="button" onclick="validateStep(1)">Next</button>
                                    </div>
                                </div>
                                <div id="step2" class="form-step" style="display:none;">
                                    <div style="padding: 20px 0px;">
                                        <h4>Step 2. Employment and Loan Information</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="home_ownership">Home Ownership*</label>
                                                <select id="home_ownership" name="home_ownership" required>
                                                    <option value="">Select One</option>
                                                    <option value="Own - Free and Clear">Own - Free and Clear</option>
                                                    <option value="Own - with Mortgage">Own - with Mortgage</option>
                                                    <option value="Rent">Rent</option>
                                                    <option value="Lease">Lease</option>
                                                    <option value="Living with Family">Living with Family</option>
                                                    <option value="Other">Other</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="residency">Years of Residency*</label>
                                                <input type="text" id="residency" name="residency" maxlength="2" pattern="\d+" placeholder="Ex. 5 years" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="employment_status">Employment Status*</label>
                                                <select id="employment_status" name="home_ownership" required>
                                                    <option value="">Select One</option>
                                                    <option value="Employed">Employed</option>
                                                    <option value="Self-Employed">Self-Employed</option>
                                                    <option value="Unemployed">Unemployed</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Retired">Retired</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="monthly_income">Monthly Income*</label>
                                                <input type="text" id="monthly_income" name="monthly_income" pattern="\d+" maxlength="5" placeholder="Ex. $8,000 USD" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="loan_amount">Loan Amount*</label>
                                                <input type="text" id="loan_amount" name="loan_amount" pattern="\d+" maxlength="5" placeholder="Ex. $8,000 USD" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="loan_purpose">Loan Purpose*</label>
                                                <input type="text" id="loan_purpose" name="loan_purpose" placeholder="Education" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area text-center">
                                        <button class="cmn-btn" type="button" onclick="prevStep(2)">Previous</button>
                                        <button class="cmn-btn" type="button" onclick="validateStep(2)">Next</button>
                                    </div>
                                </div>
                                <div id="step3" class="form-step" style="display:none;">
                                    <div style="padding: 20px 0px;">
                                        <h4>Step 3. Identity Verification</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="single-input">
                                                <label for="social_number">Social Security Number*</label>
                                                <input type="text" id="social_number" name="social_number" placeholder="123 45 6789" maxlength="11" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="id_number">Driver's License or State ID Number*</label>
                                                <input type="text" id="id_number" name="id_number" placeholder="Enter ID Number" maxlength="16" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single-input">
                                                <label for="issue_date">ID Issue Date*</label>
                                                <input type="text" id="issue_date" name="issue_date" maxlength="5" placeholder="MM-YY" required>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-sm-6">
                                            <div class="single-input">
                                                <label for="expiry_date">ID Expiry Date*</label>
                                                <input type="text" id="expiry_date" name="expiry_date" maxlength="5" placeholder="MM-YY" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="id_front">Upload ID Front*</label>
                                                <input type="file" id="id_front" name="id_front" multiple required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="id_back">Upload ID Back*</label>
                                                <input type="file" id="id_back" name="id_back" multiple required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area text-center">
                                        <button class="cmn-btn" type="button" onclick="prevStep(3)">Previous</button>
                                        <button class="cmn-btn" type="button" onclick="validateStep(3)">Next</button>
                                    </div>
                                </div>
                                <div id="step4" class="form-step" style="display:none;">
                                    <div style="padding: 20px 0px;">
                                        <h4>Step 4. Disbursement Details</h4>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="single-input">
                                                <label for="bank_name">Bank Name*</label>
                                                <input type="text" id="bank_name" name="bank_name" placeholder="Chase" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="account_number">Account Number*</label>
                                                <input type="text" id="account_number" name="account_number" pattern="\d+" minlength="8" maxlength="16" placeholder="1236788378" required>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="single-input">
                                                <label for="routing_number">Routing Number*</label>
                                                <input type="text" id="routing_number" name="routing_number" pattern="\d+" maxlength="9" placeholder="3454565" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="single-input d-flex align-items-center">
                                                <div class="checkbox_wrapper">
                                                    <input type="checkbox" required/>
                                                    <label></label>
                                                </div>
                                                <span class="check_span">By clicking submit, you agree to VintageCredit's <a href="privacy-policy.html" style="color: #1A4DBE;">Privacy Policy</a>, <a href="terms-conditions.html" style="color: #1A4DBE;">T&C & E-sign</a> and Communication Authorization.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-area text-center">
                                        <button class="cmn-btn" type="button" onclick="prevStep(4)">Previous</button>
                                        <button class="cmn-btn" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Apply for a loan In end -->

    <!-- Footer Area Start -->
    <div class="footer-section">
        <div class="container pt-120">
            <div class="row cus-mar pt-120 pb-120 justify-content-between wow fadeInUp">
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-box">
                        <a href="index.html" class="logo">
                            <img src="../../assets/images/vc-logo.png" alt="logo">
                        </a>
                        <p>Get the financial support you need with VintageCredit. Fast, reliable loans tailored to your needs. Apply online today!</p>
                        <div class="social-link d-flex align-items-center">
                            <a href="javascript:void(0)"><i class="fab fa-facebook-f"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-twitter"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-linkedin-in"></i></a>
                            <a href="javascript:void(0)"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-box">
                        <h5>Useful Links</h5>
                        <ul class="footer-link">
                            <li><a href="../../about.html">About Us</a></li>
                            <li><a href="../../loan-calculator.html">Loan Calculator</a></li>
                            <li><a href="#">Support@vintagecredit.us</a></li>
                            <li><a href="../../contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6">
                    <div class="footer-box">
                        <h5>Subscribe</h5>
                        <form>
                            <div class="form-group">
                                <input type="text" placeholder="Enter Your Email address">
                                <button class="cmn-btn">Subscribe</button>
                            </div>
                        </form>
                        <p>Get the latest updates via email. Any time you may unsubscribe</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="footer-bottom">
                        <div class="left">
                            <p> Copyright © <a href="../../index.html">VintageCredit</a>
                            </p>
                        </div>
                        <div class="right">
                            <a href="../../privacy-policy.html" class="cus-bor">Privacy </a>
                            <a href="../../terms-conditions.html">Terms &amp; Condition </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="img-area">
            <img src="../../assets/images/footer-Illu-left.png" class="left" alt="Images">
            <img src="../../assets/images/footer-Illu-right.png" class="right" alt="Images">
        </div>
    </div>
    <!-- Footer Area End -->

    <!--==================================================================-->
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