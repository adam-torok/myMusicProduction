$(document).ready(function(){
$(".material-button").click(function(){
  let id = $(this).attr("data-id");
  window.location.replace("filtered.php?genre="+id);
});
});
