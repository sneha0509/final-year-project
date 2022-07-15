<?php
    function showMessage($msg,$url){
        echo '<script type ="text/JavaScript">';  
        echo "alert('$msg');";
        echo "window.location.replace('$url')"; 
        echo '</script>';
    }
?>
<?php

    session_start();
    require('dbcon.php');
    
    if(isset($_POST['submit']))
    {
        $email=trim($_POST['email']);
        $password=trim($_POST['password']);

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            showMessage('Invalid E-mail Id.','./login_form.php');
            exit();
        }

        try{
            if(strlen($email)>0 && strlen($password)>0)
            {
                $select_email="select * from member where email=:email";
                $stmt=$pdo->prepare($select_email);
                $stmt->execute(['email'=>$email]);
                $count=$stmt->rowCount();

                if($count)
                {
                    $result=$stmt->fetch(PDO::FETCH_ASSOC);
                    $db_password=$result['password'];
                    $check_password=password_verify($password,$db_password);
                    if($check_password)
                    {
                        $_SESSION['member_id']=$result['id'];
                        $_SESSION['member_name']=$result['name'];
                        showMessage("Successfully Logged in!",'./index.php');
                    }
                    else
                        showMessage('Invalid Credentials!','./login_form.php');   
                }
                else
                    showMessage('Invalid Credentials!','./login_form.php');
            }
            else
                showMessage("Field Required!",'./login_form.php');
        }
        catch(Exception $exception){
            echo '<b>Error Message: </b>' .$exception->getMessage();
        }
    }
?>