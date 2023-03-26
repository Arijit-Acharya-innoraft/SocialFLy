// It checks if an email is entered and is of proper format or not
function validateEmail() {
  var inpEmail = document.getElementById("email").value;
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (inpEmail.length > 1) {
    if (validRegex.test(inpEmail)) {
      document.getElementById("error").innerHTML = "";
      document.getElementById("btn").disabled = false;
      document.getElementById("email").style.borderBottomColor = "initial";
    }
    else {
      document.getElementById("error").innerHTML = "*Wrong email format.";
      document.getElementById("btn").disabled = true;
      document.getElementById("email").style.borderBottomColor = "crimson";
    }
  }
  else {
    document.getElementById("error").innerHTML = "*Enter your email id.";
    document.getElementById("btn").disabled = true;
    document.getElementById("btn").style.borderBottomColor = "crimson";
  }
}

// It checks if the password is entered by the user or not.
function validatePassword() {
  var inpPass = document.getElementById("password").value;
  if(inpPass.length < 1){
    document.getElementById("error").innerHTML = "*Enter your Password.";
    document.getElementById("btn").disabled = true;
    document.getElementById("btn").style.borderBottomColor = "crimson";
  }
}

//These two functions are used for showing the password and hidding it.

// This function shows the password entered on mouse hover.
function showFunction(){
  var password = document.getElementById("password");
    password.type = "text";
} 
// This function hides the password on mouse out.
function hideFunction(){
  var password = document.getElementById("password");
  password.type = "password";
}
