<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="text" name="name"  value="Anmol" required/><br/>
        <input type="email" required name="email" value="anmol@yahoo.com" /><br/>
        <textarea name="description">Demo content</textarea>
        <input type="submit" value="Submit" name="submit">
    </form>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>
<?php
    require 'dbcon.php';
    if(isset($_POST['submit']))
    {
        $name=trim($_POST['name']);
        $email=trim(($_POST['email']));
        $desc=trim($_POST['description']);
        
        if(strlen($name)!==0 && strlen($email)!==0 && strlen($desc)!==0)
        {
            $insertquery="Insert into website_feedback (name, email, description) values(:name,:email,:description)";
            $stmt=$pdo->prepare($insertquery);    
            $arr=["name"=>$name, "email"=>$email, "description"=>$desc]; 
            $stmt->execute($arr);
            echo '<script type="text/javascript">';  
            echo 'aert("Thanks for the feedback!");';
            echo "window.location.replace('index.php')</script>"; 
            #echo '</script>';
        }
        else{
            echo '<script type ="text/javascript">';  
            echo'alert("Field Required!")';
            echo 'window.location.replace("feedback.php")'; 
            echo '</script>';
        }
    }
?>