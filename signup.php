<?php
session_start();

//connrct to database
include "connection.php";

//define error msgs

$usernameerror = '<p><strong>Invalid Unsername</strong></p>';
$emailerror = '<p><strong>Invalid Email</strong></p>';
$passworderror = '<p><strong>Invalid Password</strong></p>';
$passwordconf = '<p><strong>Passowrd do not match</strong></p>';
$missingpassword = '<p><strong>Please provide a password graeter than 6 with atlest 1 capital letter and one digit</strong></p>';
$confpassword = '<p><strong>Please confirm the password</strong></p>';


//check fields submitted or not

if(!isset($_POST['username']))
    $error.= $usernameerror;
else
    $username = filter_var($_POST['username'],FILTER_SNITIZE_STRING);
    
    
if(!isset($_POST['email']))
    $error.= $emailerror;
else 
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);  
    
    
if(!isset($_POST['passowrd']))
    $error.= $passworderror;
elseif (strlen($_POST['password']) > 6 and preg_match('/[A-Z]/',$_POST['password']) and preg_match('/[0-9]/',$_POST['password']))
    $error.= $missingpassword;
else {
    $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
    if(!isset($_POST['confirm-password']))
        $error.= $confpassword;
    elseif($_POST['confirm-password'] != $_POST['password'])
        $error.= $passwordconf;
    else 
        $password = md5($_POST['password']);
}


if($error) {
    echo "<div class='alert alert-danger'>".$error."</div>";
}
elseif(!$error){
    echo "<div class='alert alert-success'>Sign Up Successfull!!</div>";
}
reset($error);

?>