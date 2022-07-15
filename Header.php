<?php
  session_start();
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="../Style/Header.css"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help in One Place</title>
    <link rel="stylesheet" href="../Style/NewsandEventForm.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous"> -->
    <style>
      .labelstyle::after{
        content: ' *';
        color: red;
      }
    </style>
</head>
<body>
  <header class="header">
    <div class="heading">
      <h1 id="title">Help In One Place</h1>
    </div> 
    <div class="links">
    <a href="donation_form.php">Donation</a>
      <a href="about.php">About Us</a>
      <a href="ngo_registration_form.php">NGO Registration</a>
      <div class="dropdown">
        <button class="dropbtn">Menu</button>
        <div class="dropdown-content">
          <a href="ebook.php">E-Books</a>
          <a href="home.php">Volunteer</a>
          <a href="NewsandEventForm.php" >News & Events</a>
          <!-- <a href="#feedback" data-toggle="modal">FeedBack</a> -->
          <!-- <a href="#feedback" class="nav-link at-float" data-toggle="modal" id="at-menu-share">
            <i class="fa fa-plus my-float"></i></a>           -->
        </div>
      </div>
      <?php
        if(isset($_SESSION['member_id']) && isset($_SESSION['member_name']))
            echo '<button class="btn-btn-self menu-btn" id="logout">Logout</button>';
        else
            echo '<button class="btn-btn-self menu-btn" id="login">Login or Sign Up</button>';
      ?>   
    </div>
    <div class="hamburger-menu">
      <div id="nav-icon1">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div> 
  </header>
  <nav class="mobile-menu" style="display: none;">
    <div class="menu-links">
      <a href="donation_form.php">Donation</a>
      <a href="ebook.php">E-Books</a>
      <a href="#">News & Events</a>
      <a href="about.php">About Us</a>
      <a href="ngo_registration_form.php">NGO Registration</a>
      <a href="#">FeedBack</a>
      <!-- <button class="menu-btn">Login or Sign Up</button> -->
      <?php
        if(isset($_SESSION['member_id']) && isset($_SESSION['member_name']))
            echo '<a class="menu-btn" id="logout" style="box-sizing:border-box; width:fit-content;" href="logout.php">Logout</a>';
        else
            echo '<a class="menu-btn" id="login" style="box-sizing:border-box; width:fit-content;" href="login_form.php">Login or Sign Up</a>';
      ?>
    </div>
  </nav>

  <!-- Feedback Form Modal -->
  

  <script>
    $(document).ready(function(){
      $('#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4').click(function(){
        $(this).toggleClass('open');
        $('.mobile-menu').toggle('slow');
      });
    });

    const button=document.querySelector('.menu-btn');
    button.addEventListener('click',(e)=>{
      if(e.target.id==='logout')
        window.location.href='logout.php';
      else
        window.location.href='register_form.php';
    });

    document.getElementById('title').addEventListener('click',()=>{
      window.location.href='index.php';
    });
    
  </script>    
</body>
</html>

