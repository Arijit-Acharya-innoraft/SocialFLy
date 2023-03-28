<?php
session_start();
if (!isset($_SESSION['U_name'])) {
  header("location:login");
}

require_once "application/controller/FetchProfile.php";
require_once "application/model/db_conn.php";

$getprofile = new ProfilePic;
$profile_photo = $getprofile->fetchProfilePic($con,$_SESSION["email"]);
$name = $_SESSION["U_name"];

require_once "application/view/html_head.php";

?>
<link rel="stylesheet" href="public/assets/css/navbar.css">
<link rel="stylesheet" href="public/assets/css/landingpage.css">
<link rel="stylesheet" href="public/assets/css/home.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<body onload="storeLocalFunction()" ;>
  <!-- header section -->

  <?php
  require_once "application/view/navbar_section.php";

  ?>
  <!-- landing-page -->
  <div class="cover" id="cover_page">
    <div class="landing-page">
      <div class="container">
        <div class="comp-name">
          <div class="logo-icon">
            <a href="http://test.com"><i class="fa-brands fa-twitter"></i>SocialFLy</a>
            <button id="close" onclick="removeFunction()" ;><i class="fa-solid fa-x"></i></button>
          </div>
          <div class="about">
            <h2>Hello <?php echo $name; ?>! Welcome to SocialFLy</h2>
            <p>
              SocialFLy is an online social media and social networking service owned by Indian company Arijit Platforms. Founded in 2023 by Arijit Acharya with fellow Innoraft College and mentors, its name comes from the task given during the mvc assignment often given to Innoraft interns. Membership is initially limited to Innorafters, gradually expanding to other universities. As of March 2023, SocialFLy claimed 2.93 billion monthly active users and ranked third worldwide among the most visited websites. It is the most downloaded mobile app of the 2023s.
            </p>
            <p>
              SocialFLy can be accessed from devices with Internet connectivity, such as personal computers, tablets and smartphones. After registering, users can create a profile revealing information about themselves. They can post text, photos and multimedia which are shared publicly. Users can also like and comment others photo as well.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>



<!-- profile-section -->
<div class="profile-section">
  <div class="input-section">
    <div class="input-row">
      <form action="homebackend" method="POST" enctype=multipart/form-data>
        <div class="upper-section">
          <ul class="inputs">
            <li>
              <label for="photo"> <i class="fa-solid fa-camera"></i></label>
              <input type="file" name="images" id="photo" accept="image/*">
            </li>
            <li>
              <label for="video"><i class="fa-solid fa-video"></i></label>
              <input type="file" name="video" id="photo" accept="video/*">
            </li>
            <li> 
              <label for="audio"><i class="fa-sharp fa-solid fa-headphones"></i></label>
              <input type="file" name="photo" id="audio" accept="audio/*">
            </li>
          </ul>
        </div>
        <div class="lower-section">
          <div class="profile-photo">
            <img src="<?php echo $profile_photo; ?>" alt="" srcset="">
          </div>
          <textarea name="textarea" id="textarea" cols="30" rows="10" placeholder="What's on your mind?"></textarea>
          <div class="post-button">
            <button type="submit">
              <i class="fa-solid fa-share-from-square"></i>
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>



  <div class="post-section">
  </div>
  <div class="load-more">
    <button class="button"><i class="fa-solid fa-rotate-right"></i></button>
  </div>
</div>
<script src="public/assets/js/landing.js"></script>
<script src="public/assets/js/home.js"></script>
<script src="public/assets/js/ajax.js"></script>
<?php
require_once "application/view/html_tail.php";

?>
