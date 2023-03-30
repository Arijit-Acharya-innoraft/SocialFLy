$(document).ready(function(){
  var a =10;
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
    a+=10;
    $(".post-section").load("posts",{limit:a,sort:filter},function(responseTxt, statusTxt, xhr){
      
    });
  });
});
