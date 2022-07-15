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
            <title>Volunteer Registration</title>
            <link rel="stylesheet" href="../Style/volunteer_form.css">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Volunteer Form</title>
        </head>
        <body>
        <div id="Head"></div>
        <form action="./volunteer.php" method="post" style="margin: 1.5rem 0;" enctype="multipart/form-data">
            <div class="registration">
                <h1>Volunteer Registration Details</h1><br/>
                <input type="hidden" value="<?php echo $_GET['id'];?>" name="ngoid"/>
                <label for='ngo-gender'>Gender</label>
                <select id="gender" name="volunteer_gender" required>  
                    <option selected disabled>--Selected--</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option> 
                    <option value="others">Others</option>
                    </select>
                <label for="vol_dob">Date of Birth</label>
                <input type="date" name="vol_dob" min="1950-01-01" max="2003-06-01">  
            </div>
            <div class="contact-details">
                <h1>Contact Details</h1>
                <hr/><br/>
                <label for='contact'>Mobile Number</label>
                <input type="tel" name="vol_contact"  inputmode="numeric" placeholder="Enter Mobile Number" maxlength="10"  pattern="[9,6,7,8]{1}[0-9]{9}" title="Mobile Number must start with either 6,7,8 or 9." required><br/>
                <label for='address'>Address</label>
                <input type="text" name="vol_address"  placeholder="Enter your Address" required><br/>
                <label for='ngo-address'>City</label>
                <input type="text" name="vol_city"  placeholder="Enter your City" required><br/>
                <label for='ngo-state'>State</label>
                <!-- <input type="text" name="ngo-state"  placeholder="Enter NGO State" required><br/> -->
                <select id="country-state" name="vol_state" required>
                    <option selected disabled>--Select--</option>
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
            </div>    
            <div class="occupations-details">
                <h1>Occupations Details</h1>
                <hr/><br/>
                <label for='Another-qualification'>Occupations </label>
                <!-- <input type="text" name="ngo-state" id="" placeholder="Enter NGO State" required><br/> -->
                <select id="volunteer_occu" name="vol_occ" required>
                    <option selected disabled>--Selected--</option>
                    <option value="student">Student</option>
                    <option value="employee">Employee</option>
                    <option value="france">Freelancer</option>
                    <option value="entrepreneur">Entrepreneur</option>
                    <option value="social worker">Social Worker</option>
                    <option value="service person">Service Person</option>
                    <option value="other">Others</option>
                </select> 
                <label for='other_degree' name = "other_occu" id = "other_degree" style="display: none;">Other Occupations</label>
                <input type="text" name="other_occu" id="other_occu" placeholder="Your Occupations" style="display: none;"> 
                <label for='interested' class="comment">In which domain would you like to serve? (Maximum 200 characters)</label>
                <textarea class="textinput" name="vol_dom_desc" placeholder="Word Limit:200 Words" maxlength="200" required></textarea>
                <label for='join' class="comment" >Why you want to join us?(Maximum 200 characters)</label>
                <textarea class="textinput" name="vol_join_desc" placeholder="Word Limit:200 Words" maxlength="200" required></textarea>
                <label for='Vol_resume'>Resume(only pdf)</label> 
                <input type="file" name="resume_upload"  accept="application/pdf" required>
                <!-- <input type="file" name="resume_upload" required> -->
            </div>
            <div class="btn">
                <input type="submit" name="submit" value="Submit"/>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" ></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.2/jquery-ui.min.js"></script>
        <script>
            $('#vol_occ').on('change',function(){
                if($(this).val() === "other"){
                    $("#other_degree").show();
                    $("#other_occu").show();
                }
                else{
                    $("#other_degree").hide();
                    $("#other_occu").hide();
                } 
            });
        </script>
        </body>
        </html>
    <?php
    }
    else
      header('location:login_form.php');
?>