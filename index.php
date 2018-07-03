<html>
    <head>
        <title>Online Notes</title>
        <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Arvo|Dancing+Script|Courgette|Cardo|Luckiest+|Ultra|Pacifico" rel="stylesheet">
    </head>
    <style>
    body {
        background:url(images/wall.jpg) no-repeat center center;
        background-attachment:fixed;
        background-size:cover;
    }
        html {
            position:relative;
            min-height:100%;
        }
        .navbar {
            border-radius:0;
        }
        .navbar-inverse {
            background:rgba(0,0,0,0.5);
            border-bottom:1px solid white ;
            padding:5px 10px;
        }
        #header:hover{
            color:white;
        }
        
        #header {
            text-decoration:none;
            font-weight:bolder;
            color:white;
            font-family:Cardo,sans-serif;
            font-size:30px;
        }
       #note {
           height:20px;
           width:20px;
       }
        .jumbotron {
            background:transparent;
            margin-top:100px;
            color:white;
            font-weight:bolder;
            font-size:70px;
            font-family:Ultra,sans-serif;
            letter-spacing:2px;
            padding:10px;
        }
        #p1 {
            font-weight:lighter;
            font-size:40px;
            font-family:Dancing Script;
        }
        #signup {
            background:rgba(6,150,29,0.5);
            border:0 ;
            padding:20px 30px;
            color:white;
            font-weight:bolder;
            border-radius:10px;
            margin-bottom:60px;
        }
        #signup:hover {
            background:rgb(6,150,30);
            color:white;
            font-weight:bolder;
            border:0; 
        }
        .navs {
            font-family:Pacifico,sans-serif;
            font-size:40px;
        }
            
        
        .footer {
            height:50px;
            width:100%;
            background:rgba(0,0,0,0.5);
            color:white;
            padding:20px 20px;
            position:absolute;
            bottom:0;
        }
        #signupmodal {
            background:rgb(6,150,29);
            color:white;
            font-weight:lighter;
           
            font-family:Pacifico;
        }
    </style>
    
    <body>
        <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid"> 
            <div class="navbar-header">
                <a id="header" href="#" class="navbar-brand">Online Notes</a>
                <button  type="button" class="navbar-toggle" data-target="#collapse" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="collapse">
                <ul class="nav navbar-nav navs">
                    <li><a  href="#" class="active">Home</a></li>
                    <li><a href="help" >Help</a></li>
                    <li><a href="contact">Contact Us</a></li>
                    
                </ul>
                <ul class="nav navbar-nav navbar-right navs">
                    <li><a class="" style="cursor:pointer"  data-target="#mymodal1" data-toggle="modal" >Login</a></li>
                    
                    
                </ul>
                
            </div>
            </div>
        </nav>
        <div class="container">
            <div class="jumbotron text-center">
                Online Notes App
                <p id="p1">Your notes , wherever you go!<br>
                Easy to use, protects all your notes.
                </p>
                <a  id="signup" class="btn btn-default btn-lg" data-target="#mymodal" data-toggle="modal">Sign up, It's free</a>
                
            </div>
            <!--sign up form-->
            
            <form method="post" id="signupform">
                <div class="modal" role="dialog" id="mymodal" aria-labelledby="mymodallabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dimiss="modal">&times;</button>
                                <h3 style="font-family:Pacifico">Sign up today and start using our notes app. </h3>
                            </div>
                            <div class="modal-body">
                                <div id="signupmsg"></div>
                                <div class="form-group">
                                    <input type="text" name="username" placeholder="Enter username" class="form-control">
                                    
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Enter email" class="form-control">
                                    
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" placeholder="Enter password" class="form-control">
                                    
                                </div>
                                <div class="form-group">
                                    <input type="password" name="confirm-password" placeholder="Enter password again" class="form-control">
                                    
                                </div>
                                
                            </div>
                            <div class="modal-footer">
                                <input type="submit" class="btn btn-primary" id="signupmodal" name="signup" value="Sign Up!" >
                                </button>
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                
                                
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    
                </div>
                
            </form>
            <!--login form-->
             <form method="post" id="loginform">
                <div class="modal" role="dialog" id="mymodal1" aria-labelledby="mymodallabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dimiss="modal">&times;</button>
                                <h2 style="font-family:Pacifico"> Login:</h2>
                            </div>
                            <div class="modal-body">
                                
                                <div class="form-group">
                                    <input type="email" name="loginemail" placeholder="Enter email" class="form-control">
                                    
                                </div>
                                <div class="form-group">
                                    <input type="password" name="loginpassword" placeholder="Enter password" class="form-control">
                                    
                                </div>
                                <div class="form-group">
                                    <input type="checkbox" name="RememberMe" id="rememberme"> Remember Me
                                     <a href="#" class="link pull-right" data-target="#mymodal2" data-toggle="modal" data-dismiss="modal">Forgot Password?</a>
                                </div>
                              
                              
                                
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default pull-left" data-target="#mymodal" data-dismiss="modal" data-toggle="modal">Register</button>
                                <button class="btn btn-primary" id="loginmodal" name="login" >Login
                                !</button>
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                
                                
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    
                </div>
                
            </form>
            <!--forgot password form-->
            <form method="post" id="forgotpass">
                <div class="modal" role="dialog" id="mymodal2" aria-labelledby="mymodallabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button class="close" data-dimiss="modal">&times;</button>
                                <h3 style="font-family:Pacifico"> Forgot Password? Enter your email address:</h3>
                            </div>
                            <div class="modal-body">
                                
                                <div class="form-group">
                                    <input type="email" name="forgotemail" placeholder="Enter email" class="form-control">
                                    
                                </div>
                                
                                
                              
                              
                                
                            </div>
                            <div class="modal-footer">
                                <button class="btn btn-default pull-left" data-target="#mymodal" data-dismiss="modal" data-toggle="modal">Register</button>
                                <button class="btn btn-primary" name="forgotpasssubmit">Submit</button>
                                <button class="btn btn-default" data-dismiss="modal">Cancel</button>
                                
                                
                            </div>
                            
                        </div>
                        
                        
                    </div>
                    
                </div>
                
            </form>

            
            
        
        </div>
        <div class="footer text-center">
            <p>Copyright &copy; 2015-<?php echo date("Y",time());  ?></span></p>
        </div>
        <script src="index.js"></script>
    </body>
</html>