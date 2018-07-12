<?php

include "connection.php";
session_start();
if(empty($_POST['forgotemail'])) {
    echo "<div class='alert alert-danger'>Enter valid email<button class='close' data-dismiss='alert'>&times;</div>";
}

else {
    $email = $_POST['forgotemail'];
    $email = filter_var($email,FILTER_VALIDATE_EMAIL);
    $email = mysqli_real_escape_string($link,$email);
    

    $sql="select * from users where email='$email'";
    $result = mysqli_query($link,$sql);
    
    if($result && mysqli_num_rows($result) == 1) {
        //echo "<div class='alert alert-success'>Great!!<button class='close' //data-dismiss='alert'>&times;</div>";
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);    
        $userid = $row['user_id'];
        $code = bin2hex(openssl_random_pseudo_bytes(16));
        $time = time();
        $status ='pending';
        
        
        $sql = "insert into forgotpassword (user_id,authkey,time,status) values ('$userid','$code','$time','$status')";
        $result1 = mysqli_query($link,$sql);
        if($result1) {
            
            
         $message = "Please click on this link to reset your password:\n\n"; 
        $message.= "http://geeks.thecompletewebhosting.com/online-notes/reserpassword.php?id=".urlencode($userid)."&key=$code";
        
        if(mail($email,'Reset Password',$message,'From:','onlinenotes@geeks.thecompletewebhosting.com'))
        echo "<div class='alert alert-success'>Please click on the activation link in your mail box  to change your password<button class='close' data-dismiss='modal'>&times;</button></div>";
        else echo "<div class='alert alert-danger'>Mail not sent :( <button class='close' data-dismiss='modal'>&times;</button></div>";
        }
        else {
            echo 'error:'.mysqli_error($link);
        }
    }
    elseif ($result && mysqli_num_rows($result) != 1)  {
        echo "<div class='alert alert-danger'>Email not registered, sign up instead<button class='close' data-dismiss='alert'>&times;</div>";
    }
    else {
        echo "<div class='alert alert-danger'>Error connecting in database, try again later!<button class='close' data-dismiss='alert'>&times;</div>";
    }
}


?>