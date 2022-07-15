<?php
    
    include 'send_email.php';
    require("dbcon.php");
    try{

        if(isset($_POST['submit']))
        {            
            $name=trim($_POST['username']);
            $password=trim($_POST['password']);
            $email=trim($_POST['email']);

            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                showMessage('Invalid E-mail Id.','./register_form.php');
                exit();
            }

            // Blowfish algorithm for encryption (secure than MD5 and SHA /free/slow) 
            $hash_password=password_hash($password,PASSWORD_BCRYPT);  

            if(strlen($name)!==0 && strlen($password)!==0 && strlen($email)!==0)
            {
                // Check already existing user with same email.
                $select_email="select * from member where email=:email";
                $stmt=$pdo->prepare($select_email);
                $stmt->execute(['email'=>$email]);
                $count=$stmt->rowCount();
                
                if($count>0){
                    showMessage('User with the given e-mail already exists!','./register_form.php');                    
                }
                else{

                    $insertquery="Insert into member (name,password,email) values(:name,:password,:email)";
                    $stmt=$pdo->prepare($insertquery);    
                    $arr=[
                        "name"=>$name, "password"=>$hash_password, "email"=>$email
                    ]; 
                    $stmt->execute($arr);  
                    showMessage('Successfully Registered!','./login_form.php');
                    sendMail($email,$name);
                }
            }
            else{
                showMessage('Field Required!','./register_form.php');                  
            }
        } 
    }
    catch(Exception $e) {
        echo '<b>Error Message: </b>' .$e->getMessage();
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