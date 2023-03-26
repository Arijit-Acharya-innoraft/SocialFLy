<!-- Form section. -->
<div class="form-section">
    <div class="container">
      <div class="form-row">
        <i class="fa-sharp fa-solid fa-shield-halved"></i>
        <h4>Authenticate Your Account</h4>
        <p>Please confirm your acount by entering the OTP sent to your registered email.Your security is our top priority.</p>
        
        <form action="otpgetting" method="post">
          <div class="opt_holder">
            <div class="cols">
              <div class="inp">
                <input type="text" name="otp1" id="otp1" maxlength="1" autocomplete="off" maxlength="1"  oninput="this.value=this.value.replace(/[^0-9]/g,'');"onkeyup="movetoNext(this, 'otp2')"; >
              </div>
            </div>
            <div class="cols">
              <div class="inp">
                <input type="text" name = "otp2" id="otp2" maxlength="1" autocomplete="off" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');"onkeyup="movetoNext(this, 'otp3')";>
              </div>
            </div>
            <div class="cols">
              <div class="inp">
                <input type="text" name = "otp3" id="otp3" maxlength="1" autocomplete="off" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');"onkeyup="movetoNext(this, 'otp4')";>
              </div>
            </div>
            <div class="cols">
              <div class="inp">
                <input type="text" name = "otp4" id="otp4" maxlength="1" autocomplete="off" maxlength="1" oninput="this.value=this.value.replace(/[^0-9]/g,'');">
              </div>
            </div>
          </div>
          <div class="submit-button">
            <button type="submit" id="btn">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </form>