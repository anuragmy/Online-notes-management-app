<?php


include "connection.php";
if((empty($_POST['newpass']) || empty($_POST['newconfpass']) )) {
     echo "<div class='alert alert-danger'>Enter valid etails<button class='close' data-dismiss='alert'>&times;</button></div>";exit;
}
    //errors
    $missing = '<p><strong>Please provide a password graeter than 6 with atlest 1 capital letter and one digit</strong></p>';
    
    
    $newpass = $_POST['newpass'];
    $newconfpass = $_POST['newconfpass'];
    
    if($newpass != $newconfpass ) {
         echo "<div class='alert alert-danger'>Passwords do not match<button class='close' data-dismiss='alert'>&times;</button></div>";exit;
    }
    elseif ($newpass == $newconfpass) {
        if((!(strlen($newpass) > 6 and preg_match('/[A-Z]/',$newpass) and preg_match('/[0-9]/',$newpass)))) {
                 echo "<div class='alert alert-danger'>".$missing."<button class='close' data-dismiss='alert'>&times;</button></div>";exit;   
        }
    
        
        $getkey = $_GET['key'];
        
        $sql3 = "select * from forgotpassword where status = 'pending' and authkey = '$getkey'";
        if(mysqli_query($link,$sql3)) {
            
        
        $row = mysqli_fetch_array(mysqli_query($link,$sql3,MYSQLI_ASSOC));
        echo $row['status'];
        $newpass = hash("sha256",$newpass);
        $sql1 = "update forgotpassword set status = 'done' and authkey='00'";
        $result1 = mysqli_query($link,$sql1);
        echo $result1;
        $sql = "update users set password = '$newpass' ";
        $result = mysqli_query($link,$sql);
        echo $result;
        if($result && $result1) {
            echo "<div class='alert alert-success'>Password Updated".$row['status']."<button class='close' data-dismiss='alert'>&times;</button></div>";
            
        }
        else {
           echo "<div class='alert alert-danger'>Error, Please try again later<button class='close' data-dismiss='alert'>&times;</button></div>";exit;
        }
    }
}
else {
     echo "<div class='alert alert-danger'>Error, Please try again later<button class='close' data-dismiss='alert'>&times;</button></div>";exit;
}
    
    


?>