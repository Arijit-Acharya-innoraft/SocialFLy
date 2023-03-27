<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
require_once "application/controller/Home.php";
require "application/model/db_conn.php";
$sp = new ShowPosts;
$store = $sp->fetchDatabase($con, $_POST["limit"],$_POST["sort"]);

foreach ($store as $st) { ?>
  <div class="post" id="like-<?php echo $st["post_id"]; ?>">
    <div class="user-details">
      <div class="user-cols image-col">
        <div class="user-row">
          <img src="<?php echo $st['p_photo']; ?>" alt="profile_photo" srcset="">
        </div>
        <?php
        ?>
      </div>
      <div class="user-cols text-col">
        <div class="user-row">
          <h5><?php echo $st['u_name'] ?></h5>
          <span><i class="fa-solid fa-calendar-days"></i><?php echo $st['create_time']; ?></span>
        </div>
      </div>
    </div>
    <div class="post-details">
      <div class="text-section">
        <p><?php echo $st['posted_text'] ?></p>
      </div>
      <?php if (strlen($st["posted_image"]) > 21) { ?>
        <div class="image-section">
          <img src="<?php echo $st['posted_image']; ?>">
        </div>
      <?php } ?>
    </div>
    <div class="reaction">
      <div class="like">
        <i id="like-it" class="fa-regular fa-thumbs-up"></i><span>25</span>
      </div>
      <div class="comment">
        <i class="fa-regular fa-comments"></i><span>1</span>
      </div>
      <div class="share">
        <i class="fa-solid fa-reply"></i>
      </div>
    </div>
  </div>
<?php
}
?>