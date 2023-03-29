$(document).ready(function(){
  var a =5;
  var filter="DESC";
  $(".post-section").load("posts",{limit: a,sort:"DESC"},function(responseTxt, statusTxt, xhr){
  });
  $("#sort").click(function(){
    filter = (filter == "DESC")? "ASC":"DESC";

    $(".post-section").load("posts",{limit: a,sort:filter},function(responseTxt, statusTxt, xhr){
    });
  });

  // $(".post-section").load("posts",{limit: a,sort:filter},function(responseTxt, statusTxt, xhr){
  // });
  $(".load-more button").click(function(){
    a+=5;
    $(".post-section").load("posts",{limit:a,sort:filter},function(responseTxt, statusTxt, xhr){
      
    });
  });
});
