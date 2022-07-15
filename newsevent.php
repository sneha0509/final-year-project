<?php 

    require("dbcon.php");

    /*function showMessage($msg){
        echo "<script>alert($msg)</script>"; 
    }*/

       function showMessage($msg,$url){
        echo '<script type ="text/JavaScript">';  
        echo "alert('$msg');";
        echo "window.location.replace('$url')"; 
        echo '</script>';
    }

    if(isset($_POST['submit']))
    {
        
        $title=trim($_POST['title']);
        $description=trim($_POST['description']);
        $venue=trim($_POST['venue']);
        $start_date_time=trim($_POST['start_date_time']);
        $end_date_time=trim($_POST['end_date_time']);
        $event_link=trim($_POST['event_link']);
        $file=$_FILES['image']; 
        $filename=$file['name'];
        $filepath=$file['tmp_name'];
        $filesize=$file['size'];
        $file_error=$file['error'];
        $destination="";
       

    $file_ext=explode('.',$filename);
    $file_extension=strtolower(end($file_ext));

    if($filesize>5000000){
        showMessage('File size must be less than or equal to 15MB.','./NewsandEventForm.php');
        exit();
    }
     

    if($file_error===0){
        
        if($file_extension==='jpeg'||$file_extension==='png'||$file_extension==='jpg'){
            $destination='uploads/'.$filename;
            move_uploaded_file($filepath,$destination);    
        }
        else
        {
            showMessage("{$file_extension} files is not allowed.",'./NewsandEventForm.php');
            exit();
        }
    }

    $insertquery="Insert into newseventform values(:ID,:title,:description,:venue,:start_date_time,:end_date_time,:event_link,:image_url)";
    $stmt=$pdo->prepare($insertquery);
    $arr=["ID"=>'',"title"=>$title,"description"=>$description,"venue"=>$venue,"start_date_time"=>$start_date_time,"end_date_time"=>$end_date_time,"event_link"=>$event_link,"image_url"=>$destination
    ];
    $stmt->execute($arr);
     showMessage("Done",'./NewsandEventForm.php');
}

else{
        showMessage('Field Required!','./NewsandEventForm.php');
    }
