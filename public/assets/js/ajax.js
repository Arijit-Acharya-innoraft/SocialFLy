$(document).ready(function(){
  var a =3;
  $(".post-section").load("posts",{limit: 3},function(responseTxt, statusTxt, xhr){
  });
  $(".load-more button").click(function(){
    a+=3;
    $(".post-section").load("posts",{limit:a},function(responseTxt, statusTxt, xhr){
      
    });
  });
});
