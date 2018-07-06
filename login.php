<?php

session_start();
include_once("connection.php");

//errors

if(empty($_POST['loginusername']) || empty($_POST['loginpassword'])) {
    echo "<div class='alert alert-danger'>Invalid username or password<button class='close' data-dismiss='alert'>&times;</div>";
}
else if(!empty($_POST['loginusername']) && !empty($_POST['loginpassword'])) {
    
    
    $name = $_POST['loginusername'];
    $password = $_POST['loginpassword'];
    
    $name = mysqli_real_escape_string($link,$name);
    $password = mysqli_real_escape_string($link,$password);
    $password = hash("sha256",$password);
    
    
    
    //checking in database for login details
    $sql = "select * from users where username='$name'and password='$password' and activation='activated'";
    $result = mysqli_query($link,$sql);
    
    
   if($result) {
       if(mysqli_num_rows($result)==1) {
           if(empty($_POST['RememberMe'])) {
              echo 'success'; 
           }
           else  {
               
           $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
           $_SESSION['user_id'] = $row['user_id'];
           $_SESSION['username'] = $row['username'];
           $_SESSION['email'] = $row['email'];
           $_SESSION['password'] = $row['password'];
           
          $auth1 = bin2hex(openssl_random_pseudo_bytes(10));
          $auth2 = (openssl_random_pseudo_bytes(20));
          
          
          
          function f1($a,$b) {
              $c = $a.",".bin2hex($b);
              return $c;
          }
          
          function f2($a) {
              $b = hash("sha256",$a);
              return $b;
          }
          
          
         $cookie = f1($auth1,$auth2);
         $auth2 = f2($auth2);
         setcookie(
             "RememberMe",
             $cookie,
             time() + 12900
             );
         
         $user_id = $_SESSION['user_id'];
         $expiry = date("Y-m-d h:i:s",time() + 12900);
         
         //generating query
         
         $sql = "insert into rememberme (user_id,authenticator1,authenticator2,expires) values ('$user_id','$auth1','$auth2','$expiry') ";
         
         $result = mysqli_query($link,$sql);
         if(!$result) {
            echo "<div class='alert alert-danger'>Error Storing data in Remember Me<button class='close' data-dismiss='alert'>&times;</div>";
            
            
            
         }
         else {
             echo 'success';
         }
          
               
    }
           
      
    }
        else {
            echo "<div class='alert alert-danger'>user not registered sign up instead'<button class='close' data-dismiss='alert'>&times;</button></div>";
        }
   }
   
 
       else {
           echo "<div class='alert alert-danger'>Not registered, Please sign up!<button class='close' data-dismiss='alert'>&times;</div>";
       }
}

       
       
           
   
   
    
    


?>