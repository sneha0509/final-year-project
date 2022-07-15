<?php
$success = 0;
$error_message = "";
$success_message = "";

require 'dbcon.php';

date_default_timezone_set("Asia/Kolkata");

//$conn = mysqli_connect("localhost","root","root","demodb");
if (!empty($_POST["submit_email"])) {

    //echo '<script>localStorage.removeItem("ngoId")</script>';

    $select_email = "select * from ngo_register where email=:email";
    $stmt = $pdo->prepare($select_email);
    $stmt->execute(['email' => $_POST['ngo_email']]);
    $count = $stmt->rowCount();

    //$result = mysqli_query($conn,"SELECT * FROM ngo_register WHERE email='" . $_POST["ngo_email"] . "'");
    //$count  = mysqli_num_rows($result);

    if ($count > 0) {
        // generate OTP
        $otp = 123456;

        $arr = $stmt->fetch(PDO::FETCH_ASSOC);
        $ngo_id = $arr['ngoid'];
        setcookie('ngoId', $ngo_id);

        // Send OTP
        //require_once("sendOTP.php");
        //$mail_status = sendOTP($_POST["ngo_email"],$otp);

        $mail_status = 1;
        if ($mail_status == 1) {

            $insertquery = "Insert into otp_table (otp,is_expired,create_at) values(:otp,:is_expired,:create_at)";
            $stmt = $pdo->prepare($insertquery);
            $arr = [
                "otp" => $otp, "is_expired" => 0, "create_at" => date("Y-m-d H:i:s")
            ];
            $stmt->execute($arr);

            //$result = mysqli_query($conn,"INSERT INTO otp_table(otp,is_expired,create_at) VALUES ('" . $otp . "', 0, '" . date("Y-m-d H:i:s"). "')");
            $success = 1;
            $success_message = "Check your email for the OTP.";
        }
    } else {
        $error_message = "Email not exists!";
    }
}
if (!empty($_POST["submit_otp"])) {

    $select_otp = "select * from otp_table where otp=:otp and is_expired!=1 and NOW() <= DATE_ADD(create_at, INTERVAL 1 MINUTE)";
    $stmt = $pdo->prepare($select_otp);
    $stmt->execute(['otp' => $_POST['otp']]);
    $count = $stmt->rowCount();

    //$result = mysqli_query($conn,"SELECT * FROM otp_table WHERE otp='" . $_POST["otp"] . "' AND is_expired!=1 AND NOW() <= DATE_ADD(create_at, INTERVAL 24 HOUR)");
    //$count  = mysqli_num_rows($result);

    if (!empty($count)) {
        $select_otp = "UPDATE otp_table SET is_expired = 1 WHERE otp=:otp";
        $stmt = $pdo->prepare($select_otp);
        $stmt->execute(['otp' => $_POST['otp']]);

        //$result = mysqli_query($conn,"UPDATE otp_table SET is_expired = 1 WHERE otp = '" . $_POST["otp"] . "'");
        $success = 2;
    } else {
        $success = 1;
        $success_message = "";
        $error_message = "Invalid OTP!";
    }
}

?>

<?php
#include('config.php');
session_start();
if (isset($_SESSION['ngo_id']))
    header('location:../ngo_dashboard/pages/Ngo-Dashboard.php');
else { ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta httpbutton-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
        <title>NGO Login</title>
        <link rel="stylesheet" href="../Style/register.css">
    </head>

    <body>
        <div id="Head"></div>
        <br />
        <div class="container">
            <div class="form_container">
                <form method="post">
                    <h1>Log In</h1>
                    <?php
                    if ($success === 0) { ?>
                        <?php
                        if (!empty($error_message)) {
                            echo "<div class='alert' style='background-color:#FFBED8; border-radius:5px; padding:0.7em'>
                                            <p style='color:red; text-align:center'>{$error_message}</p>
                                        </div><br/>";
                        }
                        ?>
                        <label for="ngo_email">Ngo Email</label><br />
                        <input type="email" placeholder="Enter Your Registered Email" required name="ngo_email" />
                        <input type="submit" value="Submit" name="submit_email" />
                    <?php
                    } else if ($success === 2) {
                        $_SESSION['ngo_id'] = $_COOKIE['ngoId'];
                        //echo gettype($_SESSION['ngo_id']); 
                        header('location:../ngo_dashboard/pages/Ngo-Dashboard.php');
                    } else {
                    ?>
                        <?php
                        if (!empty($error_message)) {
                            echo "<div class='alert' style='background-color:#FFBED8; border-radius:5px; padding:0.7em'>
                                        <p style='color:red; text-align:center'>{$error_message}</p>
                                    </div><br/>";
                        }
                        ?>
                        <?php
                        if (!empty($success_message)) {
                            echo "<div class='alert' style='background-color:lightgreen; padding:0.7em; border-radius: 5px;'>
                                        <p style='color:green; text-align:center;'>{$success_message}</p>
                                    </div><br/>";
                        }
                        ?>
                        <p id="timer" style="text-align: center; font-weight:bold; font-size:1.1rem"></p><br />
                        <label for="otp">OTP</label><br />
                        <input type="text" inputmode="numeric" style="opacity:1" autocomplete="one-time-code" pattern="[0-9]{6}" minlength="6" maxlength="6" placeholder="Enter OTP" required name="otp" />
                        <input type="submit" value="Submit" name="submit_otp" />
                        <br />
                    <?php
                    }
                    ?>
                </form>
            </div>
        </div><br /><br />
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
?>