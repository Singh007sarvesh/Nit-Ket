<?php
session_start();
include_once("src/Google_Client.php");
include_once("src/contrib/Google_Oauth2Service.php");
######### edit details ##########
$clientId = '579127624180-u1kij523m01dde0l8uth0lb7fd67tikh.apps.googleusercontent.com'; //Google CLIENT ID
$clientSecret = 'sP_bUsN5vxMyR9egpNkBah2r'; //Google CLIENT SECRET
$redirectUrl = 'https://nitkit.000webhostapp.com/NitKiT/NitKiT/user';  //return url (url to script)
$homeUrl = 'https://nitkit.000webhostapp.com/NitKiT/NitKiT/user';  //return to home

##################################

$gClient = new Google_Client();
$gClient->setApplicationName('Login to NIT-KET');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectUrl);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>