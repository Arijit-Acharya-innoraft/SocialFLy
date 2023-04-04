<!-- Addition of the ajax script for the like part. -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<?php

// Checking session, if not start, we are starting it.
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
// Requiring the dependencies. 
require_once "application/controller/Home.php";
require "application/model/db_conn.php";

// Creating object for the ShowPosts class.
// $sp = new ShowPosts;
$store = $sp->fetchDatabase($con, $_POST["limit"], $_POST["sort"]);

// Running loop for displaying the posts. 
foreach ($store as $st) {
  $like = $sp->like($con, $st["post_id"], "like-" . $st["post_id"], $_SESSION["email"]);
  $comment =$sp->comment($con,$st["post_id"],"#Comment-".$st["post_id"],$_SESSION["email"]);
  $like_count = $like[0];
  $thumbs_up = $like[1];

  $comment_count = $comment[0];
  $comment_icon = $comment[1];
?>
  <div class="User-id" id="<?php echo $_SESSION["email"]; ?>"></div>
  <div class="post" id="<?php echo $st["email"]; ?>">
    <div class="user-details">
      <div class="user-cols image-col">
        <div class="user-row">
          <?php
          if (strlen($st["p_photo"]) < 22) {
            $st["p_photo"] = "public/assets/images/profile-icon-design-free-vector.webp";
          } ?>
          <img src="<?php echo $st['p_photo']; ?>" alt="profile_photo">
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
      <div class="like" id="like-<?php echo $st["post_id"]; ?>">
        <span id="like-it">
          <?php
          if ($thumbs_up == 1) {
            echo "<i class = 'fa-solid fa-thumbs-up'></i>";
          } elseif ($thumbs_up == 0) {
            echo "<i class = 'fa-regular fa-thumbs-up' ></i>";
          } else {
            echo "";
          }
          ?>
        </span>

        <span id="like-count"><?php echo $like_count ?>
        </span>
      </div>
      <div class="comment" id="commentIcon-<?php echo $st["post_id"];?>">
        <span class="comment-it">
        <?php
          if ($comment_icon >0) {
            echo "<i class = 'fa-solid fa-comments'></i>";
          }
           else{
            echo "<i class = 'fa-regular fa-comments' ></i>";
          } 
          ?>
        </span>
        <span id= "comment-count-<?php echo $st["post_id"];?>"> <?php echo $comment_count;?></span>
      </div>
      <div class="share">
        <i class="fa-solid fa-reply"></i>
      </div>
    </div>
    <div class="write-comment" id="<?php echo $st["post_id"]; ?>">
      <textarea name="writeComment" class="writeComment" cols="30" rows="10" placeholder="Comment Here"></textarea>
      <button type="submit"><i class="fa-solid fa-share-from-square"></i></button>
    </div>
    <div class="show-comment" id="Comment-<?php echo $st["post_id"]; ?>">
          <div class="comments">

          </div>
    </div>
  </div>
<?php
}

?>
<!-- Calling the ajax for like post -->
<script src="public/assets/js/like.js"></script>
<script src="public/assets/js/comment.js"></script>