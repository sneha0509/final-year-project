<?php

    include 'send_email.php';
    require 'vendor/autoload.php';
    require("dbcon.php");
    session_start();

    if(isset($_POST['submit'])){
        //Volunteer Registration Details
        $volunteer_gender=trim($_POST['volunteer_gender']);
        $vol_dob=trim($_POST['vol_dob']);

        //Contact Details
        $vol_contact=trim($_POST['vol_contact']);
        $vol_address=trim($_POST['vol_address']);
        $vol_city=trim($_POST['vol_city']);
        $vol_state=trim($_POST['vol_state']);
         
        //Occupations Details
        $vol_occ=trim($_POST['vol_occ']);
        $vol_dom_desc=trim($_POST['vol_dom_desc']);
        $vol_join_desc=trim($_POST['vol_join_desc']);
        $other_occu=trim($_POST['other_occu']);
        $ngo_id=trim($_POST['ngoid']);

        // resume pdf
        $file=$_FILES['resume_upload'];
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

        if($filesize>3000000){
            showMessage('File size must be less than or equal to 3MB.','./volunteer_form.php');
        }

        if($file_error===0){
            
            if($file_extension==='pdf'){
                $destination='resume/'.$filename;
                move_uploaded_file($filepath,$destination);    
            }
            else
                showMessage('Only .pdf files are allowed.','./volunteer_form.php');
        }
        
        if(empty($other_occu)){
            $other_occu="null";
        }

        $insertquery="insert into volunteer_reg (volunteer_gender, vol_dob, vol_contact, vol_address, vol_city, vol_state, vol_occ, 
        other_occu, vol_dom_desc, vol_join_desc, resume, ngo_id, mid) values (:volunteer_gender,:vol_dob,:vol_contact,:vol_address,:vol_city,:vol_state,:vol_occ,:other_occu,:vol_dom_desc,:vol_join_desc,:resume, :ngo_id, :mid)";
        $stmt=$pdo->prepare($insertquery);
        $arr=[
            "volunteer_gender"=>$volunteer_gender,"vol_dob"=>$vol_dob,"vol_contact"=>$vol_contact,"vol_address"=>$vol_address,"vol_city"=>$vol_city,
            "vol_state"=>$vol_state,"vol_occ"=>$vol_occ,"other_occu"=>$other_occu,"vol_dom_desc"=>$vol_dom_desc,"vol_join_desc"=>$vol_join_desc,"resume"=>$destination, "ngo_id"=>$ngo_id, "mid"=>$_SESSION['member_id']
        ]; 
        $stmt->execute($arr);
        
        $stmt=$pdo->prepare("select * from member where id=".$_SESSION['member_id']);
        $stmt->execute();
        $arr=$stmt->fetch(PDO::FETCH_OBJ);
        $member_name=$arr->name;
        $member_email=$arr->email;

        showMessage("Successfully Submitted!","./index.php");
        //sendMail($member_email, $member_name); 

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