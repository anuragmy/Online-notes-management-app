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