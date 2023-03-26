
<!-- Form Section. -->
<div class="form-section">
  <div class="container">
    <div class="form-row">
      <h4>Change Password</h4>
      <form action="resetbackend" method="post">
        <div class="inp">
        <i class="fa-solid fa-key"></i>
        <input type="password" name="password" id="password" placeholder="Enter your new password." required onblur="validatePassword()";>
        <i class="fa-solid fa-eye" id="eye" onmouseenter ="showFunction1()"; onmouseout="hideFunction1()";></i> 
        </div>
        <div class="inp">
        <i class="fa-solid fa-key"></i>
        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your new password."required onblur="validatePassword()";>
        <i class="fa-solid fa-eye" id="eye" onmouseenter ="showFunction2()"; onmouseout="hideFunction2()";></i> 
        </div>
        <div class="submit-button">
          <button type="submit" id="btn">Change</button>
        </div>
      </form>
    </div>
  </div>
</div>
