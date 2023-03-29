$(document).ready(function() {
  $(".write-comment button").on('click',comment);
  function comment()
  {
    var comment = $.trim($("#writeComment").val());
    if(comment.length!=0){
      var userId =$(".User-id").attr("id");
      var postId = $(".post").attr("id");
      $().load("commentbackend",{user_id:userId,post_id:postId,commented_text:comment },function(responseTxt, statusTxt, xhr){
      });
    }
  };

});