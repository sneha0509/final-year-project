<html lang="en">
<head>
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  <link rel="stylesheet" href="../Style/Footer.css">
</head>
<body class="foot">
      <footer class="footer">
        <!-- <div class="waves">
          <div class="wave" id="wave1"></div>
          <div class="wave" id="wave2"></div>
          <div class="wave" id="wave3"></div>
          <div class="wave" id="wave4"></div>
        </div> -->
        <ul class="social-icon">
          <li class="social-icon__item"><a class="social-icon__link" href="#">
              <ion-icon name="logo-facebook"></ion-icon>
            </a></li>
          <li class="social-icon__item"><a class="social-icon__link" href="#">
              <ion-icon name="logo-twitter"></ion-icon>
            </a></li>
          <li class="social-icon__item"><a class="social-icon__link" href="#">
              <ion-icon name="logo-linkedin"></ion-icon>
            </a></li>
          <li class="social-icon__item"><a class="social-icon__link" href="#">
              <ion-icon name="logo-instagram"></ion-icon>
            </a></li>
        </ul>
        <ul class="menu">
          <li class="menu__item"><a class="menu__link" href="index.php">Home</a></li>
          <li class="menu__item"><a class="menu__link" href="TC.php">Terms & Conditions</a></li>
          <li class="menu__item"><a class="menu__link" href="about.php#Team">Our Team</a></li>
          <li class="menu__item"><a class="menu__link" href="privacy.php">Privacy Policy</a></li>
          <li class="menu__item"><a class="menu__link" href="about.php#Contact">Contact Us</a></li>
        </ul>
        <p align='center'>&copy; <span id='year'></span> Help in One Place | All Rights Reserved</p>
    </footer> 
     <script>
       document.getElementById('year').innerHTML=((new Date().getFullYear()));
     </script>
</body>
</html>
