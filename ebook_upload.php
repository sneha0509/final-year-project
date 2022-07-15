<?php
    function showMessage($msg,$url){
        echo '<script type ="text/JavaScript">';  
        echo "alert('$msg');";
        echo "window.location.replace('$url')"; 
        echo '</script>';
    }
    require 'dbcon.php';
    if(isset($_POST['submit']))
    {
        $title=trim($_POST['book_title']);
        $description=trim($_POST['description']);
        $author=trim($_POST['author']);
        $publication=trim($_POST['publication']);
        $file=$_FILES['file'];

        if(strlen($title)!==0 && strlen($author)!==0 && strlen($publication)!==0 && count($file)!==0)
        {
            $filename=$file['name'];
            $filepath=$file['tmp_name'];
            $filesize=$file['size'];
            $file_error=$file['error'];
            $destination="";

            $file_ext=explode('.',$filename);
            $file_extension=strtolower(end($file_ext));

            if($filesize>3000000){
                showMessage('File size must be less than or equal to 3MB.','./ebook.php');
                exit();
            }

            if($file_error===0){
                
                if($file_extension==='pdf'){
                    $destination='ebooks/'.$filename;
                    move_uploaded_file($filepath,$destination);    
                }
                else
                {
                    showMessage('Only .pdf files are allowed.','./ebook.php');
                    exit();
                }
            }
            else
            {
                showMessage('Some error occured while uploading files.','./ngo_registration_form.php');
                exit();
            }
            $insertquery="Insert into ebook (title, book_desc, author, yop, pdf) 
            values(:title,:book_desc,:author,:yop,:pdf)";
            
            $stmt=$pdo->prepare($insertquery);
            $arr=["title"=>$title,"book_desc"=>$description,"author"=>$author,"yop"=>$publication, "pdf"=>$destination]; 
            $stmt->execute($arr);
            showMessage("Successfully Uploaded!","./ebook.php");
        }   
        else
            showMessage('Field Required!','./ebook.php');
    }
