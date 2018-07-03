<?php
session_start();

//connect to database
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
    $username = filter_var($_POST['username'],FILTER_SANITIZE_STRING);
    
    
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
    echo "<div class='alert alert-danger'>".$error."</div>";exit;
}


    //prepairing varibales for sql 
    
    $username = mysqli_real_escape_string($link,$_POST['username']);
    $email = mysqli_real_escape_string($link,$_POST['email']);
    //$password = mysqli_real_escape_string($link,$password);
    
    
    //checking if the user had already registered
   $sql = "select * from users where username = 'pankaj'";
   $result = mysqli_query($link,$sql);
   if(!$result) {
       echo  "<div class='alert alert-danger'>Error in inserting the user details</div>";exit;
   }
   
   
   $results = mysqli_num_rows($result);
   if(!$results) {
       echo  "<div class='alert alert-danger'>Username is already registered!<br>Login to access</div>";exit;
   }
   
   
    
   
        //creating actvation key
        
        /*$activationkey = bin2hex(openssl_random_pseudo_bytes(16));
        $sql = "insert into users (name,email,password) values('$username','$email','$password')";
        $result = mysqli_query($link,$sql);
        if (!$result) {
            echo "<div class='alert alert-danger'>Error in inserting the user details</div>";exit;
        }
        
        $message = "Please click on this link to activate your account:\n\n"; 
        $message.= "http://geeks.thecompletewebhosting.com/online-notes/activate.php?email=".urlencode($email)."&key=$activationkey";
        
        if(mail($email,'Confirm Your Registration',$message,'From:','onlinenotes@geeks.thecompletewebhosting.com'))
        echo "<div class='alert alert-success'>Thank you for registering!<br>Please click on the activation link in your mail box  to activate your account</div>";
        else echo 'mail not send';*/
        
    
    
        
    
    
    



?>