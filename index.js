//ajax call to signup.php

$("#signupform").submit(function(event){
    //prevent default processing of php
    
    event.preventDefault();
    //collect user input
    
    var datatopost = $(this).serializeArray();
    //send to signup.php using ajax
    
    $.ajax({
       url:"signup.php",
       type:"POST",
       data:datatopost,
       success: function(data) {
           if(data) {
               $("#signupmsg").html(data);
           }
       },
       error: function() {
           $("#signupmsg").html("<div class='alert alert-danger'>Problem in ajax call <button class='close' data-dismiss='alert'>&times;</div>");
       }
    });
    
});

//ajax call tologin.php

$("#loginform").submit(function(event){
    //prevent default processing of php
    event.preventDefault();
    
    //collect user input
    var datatopost = $(this).serializeArray();
    //send to signup.php using ajax
    
    $.ajax({
       url:"login.php",
       type:"POST",
       data:datatopost,
       success: function(data) {
           if(data == "success") {
               window.location="loggedpage.php";
           }
           else {
               $("#loginmsg").html(data);
           }
       },
       error: function() {
           $("#loginmsg").html("<div class='alert alert-danger'>Problem in ajax call <button class='close' data-dismiss='alert'>&times;</div>");
       }
    });
    
});

//ajax call to forgot password
$("#forgotpass").submit(function(event){
    //prevent default processing of php
    event.preventDefault();
    
    //collect user input
    var datatopost = $(this).serializeArray();
    //send to signup.php using ajax
    
    $.ajax({
       url:"forgot_password.php",
       type:"POST",
       data:datatopost,
       success: function(data) {
           if(data == "success") {
               window.location="reserpassword.php";
           }
           else {
               $("#forgotpassmsg").html(data);
           }
       },
       error: function() {
           $("#forgotpassmsg").html("<div class='alert alert-danger'>Problem in ajax call <button class='close' data-dismiss='alert'>&times;</div>");
       }
    });
    
});


//ajax call to reste password
$("#passwordreset").submit(function(event){
    //prevent default processing of php
    event.preventDefault();
    
    //collect user input
    var datatopost = $(this).serializeArray();
    //send to signup.php using ajax
    
    $.ajax({
       url:"storeresetpassword.php",
       type:"POST",
       data:datatopost,
       success: function(data) {
            $("#resetpassmsg").html(data);
       },
       error: function() {
           $("#resetpassmsg").html("<div class='alert alert-danger'>Problem in ajax call <button class='close' data-dismiss='alert'>&times;</div>");
       }
    });
    
});

