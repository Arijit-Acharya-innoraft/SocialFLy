
// This function shows the password entered on mouse hover.
function showFunction1(){
  var password = document.getElementById("password");
  password.type = "text";
} 
// This function shows the password entered on mouse hover.
function showFunction2(){
  var c_pas = document.getElementById("confirm_password");
  c_pas.type="text";
} 
// This function hides the password on mouse out.
function hideFunction1(){
  var password = document.getElementById("password");
  password.type = "password";
}
// This function hides the password on mouse out.
function hideFunction2(){
  var c_pas = document.getElementById("confirm_password");
  c_pas.type="password";
}

// This function is created for checking the strength of the password.
function validatePassword() {
  var password =document.getElementById("password").value;
  var confirm_password = document.getElementById("confirm_password").value;

  if( password.length < 8 ||confirm_password.length < 8 ) {
    document.getElementById("error").innerHTML = "*Password too short.";
    document.getElementById("btn").disabled = true;
    document.getElementById("btn").style.opacity = 0.6;
  }
      
  else if( password.length > 20||confirm_password.length > 20 ) {
    document.getElementById("error").innerHTML = "*Password too long.";
    document.getElementById("btn").disabled = true;
    document.getElementById("btn").style.opacity = 0.6;
  }
  
  else{
    if( /#[0-9]+#/.test(password) == false ||/#[0-9]+#/.test(confirm_password) == false ) {
      document.getElementById("error").innerHTML = "*Password must include at least one number!";
      document.getElementById("btn").disabled = true;
      document.getElementById("btn").style.opacity = 0.6;
    }
  
    if( /#[a-z]+#/.test(password) == false||/#[a-z]+#/.test(confirm_password) == false ) {
      document.getElementById("error").innerHTML = "*Password must include at least one lower case letter!";
      document.getElementById("btn").disabled = true;
      document.getElementById("btn").style.opacity = 0.6;
    }
  
    if( /#[A-Z]+#/.test(password) == false||/#[A-Z]+#/.test(confirm_password) == false ) {
      document.getElementById("error").innerHTML = "*Password must include at least one CAPS!";
      document.getElementById("btn").disabled = true;
      document.getElementById("btn").style.opacity = 0.6;
    }
  
    if( /#\W+#/.test(password) == false||/#\W+#/.test(confirm_password) == false ) {
      document.getElementById("error").innerHTML = "*Password must include at least one symbol!";
      document.getElementById("btn").disabled = true;
      document.getElementById("btn").style.opacity = 0.6;
    }
  
  }
}