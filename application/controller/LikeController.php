<?php
// Loading all the dependencies.
require_once "application/model/db_conn.php";
require_once "application/model/DateGenerator.php";
require_once "application/model/Utilities.php";

// Storing the details got from Ajax.
$user_id = $_POST["User_Id"];
// echo $user_id;
$like_id = $_POST["Like_Id"];
// echo $like_id;
// Creation of a object of the DateGenerator class and calling its method.
//The method stores the time in which the user has liked the post.
$generator = new DateGenerator ;
$create_time = $generator->createDate();

// Creating an object of the class Utilities.
$Utility = new Utilities;
// Calling a method likCheck of utilities class.
// It checks if the logged in user has hit a like on that post earlier or not. 
$like = $Utility->likeCheck($con,$user_id,$like_id);
if($like == 0){
  // If the no of like by that user on that post is 0 then onclick the like details is stored. 
  $Utility->likeStore ($con,$user_id,$create_time,$like_id);
}
else{
  // If the no of like by that user on that post is 1 then onclick the like details is removed. 
  $Utility->likeDelete ($con,$user_id,$like_id);
}
// call count_like function.
$like_no = $Utility->countLikes($con,$like_id);
echo $like_no;

?>