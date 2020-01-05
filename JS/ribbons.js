$(document).ready(function(){
if($(".likes").each(function(){
  if($(this).text() > 2){
    $(this).parent().parent().parent().append('<span class="ribbon3"></span>').toggleClass("hot");
    $(this).parent().parent().parent().find(".ribbon3").text("🔥");
  }
  else if($(this).text() > 5){
    $(this).parent().parent().parent().find(".ribbon3").toggleClass("hot");
    $(this).parent().parent().parent().find(".ribbon3").text("👀");
  }
}));
});
