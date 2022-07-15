<?php

    require("dbcon.php");

    if(isset($_POST['submit']))
    {
        // Registration Details
        $ngo_name=trim($_POST['ngoname']);
        $ngo_domain=trim($_POST['ngodomain']);
        $act_name=trim($_POST['act']);
        $registration_no=trim($_POST['reg_no']);
        $ngo_reg_city=trim($_POST['city']);
        $ngo_reg_state=trim($_POST['ngo-registry-state']);
        $reg_date=trim($_POST['reg_date']);
        
        // Founder Details
        $foundername=trim($_POST['founder']);
        $mail=trim($_POST['mail']);
        $contactno=trim($_POST['contact']);
        $aadhar=trim($_POST['aadhar']);
        $pan=trim($_POST['pan']);
        
        if(!filter_var($mail, FILTER_VALIDATE_EMAIL)){
            showMessage('Invalid E-mail Id.','./ngo_registration_form.php');
            exit();
        }

        // Contact Details
        $ngo_address=trim($_POST['address']);
        $ngo_city=trim($_POST['ngo-city']);
        $ngo_state=trim($_POST['contact-country-state']);
        $ngo_mobile=trim($_POST['mobile']);
        $ngo_website=trim($_POST['website']);
        $ngo_email=trim($_POST['ngo-email']);
        $pincode=trim($_POST['Pincode']);
        $ngo_description=trim($_POST['ngo_description']);
        
        // profile photo
        $arr=@getimagesize($_FILES['profile']['tmp_name']);
        $width=$arr[0];
        $height=$arr[1];
        $file=$_FILES['profile'];
        $filename=$file['name'];
        $filepath=$file['tmp_name'];
        $filesize=$file['size'];
        $file_error=$file['error'];
        $destination="";

        /* file validation
            1. convert string into array based on '.' using explode.
            2. use end() to get extension & convert to lowercase.
            3. compare extension
        */

        $file_ext=explode('.',$filename);
        $file_extension=strtolower(end($file_ext));

        if($file_error===0)
        {
            if($filesize>20000000000){
                showMessage('File size must be less than or equal to 100KB.','./ngo_registration_form.php');
                exit();
            }
            /*else if($width>800 || $height>700){
                showMessage('Image dimension should be within 800X700.','./ngo_registration_form.php');
                exit();
            }*/
            else if($file_extension==='jpg' || $file_extension==='png' || $file_extension==='jpeg'){
                $destination='ngo_profile/'.$filename;
                move_uploaded_file($filepath,$destination);    
            }
            else
            {
                showMessage('Only .png, .jpg, .jpeg files are allowed.','./ngo_registration_form.php');
                exit();
            }
        }
        else
        {
            showMessage('Some error occured while uploading image.','./ngo_registration_form.php');
            exit();
        }

        if(!filter_var($ngo_email, FILTER_VALIDATE_EMAIL)){
            showMessage('Invalid E-mail Id.','./ngo_registration_form.php');
            exit();
        }

        if(!filter_var($ngo_website, FILTER_VALIDATE_URL)){
            showMessage('Invalid Url .','./ngo_registration_form.php');
            exit();
        }

        $insertquery="insert into ngo_register (ngo_name, ngo_domain, act_name, registration_no, city, state, founder_name, email, 
        mobile, aadhar, pan, ngo_address, ngo_city, ngo_state, pincode, ngo_mobile, url, ngo_email, registration_date, 
        profile_photo, ngo_desc) VALUES (:ngoname,:domain, :act,:reg_no,:city,:ngo_state,:foundername,:email,
        :mobile,:aadhar,:pan,:ngo_address,:ngo_city,:ngo_state, :pincode, :ngo_mobile,:ngo_url,:ngo_email, :reg_date, :profile_photo, :ngo_desc)";
        
        $stmt=$pdo->prepare($insertquery);
        $arr=[
            "ngoname"=>$ngo_name,"domain"=>$ngo_domain,"act"=>$act_name,"reg_no"=>$registration_no,"city"=>$ngo_reg_city,
            "ngo_state"=>$ngo_reg_state, "foundername"=>$foundername,"email"=>$mail,"mobile"=>$contactno,
            "aadhar"=>$aadhar,"pan"=>$pan,"ngo_address"=>$ngo_address,"ngo_city"=>$ngo_city,"ngo_state"=>$ngo_state,"pincode"=>$pincode,
            "ngo_mobile"=>$ngo_mobile,"ngo_url"=>$ngo_website,"ngo_email"=>$ngo_email, "reg_date"=>$reg_date, "profile_photo"=>$destination,
            "ngo_desc"=>$ngo_description
        ];
        
        $stmt->execute($arr);
        showMessage("Successfully Registered!","index.php");
        sendMail($ngo_email, "User");
        //header('location:index.php');
    }     
?>
<?php
    function showMessage($msg,$url){
        echo '<script type ="text/JavaScript">';  
        echo "alert('$msg');";
        echo "window.location.replace('$url')"; 
        echo '</script>';
    }
?>