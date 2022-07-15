<?php

    header("Cache-Control", "no-cache, no-store, must-revalidate");
    session_start();
    if(isset($_SESSION['member_id']) && isset($_SESSION['member_name']))
    { ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NewsandEventForm</title>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- <link rel="stylesheet" href="../Style/Ebook_Modal.css"> -->
    <!-- <link rel="stylesheet" href="../Style/Ebook.css"> -->
    <link rel="stylesheet" href="../Style/NewsandEventForm.css">
    <link rel="stylesheet" href="../Style/style.css">
</head>

<body>
<div id="Head"></div><br>
    <div>
        
             <center><h3>News and Events</h3></center><br>
</div>

<!--Cards fetching data-->
<div class="cards">           
 <?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection,"demodb");
    $query = 'select * from newseventform';
    $query_run = mysqli_query($connection,$query);
    $cheack=mysqli_num_rows($query_run)>0;
    if($cheack){
    while($row = mysqli_fetch_assoc($query_run)){
     ?>
      <div class="card1" data-aos="zoom-in">
      <div class="card-image">
          <?php if(!empty($row['image_url'])){?>
        <img  src=" <?php echo $row['image_url'];?>" >
        <?php  }else {?>
            <img src="new_default.jpg">
            <?php }?>
    </div> 
                <div class="card-content"> 
                   <h2><?php echo $row['title'];?></h2><br/>
                   <h4>Description</h4>
                <p class="card-text"><?php echo $row['description'];?></p>
                <h4>Start Date and Time</h4>
                Year  |   Date |  Time
                <p class="card-text"><?php echo $row['start_date_time'];?></p>
                <h4>End Date and Time</h4>
                Year  |   Date |  Time
                <p class="card-text"><?php echo $row['end_date_time'];?></p>
                        <!-- <button style="float: right;" class="join">Join us!</button> -->
                        <p class="card-text">
                        <a href="<?php echo $row['event_link'];?>">link</p>
                    </a>
                </div>
         </div>  
     
     <?php
    }
}        
      ?>
           
</div>      

        

    <div id="Foot"></div>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
</body>
    <script>
        
        $(function() {
            $("#Head").load("Header.php");
            $("#Foot").load("../HTML/Footer.html");
        });

    </script>
   <!--
       jabh file path is null then default path of about page will be extracted
   -->
</html>
<?php
    }
    else
      header('location:login_form.php');
?>