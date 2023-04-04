$(document).ready(function() {
  $(".write-comment button").on('click',comment);
  function comment() {
    var commentId = $(this).parent().attr("id");
    var commentLocation = "#".concat(commentId," .writeComment");
    var comment = $(commentLocation).val();

    if(comment.length!=0){
      var userId =$(".User-id").attr("id");
      var postId = $(".post").attr("id");
      var showId = "#Comment-"+commentId;
      var commentCount ="#comment-count-"+commentId;
      $(showId).load("commentbackend",{user_id:userId,post_id:postId,commented_text:comment,comment_id:showId},function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success"){
          $(commentLocation).val("");
          var c_icon = "#commentIcon-"+ commentId + " .comment-it";
          var userId =$(".User-id").attr("id");
          $(c_icon).load("commenticon",{Comment_Id:showId,User_Id:userId},function(responseTxt, statusTxt, xhr){
          });
          $(commentCount).load("commentno",{Post_Id:showId},function(responseTxt, statusTxt, xhr){
          });
        }
      });
      
    }
  };

});