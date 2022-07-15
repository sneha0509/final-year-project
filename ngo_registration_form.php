<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGO Registration</title>
    <link rel="stylesheet" href="../Style/ngo.css">
</head>
<body>
    <div id="Head"></div><br>
    <div class="container"> 
      <form action="ngo_registration.php" method="post" enctype="multipart/form-data">
        <!-- Registration Details-->
        <div class="registration">
          <h1>Registration Details</h1>
          <hr/><br/>
          
          <label for='name'>Name of NGO</label>
          <input type="text" name="ngoname"  placeholder="Enter NGO Name" required><br/>
          
          <label for='ngodomain'>Domain of NGO (Max. 150 characters)</label>
          <input type="text" name="ngodomain"  placeholder="Enter NGO Domain (For multiple domain separate by comma)" maxlength="150" required><br/>
          
          <label for='act'>Act Name</label>
          <input type="text" name="act"  placeholder="Enter Act Name" required><br/>
          
          <label for='reg_no'>Registration No.</label>
          <input type="text" name="reg_no"  minlength="3" maxlength="12"  title="Enter only numbers (0-9)" placeholder="Enter Registration Number" required><br/>
          
          <label for='city'>City of Registration</label>
          <input type="text" name="city"  placeholder="Enter City Name"  required><br/>
          
          <label for='state'>State of Registration</label>
          <!-- <input type="text" name="state"  placeholder="Enter State Name" required><br/> -->
          <!--- India states -->
          <select id="country-state" name="ngo-registry-state" required>
            <option selected disabled>--Selected--</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
            <option value="Daman and Diu">Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Ladakh">Ladakh</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Madhya">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
          </select>

          <label for='reg_date'>Date of Registration</label>
            <input type="date" id="date" name="reg_date"/><br/>
        </div>
        <!-- Founder Details -->
        <div class="founder-details">
          <h1>Founder Details</h1>
          <hr/><br/>
          <label for='founder'>Name of NGO Founder</label>
          <input type="text" name="founder"  placeholder="Enter Founder Name" required><br/>
          
          <label for='mail'>Email</label>
          <input type="email" name="mail"  placeholder="Enter Email" required><br/>
          
          <label for='contact'>Mobile Number</label>
          <input type="text" name="contact"  placeholder="Enter Mobile Number" minlength="10" maxlength="10"  pattern="[6789][0-9]{9}" title="Mobile Number must start with either 6,7,8 or 9."  required><br/>
          
          <label for='aadhar'>Aadhar Number</label>
          <input type="text" name="aadhar"  placeholder="Enter 12-digit Aadhar Number" minlength="12" inputmode="numeric" maxlength="12" title="[0-9]{12}" required><br/>
          
          <label for='pan'>PAN Number</label>
          <input type="text" name="pan"  placeholder="Enter 10-digit PAN Number" required inputmode="numeric" minlength="10" maxlength="10" pattern="[A-Z]{5}[0-9]{4}[A-Z]{1}"><br/>
        </div>
        <!-- Contact Details -->
        <div class="contact-details">
          <h1>Contact Details</h1>
          <hr/><br/>
          <label for='address'>NGO Address</label>
          <input type="text" name="address"  placeholder="Enter NGO Address" required><br/>

          <label for='ngo-city'>NGO City</label>
          <input type="text" name="ngo-city"  placeholder="Enter NGO City" required><br/>

          <label for='ngo-state'>NGO State</label>
          <!-- <input type="text" name="ngo-state"  placeholder="Enter NGO State" required><br/> -->
          <select id="country-state" name="contact-country-state" required>
            <option selected disabled>--Selected--</option>
            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
            <option value="Andhra Pradesh">Andhra Pradesh</option>
            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
            <option value="Assam">Assam</option>
            <option value="Bihar">Bihar</option>
            <option value="Chandigarh">Chandigarh</option>
            <option value="Chhattisgarh">Chhattisgarh</option>
            <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
            <option value="Daman and Diu">Daman and Diu</option>
            <option value="Delhi">Delhi</option>
            <option value="Goa">Goa</option>
            <option value="Gujarat">Gujarat</option>
            <option value="Haryana">Haryana</option>
            <option value="Himachal Pradesh">Himachal Pradesh</option>
            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Karnataka">Karnataka</option>
            <option value="Kerala">Kerala</option>
            <option value="Ladakh">Ladakh</option>
            <option value="Lakshadweep">Lakshadweep</option>
            <option value="Madhya Pradesh">Madhya Pradesh</option>
            <option value="Maharashtra">Maharashtra</option>
            <option value="Manipur">Manipur</option>
            <option value="Meghalaya">Meghalaya</option>
            <option value="Mizoram">Mizoram</option>
            <option value="Nagaland">Nagaland</option>
            <option value="Odisha">Odisha</option>
            <option value="Puducherry">Puducherry</option>
            <option value="Punjab">Punjab</option>
            <option value="Rajasthan">Rajasthan</option>
            <option value="Sikkim">Sikkim</option>
            <option value="Tamil Nadu">Tamil Nadu</option>
            <option value="Telangana">Telangana</option>
            <option value="Tripura">Tripura</option>
            <option value="Uttar Pradesh">Uttar Pradesh</option>
            <option value="Uttarakhand">Uttarakhand</option>
            <option value="West Bengal">West Bengal</option>
          </select>

          <label for='pin-code'>Pin Code</label>
          <input type="text" name="Pincode"  placeholder="Enter Pin code" inputmode="numeric" pattern="[1-9][0-9]{5}" minlength="6" maxlength="6" required><br/>

          <label for='mobile'>Mobile No.</label>
          <input type="text" name="mobile"  placeholder="Enter Mobile Number" inputmode="numeric" minlength="10" maxlength="10"  pattern="[6789][0-9]{9}"  title="Mobile Number must start with either 6,7,8 or 9." required><br/>

          <label for='url'>Website Url</label>
          <input type="url" name="website"  pattern="https?://.+" placeholder="Enter NGO Website URL (https://www.xyz.com)" required><br/>

          <label for='ngo-email'>NGO E-Mail</label>
          <input type="email" name="ngo-email"  placeholder="Enter NGO Email" required/><br/>

          <label for='ngo-description'>NGO Description (Max. 255 characters)</label>
          <textarea rows="5" cols="50" id="description" name="ngo_description"  placeholder="Enter NGO Description"  maxlength="255" style="resize:none" required></textarea><br/>

          <!-- <label for='file_upload' >Upload Cover Photo</label> -->
          <!-- <button type="button" class="btn btn-dark form-control" onclick="document.getElementById('file_upload1').click()" id="file_btn1">Select image</button> -->
          <!-- <input type="file" name="" id="file_upload1" accept="image/*" required> -->

          <label for='file_upload'>Upload Profile Photo</label>
          <!-- <button type="button" class="btn btn-dark form-control" onclick="document.getElementById('file_upload2').click()" id="file_btn2">Select image</button> -->
          <input type="file" name="profile" id="file_upload2" accept="image/png, image/jpg, image/jpeg"  required width="300" height="200">

        </div><br/>
        <div class="btn" style="display: block; margin:auto">
            <input type="submit" value="Submit" name='submit'/>
        </div>
      </form>
    </div><br/>
    <div id="Foot"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
      $(function(){
          $("#Head").load("Header.php");
          $("#Foot").load("Footer.php");
      });
  </script>   
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script>
      const today=new Date();
      const inputdate=document.querySelector("#date");
      let date=today.getDate();
      let year=today.getFullYear();
      let month=today.getMonth()+1;
      
      date=(date<10)?'0'+date:date;
      month=(month<10)?'0'+month:month;
      
      inputdate.setAttribute('max',year+'-'+month+'-'+date);
      // console.log(inputdate);
      </script>
</body>
</html>