$(document).ready(function() {
  $(".write-comment button").on('click',comment);
  function comment()
  {
    var commentId = $(this).parent().attr("id");
    var commentLocation = "#".concat(commentId," .writeComment");
    var comment = $(commentLocation).val();
    // console.log(commentLocation);
    // console.log(comment);

    if(comment.length!=0){
      var userId =$(".User-id").attr("id");
      var postId = $(".post").attr("id");
      var showId = "#Comment-"+commentId;
      $(showId).load("commentbackend",{user_id:userId,post_id:postId,commented_text:comment },function(responseTxt, statusTxt, xhr){
      });
    }
  };

});