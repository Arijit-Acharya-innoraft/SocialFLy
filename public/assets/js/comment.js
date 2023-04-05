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
      var loc = showId + " .comments";
      var commentCount ="#comment-count-"+commentId;

      $(loc).load("viewcomment",{user_id:userId,post_id:postId,commented_text:comment,comment_id:showId},function(responseTxt, statusTxt, xhr){
        if(statusTxt == "success"){
          $(commentLocation).val("");
          var c_icon = "#commentIcon-"+ commentId + " .comment-it";
          var userId =$(".User-id").attr("id");

          // It is called for changing the comment icon.
          $(c_icon).load("commenticon",{Comment_Id:showId,User_Id:userId},function(responseTxt, statusTxt, xhr){
          });

          // It is called for showing the comment number.
          $(commentCount).load("commentno",{Post_Id:showId},function(responseTxt, statusTxt, xhr){
          });
          
        }
      });

    }
  };

  $(".comment").on('click',show);
  function show() {
    var iconId = $(this).attr("id");
    var id = iconId.substring(12);
    var showId = "#Comment-"+ id;
    var loc = showId + " .comments";
    var display = $(loc).css("display");
    // $(loc).load("viewcomment",{comment_id:showId},function(responseTxt, statusTxt, xhr){
    // });
    if(display == "none") {
      $(loc).css("display","block");
    }
    else{
      $(loc).css("display","none");
    }

 
  }

});