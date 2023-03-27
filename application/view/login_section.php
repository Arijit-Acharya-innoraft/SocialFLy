<!-- login section -->
<div class="login-section">
    <div class="container">
      <div class="login-row">
        <div class="screen">
          <div class="screen__content">
            <form action="LoginController" class="login" method="post">
              <div class="login__field">
                <i class="login__icon fas fa-user"></i>
                <input type="email" class="login__input" name="email" id="email" placeholder=" Email" autocomplete="off"
                  required onblur="validateEmail()">
              </div>
              <div class="login__field">
                <i class="login__icon fas fa-lock"></i>
                <input type="password" class="login__input" name="password" id="password" placeholder="Password"
                  autocomplete="off" onblur="validatePassword()" required>
                  <i class="fa-solid fa-eye" id="eye" onmouseenter ="showFunction()"; onmouseout="hideFunction()";></i> 
              </div>
              <button class="button login__submit" id="btn">
                <span class="button__text">Log In Now</span>
                <i class="button__icon fas fa-chevron-right"></i>
              </button>
            </form>
            <div class="below-section">
              <div class="fps">
                <a href="forgotpassword">Forgot Password?</a>
                <a href="register">Sign Up </a>
              </div>
              <div class="social-login">
                <h3>log in via</h3>
                <div class="social-icons">
                  <a href="ssologin" class="social-login__icon fab fa-linkedin"></a>
                </div>
              </div>
            </div>


          </div>
          <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
          </div>
        </div>
      </div>
    </div>
  </div>

