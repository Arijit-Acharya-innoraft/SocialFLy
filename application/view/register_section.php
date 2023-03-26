<div class="register-section">
  <div class="container">
    <div class='register-row'>
      <div class='window'>
        <div class='overlay'></div>
        <div class='content'>
          <div class='welcome'>Hello There!</div>
          <div class='subtitle'>We're almost done. Before using our services you need to create an account.</div>
          <form action="registerbackend" class='input-fields' method="post">
            <input type='text' placeholder='Username' class='input-line full-width' name="name" id="name" autocomplete="off" onkeyup="validateUser()"; required></input>
            <input type='email' placeholder='Email' class='input-line full-width' name="email" id="email" autocomplete="off" onblur="validateEmail()" required></input>
            <input type='password' name="password" id="password" placeholder='Password' class='input-line full-width' autocomplete="off" onblur="validatePassword()" required></input>
            <button type="submit" id='btn' class='ghost-round full-width'>Create Account</button>
          </form>
          <div class='spacing'>or continue with <a href="" class="linkedin-tag"><span class='highlight'>LinkedIn</span></a></div>
          <div class="back">
            <a href="login">
              <i class="fa-solid fa-arrow-left fa-flip-vertical" style="color: #fffafe;"></i>
              <span>To Login</span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>