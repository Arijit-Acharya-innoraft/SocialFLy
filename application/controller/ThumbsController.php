<?php
require_once "application/model/check_like.php";
require_once "application/model/db_conn.php";
$like_count = new LikeCount;
$check = $like_count->userLiked($con,$_POST["User_Id"],$_POST["Like_Id"]);
if($check == 1){
  echo "<i class= 'fa-solid fa-thumbs-up'></i>";
}
elseif ($check == 0){
  echo "<i class= 'fa-regular fa-thumbs-up'></i>";
}
else{
  echo "";
}

?>
