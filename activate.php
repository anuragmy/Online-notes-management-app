<html>
    <head>
        <title>Activation</title>
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
            
           
        </style>
    </head>
    <body>
        <div class="container-fluid">
        
                <p>
<?php

session_start();

include_once("connection.php");

if(!isset($_GET['email']) && !isset($_GET['key'])){
echo "<div class='alert alert-danger'>Error</div>";exit;
}
$email = $_GET['email'];
$key = $_GET['key'];

//checking if query is successful

    

$sql = "update users set activation='activated' where activation = '$key' limit 1";
$result = mysqli_query($link,$sql);
if($result) {
    if(mysqli_affected_rows($link)==1) {
        echo "Your account has been activated".'<br><br>';
        echo "<a href='index.php' class='btn btn-success btn-lg'>Login</a>";
    }
}
else  {
    echo "Oops! Something went wrong,Please try again later";
}






?>
                
            
            
            
       
        


</p>
</div>
</body>
</html>