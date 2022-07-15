<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="../Style/about.css"/>
    
</head>
<body>
    <!-- Including Header -->
    <div id="Head"></div>
    <!-- About Us -->
    <div class="container about" id="About">
        <div class="content">
            <h1>About Us</h1><br>
            <p>
                SEWA stands for Society for Empowering Women to Achieve. It is a registered society (Regn no 467 of 2019) established with the objective of providing all types of support to women so that they can progress 
                in their chosen fields. SEWA will also serve as a platform for all Mrs India finalists to carry out their ideas to make a positive difference to the society. One wonderful woman will come up with an initiative, and all other beautiful women will support her.
                Society for Empowering Women to Achieve (SEWA) is a platform for women to join hands and work towards a better society by enhancing the quality of living especially for women. The major focus of work is providing quality education and scholarships, improving women health in rural and below poverty line sectors. Regular counselling sessions to resolve family issues, helping in overcoming domestic violence related cases. Supporting promising startups and entrepreneurs, etc.
            </p>
        </div>
        <div class="image">
            <img src="../Image/about.jpg" alt="Failed To Load..." width="700" height="600" />
        </div>
    </div><br/><hr/>
    <!-- Our Team -->
    <div class="team" id="Team">
        <h1 align='center'>Our Team</h1><br/>
        <div class="cards">
            <div class="card1" data-aos="zoom-in">
                <div class="card-image">
                    <img src="../Image/about.jpg"/>
                </div>
                <div class="card-content">
                    <p><b>Surya Prakash Gupta</b><hr>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius velit cum quisquam cumque dignissimos laborum sit, assumenda quasi unde adipisci molestias asperiores magnam error labore obcaecati tempore voluptate molestiae officiis nemo fuga maiores deserunt! Magnam fugit quaerat, quisquam distinctio minima 
                    </p>
                </div>
            </div>
            <div class="card2" data-aos="zoom-in">
                <div class="card-image">
                    <img src="../Image/about.jpg"/>
                </div>
                <div class="card-content">
                    <p><b>Sneha Tripathi</b><hr>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius velit cum quisquam cumque dignissimos laborum sit, assumenda quasi unde adipisci molestias asperiores magnam error labore obcaecati tempore voluptate molestiae officiis nemo fuga maiores deserunt! Magnam fugit quaerat, quisquam distinctio minima 
                    </p>
                </div>
            </div>
            <div class="card3" data-aos="zoom-in">
                <div class="card-image">
                    <img src="../Image/about.jpg"/>
                </div>
                <div class="card-content">
                    <p><b>Piyush Kumar Ghosh</b><hr>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius velit cum quisquam cumque dignissimos laborum sit, assumenda quasi unde adipisci molestias asperiores magnam error labore obcaecati tempore voluptate molestiae officiis nemo fuga maiores deserunt! Magnam fugit quaerat, quisquam distinctio minima 
                    </p>
                </div>
            </div>
        </div>
    </div><br/><hr/>
    <!-- Contact Us -->
    <h1 align='center' style="padding: 1rem;">Contact Us</h1>
    <div class="contact" id="Contact">
        <div class="contact-form" data-aos="fade-up">
            <form action="" method="POST">
                <label for="name">Full Name</label><br/>
                <input type="type" placeholder="Enter Your Name" required/>
                <label for="email">E-Mail</label><br/>
                <input type="email" placeholder="Enter Your Email" required/><br/>
                <label for="message">Message</label><br/>
                <textarea type="textarea" placeholder="Write Your Message..." required style="min-height: 150px;"></textarea><br/>
                <input type="submit" value="Submit"/>
            </form>
        </div>
        <div class="map">
            <div class="mapouter" data-aos="fade-up">
                <div class="gmap_canvas">
                    <iframe  height="400" style="width:100%" id="gmap_canvas" src="https://maps.google.com/maps?q=meerapur%2C%20prayagraj&t=k&z=13&ie=UTF8&iwloc=&output=embed" 
                    frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    <a href="https://www.whatismyip-address.com"></a>
                </div>
            </div>          
        </div>
    </div><br/>
    <!-- Including Footer -->
    <div id="Foot"></div>
    <!-- SCRIPT -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration:950
        });
        
    $(function(){
        $("#Head").load("Header.php");
        $("#Foot").load("Footer.php");
    });
</script>
</body>
</html>