function loadSpinner() {
var loadPage = setTimeout(showPage, 700);
}
function showPage() {
document.getElementById("loader").style.display = "none";
}
$(document).ready(function(){

if ((window.location.href.indexOf("welcome") != -1) ||
    (window.location.href.indexOf("artists") != -1) ||
    (window.location.href.indexOf("activity") != -1) ||
    (window.location.href.indexOf("displayPlayList") != -1)) {
    return false;
    }
    else{
      console.log("😄Buttonok deaktiválása");
      $("#grid a i").addClass("disable");
      $("#change a i").addClass("disable");
    }


$(".material-button").hover(function(){
  $(this).toggleClass("animated pulse delay-0s");
})

$("#send-mail").click(function(){
  console.log("added");
  $("#mail-holder").addClass("animated bounceOutUp delay-0s");
  setTimeout(function(){
  $("#mail-holder").css("display","none");
},1000);
})

$(".tooltip").hover(function(){
  $(this).toggleClass("animated pulse delay-0s");
});

$(".track-container-picture").hover(function(){
  $(this).toggleClass("animated pulse delay-0s");
});

  // Zene szüneteletése gommbal
$("#pauseButton").click(function(){
  $("#myaudio").trigger('pause');
});
  // Zene lejátszása gombbal
$("#playButton").click(function(){
  $("#myaudio").trigger('play');
});

$(".userPlayList").click(function () {
  if($("#ul").children(".list").hasClass("hide")){
    console.log("hidden..");
    $("#ul").children(".list").removeClass("hide");
  }
  else{
    $("#ul").children(".list").addClass("hide");
  }
})
 //Kattintásra, az URL sávba beszúrja az adott előadó nevét, és ezt kéri el a PHP
$(".nameButton").click(function(){
  var artistName = $(this).text();
  window.location.replace('searched.php?artistname=' + artistName);
  console.log(artistName);
});

//add to playlist?,

$("#addToPlayList").click(function(){
  var songName = $('#songName').text();
  window.location.replace('addMusicToPlayList.php?songname=' + songName );
  console.log(songName);
});


$("#addPlayListButton").click(function(){
  $(".playlistForm").toggleClass("hide");
 console.log("Form is hidden.");
});
  //Ha rákattintunk a playbuttonra, jelenjen meg a audió sávban
$(document).on('click','#playbutton',function(){
  // Megkeresi a parent div elementjének az a tagjét, és a href változóját egy src változóba teszi
  var src = $(this).parent().find('a').attr('href');
  // Megkersi a parent div elementjének az img tagjét, és a source attributumát egy imgsrc változóba teszi
  var imgsrc = $(this).parent().find('img').attr('src');
  // A lejátszóba a playerImage id-s képnek új src attribútumot állít be, az imgsrc-ban lévő értéket.
  var playerImage = $("#playerImage").attr('src',imgsrc);
    // Megkeresi a nagyszülő h2, h4 tagjeit, és elmentem változóba
  x = $(this).parent().parent().find('h2').first().text();
  songName = $(this).parent().parent().find('h4').first().text();
  $("#songName").text(songName);
  $("title").text("Most játszott: " + songName);
  $("#artistName").text(x);
    //A myaudio id-jú audio tagbe kicseréli a src-t, arra a src-ra ami a volt a tag-nek volt a href-je
  var k = $("#myaudio").attr("src", src);
  /* if(x.length === 0 ){
      console.log("Üres az src!");
    }
  */
})
});
