// Function to validate the user name.
function validateUser() {
  var inpUser= document.getElementById("name").value;
  inpUser =inpUser.trim();
  if(inpUser.length<1){
    document.getElementById("error").innerHTML = "*No user name.";
    document.getElementById("btn").disabled = true;
    document.getElementById("name").style.borderColor = "crimson";
  }
  else{
    var reg = /^[A-Za-z\s]*$/;
    if (reg.test(inpUser)) {
      document.getElementById("error").innerHTML = "";
      document.getElementById("btn").disabled = false;
      document.getElementById("name").style.borderColor = initial;
    }
    else {
      document.getElementById("error").innerHTML = "*Nmae must contain only letter and spaces.";
      document.getElementById("btn").disabled = true;
      document.getElementById("name").style.borderColor = "crimson";
    }
  }
}

// It checks if an email is entered and is of proper format or not
function validateEmail() {
  var inpEmail = document.getElementById("email").value;
  var validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
  if (inpEmail.length > 1) {
    if (validRegex.test(inpEmail)) {
      document.getElementById("error").innerHTML = "";
      document.getElementById("btn").disabled = false;
      document.getElementById("email").style.borderColor = initial;
    }
    else {
      document.getElementById("error").innerHTML = "*Wrong email format.";
      document.getElementById("btn").disabled = true;
      document.getElementById("email").style.borderColor = "crimson";
    }
  }
  else {
    document.getElementById("error").innerHTML = "*Enter your email id.";
    document.getElementById("btn").disabled = true;
    document.getElementById("email").style.borderColor = "crimson";
  }
}



// This function is created for checking the strength of the password.
function validatePassword() {
  var password =document.getElementById("password").value;


  if( password.length < 8 ) {
    document.getElementById("error").innerHTML = "*Password too short.";
    document.getElementById("btn").disabled = true;
    document.getElementById("password").style.borderColor = "crimson";
  }
    
  else if( password.length > 20 ) {
    document.getElementById("error").innerHTML = "*Password too long.";
    document.getElementById("btn").disabled = true;
    document.getElementById("password").style.borderColor = "crimson";
  }

  else{
    if( /#[0-9]+#/.test(password) == false ) {
    document.getElementById("error").innerHTML = "*Password must include at least one number!";
    document.getElementById("btn").disabled = true;
    document.getElementById("password").style.borderColor = "crimson";
    }

    if( /#[a-z]+#/.test(password) == false ) {
      document.getElementById("error").innerHTML = "*Password must include at least one lower case letter!";
      document.getElementById("btn").disabled = true;
      document.getElementById("password").style.borderColor = "crimson";
    }

    if( /#[A-Z]+#/.test(password) == false ) {
      document.getElementById("error").innerHTML = "*Password must include at least one CAPS!";
      document.getElementById("btn").disabled = true;
      document.getElementById("password").style.borderColor = "crimson";
    }

    if( /#\W+#/.test(password) == false ) {
      document.getElementById("error").innerHTML = "*Password must include at least one symbol!";
      document.getElementById("btn").disabled = true;
      document.getElementById("password").style.borderColor = "crimson";
    }
  }
}