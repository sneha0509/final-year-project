<?php

use Google\Service\Adsense\Alert;

    require("dbcon.php");

    if(isset($_POST['submit'])){
        $don_name=trim($_POST['don_name']);    
        $don_email=trim($_POST['don_email']);
        $don_contact=trim($_POST['don_contact']);
        $ngo_type=trim($_POST['ngo_type']);
        $don_address=trim($_POST['don_address']);
        $don_city=trim($_POST['don_city']);
        $donation_state=trim($_POST['donation_state']);
        $don_pin=trim($_POST['don_pin']);
        $don_dateOfBirth=trim($_POST['don_dateOfBirth']);
        $don_amount=trim($_POST['don_amount']);
        $don_option=trim($_POST['don_option']);
       


        $insertquery="Insert into donation values(:id,:don_name,:don_email, :don_contact, :ngo_type, :don_address,:don_city,:donation_state, 
        :don_pin, :don_dateOfBirth,:don_amount,:don_option)";
        $stmt=$pdo->prepare($insertquery);
        $arr=["id"=>'',"don_name"=>$don_name,"don_email"=>$don_email,"don_contact"=>$don_contact,"ngo_type"=> $ngo_type,"don_address"=>$don_address,"don_city"=>$don_city,"donation_state"=>$donation_state,"don_pin"=>$don_pin,"don_dateOfBirth"=>$don_dateOfBirth,"don_amount"=>$don_amount,"don_option"=>$don_option
            ]; 
        $stmt->execute($arr);

       echo '<script type ="text/JavaScript">';  
        echo "alert('Donation Done');";
        echo "window.location.replace('index.php')"; 
        echo '</script>';
        
    }
    ?>