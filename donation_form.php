
<?php
header("Cache-Control", "no-cache, no-store, must-revalidate");
session_start();
if(isset($_SESSION['member_id']) && isset($_SESSION['member_name']))
{ ?><!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet"  href="../Style/tabs_style.css">
<link rel="stylesheet" href="../Style/donation_form.css">
</head>
<script>
 function change_tab(id)
 {
   document.getElementById("page_content").innerHTML=document.getElementById(id+"_desc").innerHTML;
   document.getElementById("page1").className="notselected";
   document.getElementById("page2").className="notselected";
   document.getElementById(id).className="selected";
 }
</script>

<body>
<div id="Head"></div>

    <!-- Introduction -->
    <a id="button" href="#Head"></a>
<div clas="navbar" id="main_content">
 <li class="notselected" id="page1" onclick="change_tab(this.id);">Money</li>
 <li class="notselected" id="page2" onclick="change_tab(this.id);">Others</li>
 
 <!--Page1-donation-->
 <div class='hidden_desc' id="page1_desc">
  <form action="donation.php" method="POST">
        <label for="name">Full Name</label>
           <input name="don_name" id="name"class="form-control"type="text" maxlength="20" placeholder="Enter your Name" required />
        <label for="email">Email Address</label>
            <input name="don_email" id="email" class="form-control" type="text" placeholder="Enter Your Email Address" required/>
         
        <label for="phone">Phone</label>
            <input type="number" name="don_contact" id="contact" placeholder="Enter Mobile Number" maxlength="10"  pattern="[0-9]{10}" required><br/>  

        <label for='ngotype'>Name of NGO</label>
        <select id="donation_ngo" name="ngo_type" required>
        <option selected disabled>--Selected--</option>
        <?php
          $connection = mysqli_connect("localhost","root","");
          $db = mysqli_select_db($connection,"demodb");
          $query = 'select * from ngo_register';
          $query_run = mysqli_query($connection,$query);
          $cheack=mysqli_num_rows($query_run)>0;
         if($cheack){
          while($row = mysqli_fetch_assoc($query_run)){
            ?><option value=<?php echo $row['ngoid']?>><?php echo $row['ngo_name'];?></option><?php
             }}
            ?></select>
      

        <label for="address">Address</label>
          <input name="don_address" id="" type="text" placeholder="Enter Your Address" required/>
      
        <label for="city">City</label>
          <input type="text" name="don_city" id="" placeholder="Enter City Name" required><br/>
      
        <label for='state'>State</label>
          <!-- <input type="text" name="state" id="" placeholder="Enter State Name" required><br/> -->
          <!--- India states -->
          <select id="country-state" name="donation_state" required>
            <option selected disabled>--Selected--</option>
            <option value="AN">Andaman and Nicobar Islands</option>
            <option value="AP">Andhra Pradesh</option>
            <option value="AR">Arunachal Pradesh</option>
            <option value="AS">Assam</option>
            <option value="BR">Bihar</option>
            <option value="CH">Chandigarh</option>
            <option value="CT">Chhattisgarh</option>
            <option value="DN">Dadra and Nagar Haveli</option>
            <option value="DD">Daman and Diu</option>
            <option value="DL">Delhi</option>
            <option value="GA">Goa</option>
            <option value="GJ">Gujarat</option>
            <option value="HR">Haryana</option>
            <option value="HP">Himachal Pradesh</option>
            <option value="JK">Jammu and Kashmir</option>
            <option value="JH">Jharkhand</option>
            <option value="KA">Karnataka</option>
            <option value="KL">Kerala</option>
            <option value="LA">Ladakh</option>
            <option value="LD">Lakshadweep</option>
            <option value="MP">Madhya Pradesh</option>
            <option value="MH">Maharashtra</option>
            <option value="MN">Manipur</option>
            <option value="ML">Meghalaya</option>
            <option value="MZ">Mizoram</option>
            <option value="NL">Nagaland</option>
            <option value="OR">Odisha</option>
            <option value="PY">Puducherry</option>
            <option value="PB">Punjab</option>
            <option value="RJ">Rajasthan</option>
            <option value="SK">Sikkim</option>
            <option value="TN">Tamil Nadu</option>
            <option value="TG">Telangana</option>
            <option value="TR">Tripura</option>
            <option value="UP">Uttar Pradesh</option>
            <option value="UT">Uttarakhand</option>
            <option value="WB">West Bengal</option>
          </select>
       
        <label for="pincode">Pincode</label>
          <input   name="don_pin" id="" placeholder="Enter PINCODE Number" required maxlength="6 required"><br/>
     
        <label for="dateOfBirth">Date of Birth</label>
          <input name="don_dateOfBirth"  min="1950-01-01" max="2003-06-01" id="" type="date" placeholder="" required/>    
 
        <label for="amount"> Donation Amount </label>
          <input id="amount" name="don_amount"  type="don_number" placeholder="Rs." required/>  

        <label>Payment Mode</label>
          <select id="country-state" name="don_option" required>
              <option selected disabled>--Selected--</option>
              <option value="upi">UPI</option>
              <option value="credit">Credit Card</option>
              <option value="emandate">Emandate</option></select>
              <button type="submit" name="submit" color="primary"><div class="btn_don">Submit</div></button>
    </form>
  
</div>




<!--others page2-->
 <div class='hidden_desc' id="page2_desc">
    <div><center>
    <img width="50%" height="50%" src="../Image/pic_cons.svg">
    <h2>Under Construction.....</h2></center>
  </div>
 </div>
 
 
 <!--front page-->
 <div id="page_content">
   <center>
  <img width="50%" height="50%" src="../Image/don.webp"><img width="30%" height="30%" src="../Image/don1.jpeg">
 <h2>The measure of a life, after all, is not its duration, but its donation---- Corrie Ten Boom</h2></center></div>
</div><br>

<div id="Foot"></div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
        $(function() {
            $("#Head").load("Header.php");
            $("#Foot").load("Footer.php");
        });
</script>
</body>
</html>
<?php
    }
    else
      header('location:login_form.php');
?>