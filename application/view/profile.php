<?php
require_once "application/view/html_head.php";
?>
<link rel="stylesheet" href="public/assets/css/navbar.css">
<link rel="stylesheet" href="public/assets/css/profile.css">

<?php
  require_once "application/view/navbar_section.php";
?>
<div class="edit-profile-section">
    <div class="container">
      <div class="edit-profile-row">
        <h2>Update Your details</h2>
        <form action="" method="post">
          <div class="input-image">
            <label for="profile" id="label-img"><i class="fa-solid fa-user"></i></label>
            <input type="file" name="profile" id="profile" accept="image/*">
          </div>
          <div class="input-text">
            <label for="name">User Name</label>
            <input type="text" name="name" id="name" placeholder="">
          </div>
          <button type="submit">SAVE</button>
          </form>
          <div class="input-text">
            <a href="resetpassword">Reset your password</a>
          </div>
       
      </div>
    </div>
  </div>

<?php
 require_once "application/view/html_tail.php";
?>