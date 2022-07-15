<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    function sendOTP($email,$otp)
    {
        $mail = new PHPMailer();

        try {

            // server settings
            $mail->SMTPDebug = 2;                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com;';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'prakashsurya1204@gmail.com';                 
            $mail->Password   = 'suryagupta1999@';                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  

            // send email
            $mail->setFrom('prakashsurya1204@gmail.com', 'Help In One Place');   
            // recipients        
            $mail->addAddress($email,$otp);
            
            $mail->isHTML(true);                                  
            $mail->Subject = 'Subject';
            $mail->Body    = "<p>One Time Password (OTP) is {$otp}. It is valid for 1 minute only.</p>";
            
            $mail->AltBody = "One Time Password (OTP) is {$otp}. It is valid for 1 minute only.";
            
            $mail->send();
            return 1;

        } catch (Exception $e) {
            showMessage("Message could not be sent. Mailer Error: {$mail->ErrorInfo}","./volunteer_form.php");
        }

        return 0;
    }
?>
    