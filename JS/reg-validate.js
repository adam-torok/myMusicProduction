function checkEmail() {
  var email = $("#email").val();
  var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
   if(emailReg.test(email) && email.length != 0){
     $("#emailErrorMessage").fadeOut(1000);
   }
   else{
     $("#emailErrorMessage").fadeIn(1000);
   }
}
function checkUsername(){
  if($("#username").val().length == 0){
    $("#userErrorMessage").fadeOut(1000);
    $("#userErrorMessage2").fadeOut(1000);
  }
  if($("#username").val().length < 10 && $("#username").val().length != 0){
    $("#userErrorMessage").fadeIn(1000);
  }
  else{
    $("#userErrorMessage").fadeOut(1000);
  }
  if($("#username").val().length > 20){
    $("#userErrorMessage2").fadeIn(1000);
  }
  else{
    $("#userErrorMessage2").fadeOut(1000);
  }
}
function checkPassword(){
    if($("#password").val().length == 0){
      $("#pwdErrorMessage").fadeOut(1000);
      $("#pwdErrorMessage2").fadeOut(1000);
    }
    if($("#password").val().length < 10 && $("#password").val().length != 0){
      $("#pwdErrorMessage").fadeIn(1000);
    }
    else{
      $("#pwdErrorMessage").fadeOut(1000);
    }
    if($("#password").val().length > 20){
      $("#pwdErrorMessage2").fadeIn(1000);
    }
    else{
      $("#pwdErrorMessage2").fadeOut(1000);
    }
}
