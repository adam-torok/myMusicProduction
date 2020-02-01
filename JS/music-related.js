$(document).ready(function(){
  //add to playlist?,

  $("#addToPlayList").click(function(){
    var songName = $('#songName').text();
    window.location.replace('addMusicToPlayList.php?songname=' + songName );
  });

$("#volumeUp").click(function(){
    var volume = $("#myaudio").prop("volume")+0.2;
    console.log("Hangerő teszt FEL "+volume);
    if(volume >1){
        volume = 1;
    }
    $("#myaudio").prop("volume",volume);
});

$(".userButton").click(function(){
  console.log("URL SÁV?😏.");
  var userName = $(this).text().slice(13);
  window.location.replace('userprofile.php?profilename=' + userName);
  console.log(userName);
});


$("#volumeDown").click(function(){
  var volume = $("#myaudio").prop("volume")-0.2;
  console.log("Hangerő teszt LE "+volume);
    if(volume <0){
        volume = 0;
    }
    $("#myaudio").prop("volume",volume);
});

  // Zene szüneteletése gommbal
$("#pauseButton").click(function(){
  $("#myaudio").trigger('pause');
});
  // Zene lejátszása gombbal
$("#playButton").click(function(){
  $("#myaudio").trigger('play');
});
  // Sötét témára állítás
$("#change").click(function(){
  $(".profile").toggleClass("profileblack");
  $("body").toggleClass("bodyblack");
});
  // POPUP BEZÁRÁSA.
 //Kattintásra, az URL sávba beszúrja az adott előadó nevét, és ezt kéri el a PHP
$(".nameButton").click(function(){
  var artistName = $(this).text();
  window.location.replace('searched.php?artistname=' + artistName);
  console.log(artistName);
});
  //Ha rákattintunk a playbuttonra, jelenjen meg a audió sávban
$(document).on('click','#playbutton',function(){
  // Megkeresi a parent div elementjének az a tagjét, és a href változóját egy src változóba teszi
  var src = $(this).parent().find('a').attr('href');
  // Megkersi a parent div elementjének az img tagjét, és a source attributumát egy imgsrc változóba teszi
  var imgsrc = $(this).parent().parent().find('img').attr('src');
  // A lejátszóba a playerImage id-s képnek új src attribútumot állít be, az imgsrc-ban lévő értéket.
  var playerImage = $("#playerImage").attr('src',imgsrc);
    // Megkeresi a nagyszülő h2, h4 tagjeit, és elmentem változóba
  x = $(this).parent().parent().parent().find('h2').first().text();
  songName = $(this).parent().parent().parent().find('h4').first().text();
  $("#songName").text(songName);
  $("title").text("Most játszott:" + songName);
  $("#artistName").text(x);
    //A myaudio id-jú audio tagbe kicseréli a src-t, arra a src-ra ami a volt a tag-nek volt a href-je
    // Ugyanezen elven letöltés opció.
  var k = $("#myaudio").attr("src",src);
  $("#downloadButton").attr("href",src);
  $("#downloadButton").attr("download",src);
  /* if(x.length === 0 ){
      console.log("Üres az src!");
    }
  */
})
});
