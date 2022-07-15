<?php

    #include('config.php');
    session_start();
    if(isset($_SESSION['member_id']) && isset($_SESSION['member_name']))
        header('location:./index.php');
    else 
    { ?> 
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta httpbutton-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
            <title>Login</title>
            <link rel="stylesheet" href="../Style/register.css">
        </head>
        <body>
            <div id="Head"></div>
            <div class="container">
                <div class="form_container">
                    <form method="post" action="login.php">
                        <h1>Log In</h1>
                        <label for="name">E-mail</label><br/>
                        <input type="email" placeholder="Enter Your E-Mail" required  name="email"/>
                        <!-- <label for="password">Password</label><br/>
                        <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Your Password" required name="password"/><br/> -->
                        <p style="position:relative; padding:0.5rem 0;">
                            <label for="password">Password</label><br/>
                            <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Enter Your Password" required name="password"/><br/>
                            <i class="bi bi-eye-slash" id="togglePassword" style="cursor:pointer; position:absolute; right:0; top:2.75em; padding:0.5rem;"></i>
                        </p>
                        <input type="submit" value="Login" name="submit"/>
                        <div class="login">
                            <p>New User?&nbsp;</p>
                            <a href="register_form.php">SignUp</a>
                        </div>
                        <div class="or">
                            <p>Or</p>
                        </div><br/>
                        <div class="social_media">
                            <div class="google">
                                <!-- <?php
                                    #echo $login_button;
                                ?> -->
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z"/>
                                    </svg>
                                    Continue With Google
                                </a>
                            </div>
                        </div><br/>
                        <div class="or">
                            <p>Or</p>
                        </div>
                        <div class="login">
                            <a href="ngo_login_form.php" class="ngo_login">Ngo Login</a>
                        </div>
                    </form>
                </div>
            </div><br/><br/>
            <div id="Foot"></div>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script>
                $(function(){
                    $("#Head").load("Header.php");
                    $("#Foot").load("Footer.php");
                });

                const togglePassword=document.querySelector('#togglePassword');
                const password=document.querySelector("input[type='password']");

                togglePassword.addEventListener('click',()=>{
                    let inputType=password.getAttribute('type');
                    password.setAttribute('type',(inputType==='password')? 'text':'password');
                });
            </script>
        </body>
        </html>
    <?php
    }
?>