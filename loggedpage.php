<html>
    <head>
        <title>My Notes</title>
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
        }
        #header:hover{
            color:white;
        }
        #note {
            height:20px;
            width:20px;
        }
        #allnotes,#done {
            display:none;
        }
        
        #header {
            text-decoration:none;
            font-weight:bolder;
            color:white;
            font-family:Cardo,sans-serif;
            font-size:30px;
        }
       #note {
           height:2px;
           width:2px;
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
        
            
        
        .footer {
            height:50px;
            width:100%;
            background:rgba(0,0,0,0.5);
            color:white;
            padding:20px 20px;
            position:absolute;
            bottom:0;
        }
        .container {
            margin-top:150px;
        }
        #signupmodal {
            background:rgb(6,150,29);
            color:white;
            font-weight:lighter;
           
            font-family:Pacifico;
        }
        #notepad {
            color:black;
            font-family:Cardo;
            background:url(images/notepad.jpeg) no-repeat center center;
            background-size:cover;
            margin-top:20px;
            display:none;
        }
        textarea {
            width:100%;
            max-width:100%;
            font-size:25px;
            font-family:Dancing Script;
            color:rgb(26,61,92);
            border-left-width:20px;
            padding:10px;
            border-color:rgb(26,61,92);
            background:transparent;
        }
        
    </style>
    
    <body>
        <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid"> 
            <div class="navbar-header">
                <a id="header" href="#" class="navbar-brand"><img src="note.png" id="note"></a>
                <button  type="button" class="navbar-toggle" data-target="#collapse" data-toggle="collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="collapse">
                <ul class="nav navbar-nav">
                    <li><a href="#">Profile</a></li>
                    <li><a href="help">Help</a></li>
                    <li><a href="contact">Contact Us</a></li>
                    <li><a href="mynotes" class="active">My Notes</a></li>
                    
                    
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a style="cursor:pointer">Logged In</a></li>
                    <li><a class="link"href="index.php" style="cursor:pointer">Logout</a></li>
                    
                    
                </ul>
                
            </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="buttons">
                    <button name="addnote" type="button" class="btn btn-primary btn-lg" id=addnote>Add Note</button>
                    <button name="done" type="button" class="btn btn-success btn-lg pull-right" id="done">Done</button>
                    <button name="allnotes" type="button" class="btn btn-primary btn-lg" id="allnotes">All Notes</button>
                    <button name="editnote" type="button" class="btn btn-primary btn-lg pull-right" id="editnote" >Edit</button>
                    </div>
                    <div id="notepad">
                        <textarea  rows=10 class=""></textarea>
                    </div>
                </div>
                
            </div>
            
        </div>
       
                        
        
                
                
           
           

            
            
        
        
        <div class="footer text-center">
            <p>Copyright &copy; 2015-<?php echo date("Y",time());  ?></span></p>
        </div>
        <script>
           
            
        </script>
    </body>
</html>