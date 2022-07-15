<?php
    #include('config.php');
    
    session_start();
    unset($_SESSION["member_id"]);
    unset($_SESSION["member_name"]);
    session_destroy();
    header("Location:index.php");    

    //Reset OAuth access token
    //$google_client->revokeToken();

    //Destroy entire session data.
    //session_destroy();

    //redirect page to index.php
    //header('location:index.php');
?>