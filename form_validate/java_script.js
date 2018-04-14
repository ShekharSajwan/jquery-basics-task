 $(function(){
  $(".user_name_error").hide();
  $(".user_email_error").hide();
  $(".user_password_error").hide();
  $(".confirm_password_error").hide();

 
 var userNameErr=false;
 var userEmailErr=false;
 var userPasswordErr=false;
 var userCPasswordErr=false;

$("#user_name").blur(function() {
  checkUserName();
});

$("#user_email").blur(function() {
  checkUserEmail();
});

$("#user_password").blur(function() {
  checkUserPass();
});

$("#confirm_password").blur(function() {
  checkUserCPass();
});



 function checkUserName ()
 {
  var user_name_value=$("#user_name").val().length;
  if(user_name_value <2 || user_name_value > 8)
  {
    $(".user_name_error").show();
    userNameErr=true;
  }
  else
  {
    $(".user_name_error").hide();
  }
 }



 function checkUserEmail ()
 {
   var user_email_value=$("#user_email").val();
   var pattern_check_email=new RegExp(/^[a-z]+\.[a-zA-Z0-9]+@(webreinvent\.com)$/);
   if(pattern_check_email.test(user_email_value))
   {
    $(".user_email_error").hide();
 
   }
   else
   {
    $(".user_email_error").show();
    userEmailErr= true;
   }
 }


    
   function checkUserPass()
 {
  var user_pass_value=$("#user_password").val().length;

  if(user_pass_value < 8)
  {
    $(".user_password_error").show();
    userPasswordErr= true;
  }
  else
  {
    $(".user_password_error").hide();
  }
 }



 function  checkUserCPass()
 {
  var user_pass_value=$("#user_password").val();
  var user_cPass_value=$("#confirm_password").val();

  if(user_pass_value != user_cPass_value)
  {
    $(".confirm_password_error").show();
    userCPasswordErr= true;
  }
  else
  {
    $(".confirm_password_error").hide();
  }
 }

 $("#reg_form").submit(function() 
 {
 var userNameErr=false;
 var userEmailErr=false;
 var userPasswordErr=false;
 var userCPasswordErr=false;

checkUserName();
checkUserEmail();
checkUserPass();
checkUserCPass();

  if(userNameErr==false && 
    userEmailErr==false && 
    userPasswordErr==false && 
    userCPasswordErr==false)
  {

    return true;
  }
  else
  {

    return false;

  }
 });

 });