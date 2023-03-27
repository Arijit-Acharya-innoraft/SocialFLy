<!-- Form section. -->
<div class="form-section">
    <div class="container">
      <div class="form-row">
        <i class="fa-solid fa-lock"></i>
        <h4>Forgot Password?</h4>
        <p>You can reset here. First enter your email.</p>
        <form action="forgotbackend" method="post">
          <div class="inp">
            <i class="fa-solid fa-envelope"></i>
            <input type="email" name="email" class="inp_style" placeholder="Your Email" id="email" required autocomplete="off" onblur="validateEmail()";>
          </div>
          <span id="email_error"></span>
          <div class="submit-button">
            <button type="submit" id="btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  