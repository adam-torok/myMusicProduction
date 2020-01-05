$(document).ready(function(){
if($('#upload-counter').text() > 50){
  $('#user-title').text("Veterán felhasználó");
  $('#user-title').append('<i class="fas fa-crown"></i>');
  $('#prof-image').css("border","2px solid #ed2553");
}else if($('#upload-counter').text() > 30)
{
  $('#user-title').text("Tapasztalt tag");
  $('#user-title').append('<i class="fas fa-badge"></i>');
  $('#prof-image').css("border","2px solid #ed2553");
}
else if($('#upload-counter').text() > 10)
{
  $('#user-title').text("Zöldfülű");
  $('#user-title').append('<i class="fas fa-award"></i>');
}
else {
  $('#user-title').text("Újonc");
  $('#user-title').append('<i class="fas fa-medal"></i>');
}

});
