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

if(empty($_POST['username']))
    $error.= $usernameerror;
else
    $username = filter_var($_POST['username'],FILTER_SNITIZE_STRING);
    
    
if(empty($_POST['email']))
    $error.= $emailerror;
else 
    if(!(preg_match('/[.]/',$_POST['email'])))
        $error.= $emilerror;
    $email = filter_var($_POST['email'],FILTER_VALIDATE_EMAIL);  
    
    
if(empty($_POST['password']))
    $error.= $passworderror;
elseif (!(strlen($_POST['password']) > 6 and preg_match('/[A-Z]/',$_POST['password']) and preg_match('/[0-9]/',$_POST['password'])))
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
    //prepairing varibales for sql 
    $username = mysqli_real_escape_string($link,$_POST['username']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    $password = mysqli_real_escape_string($link,$password);
    
    
    //checking if the user had already registered
    $sql = "select * from users where username='$username'";
    $result = mysqli_query($link,$sql);
    if($result) {
        echo "<div class='alert alert-danger'>Username already registered</div>";
        reset($username);
    }
    else {
        $sql = "insert into users(username,password,email) values ('$username','$password','$email')";
        $result = mysqli_query($link,$sql);
    if($result) {
        echo "<div class='alert alert-success'><strong>Sign Up Successful!!</strong></div>";
    }
        
    }
    
    
}


?>