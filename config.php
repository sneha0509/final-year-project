<?php

//start session on web page
session_start();

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object/instance of Google API Client for call Google API
$google_client = new Google_Client();

//Set the OAuth 2.0 Client ID
$google_client->setClientId('784908931392-hlsa16hova67k4gu2thooda34q7var7q.apps.googleusercontent.com');

//Set the OAuth 2.0 Client Secret key
$google_client->setClientSecret('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');

//Set the OAuth 2.0 Redirect URI
$google_client->setRedirectUri('http://localhost/fyp/PHP/login_form.php');

// to get the email and profile 
$google_client->addScope('email');

$google_client->addScope('profile');

?>