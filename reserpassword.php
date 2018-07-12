<html>
    <head>
        <title>Reset Password</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Arvo|Dancing+Script|Courgette|Cardo|Ultra|Pacifico" rel="stylesheet">
        <style>
            
           body {
               background:url(images/wall.jpg) center center no-repeat;
               background-attachment:fixed;
               background-size:cover;
           }
           .container-fluid {
               margin-top:100px;
               background:rgba(0,0,0,0.5);
               color:white;
               font-family:Cardo,sans-serif;
               font-size:40px;
               border-top:1px solid white;
               border-bottom:1px solid white;
               padding:20px 20px;
           }
           .btn-success {
               font-family:Dancing Script;
               padding:5px 10px;
               font-size:35px;
               
           }
           .sd {
               width:400px;
           } 
           
           
        </style>
    </head>
    <body>
        <div class="container-fluid">
        
                <h1> Reset Password </h1>
                <div id='resetpassmsg' style='color:white'></div>
                
<p>
<?php

session_start();

include_once("connection.php");

if(!isset($_GET['id']) && !isset($_GET['key'])){
echo "<div class='alert alert-danger'>Error</div>";exit;
}
$userid = $_GET['id'];
$key = $_GET['key'];


$time  = time() - 600;

$userid = mysqli_real_escape_string($link,$userid);
$key = mysqli_real_escape_string($link,$key);


//checking if query is successful

    

$sql = "select * from forgotpassword where user_id = '$userid' and authkey = '$key' and time > '$time'  and status = 'pending' limit 1";
$result = mysqli_query($link,$sql);
if($result) {
    if(mysqli_affected_rows($link)==1) {
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
         echo "
         
         <form method='post' id='passwordreset'>
        
         
         <div class='form-group sd'>
         <input type='password' class='form-control' placeholder='Enter new password' name='newpass'>
         </div>
         
         <div class='form-group sd'>
         
         <input type='password' class='form-control' placeholder='Enter new password again' name='newconfpass'>
         </div>
         
        
         <input type='submit' name='submit' value='submit' class='btn btn-success btn-lg'>
         
         </form>
         ";
    }
    else  {
        echo "<div class='alert alert-danger'>Oops! Something went wrong,Please try again later<button class='close' data-dismiss='alert'>&times;</button></div>";exit;
}

}
else  {
    echo "<div class='alert alert-danger'>Oops! Something went wrong,Please try again later<button class='close' data-dismiss='alert'>&times;</button></div>";exit;
}






?>
                
            
            
            
       
        


</p>
</div>
<script src="index.js"></script>
</body>
</html>