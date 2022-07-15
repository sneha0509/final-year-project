<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'vendor/autoload.php';

    function sendMail($email,$name)
    {
        $mail = new PHPMailer();

        try {

            // server settings
            $mail->SMTPDebug = 2;                                       
            $mail->isSMTP();                                            
            $mail->Host       = 'smtp.gmail.com;';                    
            $mail->SMTPAuth   = true;                             
            $mail->Username   = 'prakashsurya1204@gmail.com';                 
            $mail->Password   = 'GuptaSurya1999@';                        
            $mail->SMTPSecure = 'tls';                              
            $mail->Port       = 587;  

            // send email
            $mail->setFrom('prakashsurya1204@gmail.com', 'Help In One Place');   
            // recipients        
            $mail->addAddress($email,$name);
            
            $mail->isHTML(true);                                  
            $mail->Subject = 'Subject';
            $mail->Body    = "<p>Hello {$name}</p>,<span>We would like to inform you that we received your application for Volunteering in XYZ NGO. 
                The hiring team is presently reviewing all incoming applications. 
                If you are among qualified candidate, you will receive a call or email from respective NGO recruiters for next steps.</span>";
            
            $mail->AltBody = "Hello {$name}, We would like to inform you that we received your application for Volunteering in XYZ NGO. 
                The hiring team is presently reviewing all incoming applications. 
                If you are among qualified candidate, you will receive a call or email from respective NGO recruiters for next steps.";
            
            $mail->send();
            showMessage("Mail has been sent successfully!","./index.php");

        } catch (Exception $e) {
            showMessage("Message could not be sent. Mailer Error: {$mail->ErrorInfo}","./volunteer_form.php");
        }
    }
?>
    