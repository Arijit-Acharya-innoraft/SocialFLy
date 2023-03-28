$(document).ready(function() {
  $(".like").click(function(){
    var likeId = $(this).attr("id");
    // var postId = $(".post").attr("id");
    var userId =$(".User-id").attr("id");
    var likeAddress = "#".concat(likeId," ","#like-count");
  $(likeAddress).load("likeController",{Like_Id:likeId,User_Id:userId},function(responseTxt, statusTxt, xhr){
  });
  });

});
